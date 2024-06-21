<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KegiatanDonasi;
use App\Models\KegiatanRelawan;
use App\Models\PantiSosial;
use App\Models\DonaturAtauRelawan;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;

class DaftarKegiatanController extends Controller
{
    private $googleMapsApiKey = 'AIzaSyBdvXtNkHqEH-E87o0J48Xj3NRhD5lJjQE';

    public function displayDaftarKegiatan($id) {
        $perPage = 9;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Ambil data DonaturAtauRelawan
        $donaturRelawan = DonaturAtauRelawan::find($id);

        // Ambil koordinat dari LinkGoogleMapsDonaturRelawan
        $coordinatesDonatur = $this->getCoordinatesFromGoogleMapsLink($donaturRelawan->LinkGoogleMapsDonaturRelawan);

        // Ambil data kegiatan relawan dengan jumlah registrasi
        $kegiatanRelawan = KegiatanRelawan::with(['registrasiRelawan', 'pantiSosial'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil data kegiatan donasi dengan jumlah registrasi
        $kegiatanDonasi = KegiatanDonasi::with(['registrasiDonatur', 'pantiSosial'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Gabungkan kedua koleksi kegiatan
        $merged = $kegiatanRelawan->merge($kegiatanDonasi);

        // Hitung jarak dan tambahkan ke setiap kegiatan
        foreach ($merged as $kegiatan) {
            $pantiSosial = $kegiatan->pantiSosial; // Ambil pantiSosial terkait kegiatan
            if ($pantiSosial) {
                $coordinatesPantiSosial = $this->getCoordinatesFromGoogleMapsLink($pantiSosial->LinkGoogleMapsPantiSosial);
                $jarakKm = null;
                if ($coordinatesDonatur && $coordinatesPantiSosial) {
                    $jarakKm = $this->calculateRouteDistance(
                        $coordinatesDonatur['latitude'], $coordinatesDonatur['longitude'],
                        $coordinatesPantiSosial['latitude'], $coordinatesPantiSosial['longitude']
                    );
                }
                $kegiatan->setAttribute('jarakKm', $jarakKm); // Tambahkan atribut jarakKm ke kegiatan
            }
        }

        // Sorting dan pagination
        $sorted = $merged->sortByDesc('created_at');
        $paginator = new LengthAwarePaginator(
            $sorted->forPage($currentPage, $perPage),
            $sorted->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        // Data ikon dan daftar jenis donasi dan relawan
        $jenisDonasiIcons = [
            'alat_tulis' => 'Image/donasi/alat_tulis.png',
            'buku' => 'Image/donasi/buku.png',
            'keperluan_rumah' => 'Image/donasi/keperluan_rumah.png',
            'mainan' => 'Image/donasi/mainan.png',
            'makanan' => 'Image/donasi/makanan.png',
            'obat' => 'Image/donasi/obat.png',
            'pakaian' => 'Image/donasi/pakaian.png',
            'keperluan_ibadah' => 'Image/donasi/perlengkapan_ibadah.png',
            'sepatu' => 'Image/donasi/sepatu.png',
            'keperluan_mandi' => 'Image/donasi/toiletries.png'
        ];

        $jenisDonasiList = ['Makanan', 'Pakaian', 'Keperluan_Mandi', 'Obat', 'Keperluan_Rumah', 'Buku', 'Alat_Tulis', 'Keperluan_Ibadah', 'Mainan'];
        $jenisRelawanList = ['Bencana_Alam', 'Pendidikan', 'Kesehatan', 'Lingkungan', 'Teknologi', 'Masyarakat', 'Darurat_Bencana', 'Seni_Budaya'];

        return view('daftarKegiatanDonaturRelawan.daftarKegiatan', [
            'activities'=> $paginator,
            'jenisDonasiIcons'=>$jenisDonasiIcons,
            'jenisDonasiList' => $jenisDonasiList,
            'jenisRelawanList' => $jenisRelawanList,
            'id' => $id
        ]);
    }


    public function search(Request $request) {
        $search = $request->input('search');
        $filters = $request->only(['jenis_kegiatan', 'jenis_donasi', 'jenis_kegiatan_relawan']);

        $pantiSosial = PantiSosial::where('NamaPantiSosial', 'like', '%' . $search . '%')->first();

         // Determine Panti Sosial IDs for filtering
        $pantiSosialIds = $pantiSosial ? [$pantiSosial->IDPantiSosial] : [];

         // Fetch activities related to the Panti Sosial
        // if ($pantiSosial) {
        //     $pantiSosialIds = [$pantiSosial->IDPantiSosial];
        // } else {
        //     $pantiSosialIds = PantiSosial::where('NamaPantiSosial', 'like', '%' . $search . '%')->pluck('IDPantiSosial');
        // }

        $kegiatanRelawan = KegiatanRelawan::withCount('registrasiRelawan')
        ->where(function($query) use ($search, $pantiSosialIds) {
            $query->where('NamaKegiatanRelawan', 'like', '%' . $search . '%')
                  ->orWhereIn('IDPantiSosial', $pantiSosialIds)
                  ->orWhere('JenisKegiatanRelawan', 'like', '%' . $search . '%');
        });

        $kegiatanDonasi = KegiatanDonasi::withCount('registrasiDonatur')
            ->where(function($query) use ($search, $pantiSosialIds) {
                $query->where('NamaKegiatanDonasi', 'like', '%' . $search . '%')
                    ->orWhereIn('IDPantiSosial', $pantiSosialIds)
                    ->orWhere('JenisDonasiDibutuhkan', 'like', '%' . $search . '%');
            });

         // Apply filters if provided
         if (isset($filters['jenis_kegiatan'])) {
            $kegiatanRelawan->whereIn('JenisKegiatanRelawan', $filters['jenis_kegiatan']);
            $kegiatanDonasi->whereIn('JenisDonasiDibutuhkan', $filters['jenis_kegiatan']);
        }
        if (isset($filters['jenis_donasi'])) {
            $kegiatanDonasi->whereIn('JenisDonasiDibutuhkan', $filters['jenis_donasi']);
        }
        if (isset($filters['jenis_kegiatan_relawan'])) {
            $kegiatanRelawan->whereIn('JenisKegiatanRelawan', $filters['jenis_kegiatan_relawan']);
            // $kegiatanRelawan->where(function($query) use ($jenisKegiatanRelawanFilters) {
            //     foreach ($jenisKegiatanRelawanFilters as $jenis) {
            //         $query->orWhere('JenisKegiatanRelawan', $jenis);
            //     }
            // });
        }

        $kegiatanRelawan = $kegiatanRelawan->orderBy('created_at', 'desc')->get();
        $kegiatanDonasi = $kegiatanDonasi->orderBy('created_at', 'desc')->get();
        $kegiatanRelawanCollection = $kegiatanRelawan->toBase();
        $kegiatanDonasiCollection = $kegiatanDonasi->toBase();

        $merged = $kegiatanRelawanCollection->merge($kegiatanDonasiCollection);
        $sorted = $merged->sortByDesc('created_at');

        $perPage = 9;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginator = new LengthAwarePaginator($currentPageItems, $sorted->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'query' => $request->query()
        ]);

        $jenisDonasiIcons = [
            'alat_tulis' => 'Image/donasi/alat_tulis.png',
            'buku' => 'Image/donasi/buku.png',
            'keperluan_rumah' => 'Image/donasi/keperluan_rumah.png',
            'mainan' => 'Image/donasi/mainan.png',
            'makanan' => 'Image/donasi/makanan.png',
            'obat' => 'Image/donasi/obat.png',
            'pakaian' => 'Image/donasi/pakaian.png',
            'keperluan_ibadah' => 'Image/donasi/perlengkapan_ibadah.png',
            'sepatu' => 'Image/donasi/sepatu.png',
            'keperluan_mandi' => 'Image/donasi/toiletries.png'
        ];

        $jenisDonasiList = ['Makanan', 'Pakaian', 'Keperluan_Mandi', 'Obat', 'Keperluan_Rumah', 'Buku', 'Alat_Tulis', 'Keperluan_Ibadah', 'Mainan'];
        $jenisRelawanList = ['Bencana_Alam', 'Pendidikan', 'Kesehatan', 'Lingkungan', 'Teknologi', 'Masyarakat', 'Darurat_Bencana', 'Seni_Budaya'];

        return view('daftarKegiatanDonaturRelawan.daftarKegiatan', [
            'activities' => $paginator,
            'search' => $search,
            'filters' => $filters,
            'jenisDonasiIcons' => $jenisDonasiIcons,
            'jenisDonasiList' => $jenisDonasiList,
            'jenisRelawanList' => $jenisRelawanList,
            'pantiSosial' => $pantiSosial
        ]);
    }

    private function addPaginationLinks($activities){
        $links = $activities->links();
        Paginator::useBootstrap();
        $links->withPath('');
        return $links;
    }

    private function getCoordinatesFromGoogleMapsLink($googleMapsLink)
    {
        $coordinates = [];

        // Pola regex untuk mengekstrak koordinat dari URL Google Maps
        $pattern = '/@(-?\d+\.\d+),(-?\d+\.\d+)/';
        preg_match($pattern, $googleMapsLink, $matches);

        // Jika tidak ada yang cocok dengan pola regex, coba ekstraksi dari query params
        if (empty($matches)) {
            parse_str(parse_url($googleMapsLink, PHP_URL_QUERY), $query);
            if (isset($query['ll'])) {
                $coords = explode(',', $query['ll']);
                if (count($coords) == 2) {
                    $matches = [null, $coords[0], $coords[1]];
                }
            }
        }

        // Cetak untuk memastikan koordinat berhasil diekstrak
        // dd($matches);

        if (count($matches) >= 3) {
            $coordinates['latitude'] = floatval($matches[1]);
            $coordinates['longitude'] = floatval($matches[2]);
        }

        return $coordinates;
    }

    private function calculateRouteDistance($lat1, $lon1, $lat2, $lon2)
    {
        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/directions/json', [
            'query' => [
                'origin' => $lat1 . ',' . $lon1,
                'destination' => $lat2 . ',' . $lon2,
                'mode' => 'driving',
                'key' => $this->googleMapsApiKey,
            ]
        ]);

        $data = json_decode($response->getBody(), true);



        // Periksa apakah respons API valid
        if (isset($data['status']) && $data['status'] == 'OK') {
            // Pastikan ada rute yang ditemukan
            if (isset($data['routes'][0]['legs'][0]['distance']['value'])) {
                // Jarak dalam meter, konversi ke kilometer
                $distanceKm = $data['routes'][0]['legs'][0]['distance']['value'] / 1000;
                return $distanceKm;
            } else {
                return null; // Jika tidak ada jarak yang valid
            }
        } else {
            return null; // Jika respons API tidak valid atau tidak ada rute ditemukan
        }
    }

}
