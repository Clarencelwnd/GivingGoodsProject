<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanRelawan;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;
use App\Models\PantiSosial;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;

class PagePanSosController extends Controller
{
    private $googleMapsApiKey = 'AIzaSyBdvXtNkHqEH-E87o0J48Xj3NRhD5lJjQE';

    public function show($IDPantiSosial, $IDDonaturRelawan)
    {
        $perPage = 9;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Mendapatkan informasi panti sosial berdasarkan ID
        $pantiSosial = PantiSosial::findOrFail($IDPantiSosial);

        // Mendapatkan informasi donatur/relawan berdasarkan ID
        $donaturRelawan = DonaturAtauRelawan::findOrFail($IDDonaturRelawan);

        // Mengambil kegiatan relawan dengan ID Panti Sosial yang sesuai
        $kegiatanRelawan = KegiatanRelawan::where('IDPantiSosial', $IDPantiSosial)->get();

        // Mengambil kegiatan donasi dengan ID Panti Sosial yang sesuai
        $kegiatanDonasi = KegiatanDonasi::where('IDPantiSosial', $IDPantiSosial)->get();

        // Ambil koordinat dari LinkGoogleMapsDonaturRelawan
        $coordinatesDonatur = $this->getCoordinatesFromGoogleMapsLink($donaturRelawan->LinkGoogleMapsDonaturRelawan);

        // Tambahkan jarak ke setiap kegiatan donasi
        foreach ($kegiatanDonasi as $donasi) {
            $coordinatesPantiSosial = $this->getCoordinatesFromGoogleMapsLink($donasi->LinkGoogleMapsLokasiKegiatanDonasi);

            $jarakKm = 0;
            if ($coordinatesDonatur && $coordinatesPantiSosial) {
                $jarakKm = $this->calculateRouteDistance(
                    $coordinatesDonatur['latitude'], $coordinatesDonatur['longitude'],
                    $coordinatesPantiSosial['latitude'], $coordinatesPantiSosial['longitude']
                );
            }

            $donasi->setAttribute('jarakKm', $jarakKm);
        }

        // Tambahkan jarak ke setiap kegiatan relawan
        foreach ($kegiatanRelawan as $relawan) {
            $coordinatesPantiSosial = $this->getCoordinatesFromGoogleMapsLink($relawan->LinkGoogleMapsLokasiKegiatanRelawan);

            $jarakKm = 0;
            if ($coordinatesDonatur && $coordinatesPantiSosial) {
                $jarakKm = $this->calculateRouteDistance(
                    $coordinatesDonatur['latitude'], $coordinatesDonatur['longitude'],
                    $coordinatesPantiSosial['latitude'], $coordinatesPantiSosial['longitude']
                );
            }

            $relawan->setAttribute('jarakKm', $jarakKm);
        }

        // Inisialisasi array kosong untuk $activities
        $activities = [];

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

        // Looping untuk menambahkan kegiatan relawan ke dalam $activities
        foreach ($kegiatanRelawan as $relawan) {
            $activities[] = (object) [
                'IDKegiatanRelawan' => $relawan->IDKegiatanRelawan,
                'NamaKegiatanRelawan' => $relawan->NamaKegiatanRelawan,
                'GambarKegiatan' => $relawan->GambarKegiatanRelawan,
                'JenisKegiatanRelawan' => $relawan->JenisKegiatanRelawan,
                'jarakKm' => $relawan->jarakKm,
                'pantiSosial' => $pantiSosial,
            ];
        }

        // Looping untuk menambahkan kegiatan donasi ke dalam $activities
        foreach ($kegiatanDonasi as $donasi) {
            $activities[] = (object) [
                'IDKegiatanDonasi' => $donasi->IDKegiatanDonasi,
                'NamaKegiatanDonasi' => $donasi->NamaKegiatanDonasi,
                'GambarKegiatan' => $donasi->GambarKegiatanDonasi,
                'JenisDonasiDibutuhkan' => $donasi->JenisDonasiDibutuhkan,
                'jarakKm' => $donasi->jarakKm,
                'pantiSosial' => $pantiSosial,
                'jenisDonasiIcons' => $jenisDonasiIcons,
            ];
        }

        // Mengubah array $activities menjadi koleksi dan mengurutkannya
        $activities = collect($activities);

        // Membuat paginasi
        $activities = new LengthAwarePaginator(
            $activities->forPage($currentPage, $perPage),
            $activities->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        // Variabel ID untuk keperluan customisasi di view
        $id = $IDDonaturRelawan;
        $idPansos = $IDPantiSosial;

        // Mengirimkan data ke view dengan compact
        return view('DetailPantiSosial.PagePanSos', compact('pantiSosial', 'donaturRelawan', 'activities', 'id', 'idPansos'));
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
