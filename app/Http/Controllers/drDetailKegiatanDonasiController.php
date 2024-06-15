<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanDonasi;
use App\Models\DonaturAtauRelawan;
use GuzzleHttp\Client;

class drDetailKegiatanDonasiController extends Controller
{
    private $googleMapsApiKey = 'AIzaSyBdvXtNkHqEH-E87o0J48Xj3NRhD5lJjQE';

    public function show($idKegiatanDonasi, $idDonaturRelawan)
    {
        // Temukan kegiatan donasi berdasarkan ID
        $kegiatanDonasi = KegiatanDonasi::find($idKegiatanDonasi);
        if (!$kegiatanDonasi) {
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan');
        }

        // Temukan donatur atau relawan berdasarkan ID
        $donaturRelawan = DonaturAtauRelawan::find($idDonaturRelawan);
        if (!$donaturRelawan) {
            return redirect()->back()->with('error', 'Donatur/relawan tidak ditemukan');
        }

        // Ambil koordinat dari LinkGoogleMapsDonaturRelawan
        $coordinatesDonatur = $this->getCoordinatesFromGoogleMapsLink($donaturRelawan->LinkGoogleMapsDonaturRelawan);

        // Ambil koordinat dari LinkGoogleMapsPantiSosial
        $pantiSosial = $kegiatanDonasi->pantiSosial; // Pastikan relasi pantiSosial sudah didefinisikan
        $coordinatesPantiSosial = $this->getCoordinatesFromGoogleMapsLink($pantiSosial->LinkGoogleMapsPantiSosial);

        // Hitung jarak rute antara kedua koordinat menggunakan Google Maps Directions API
        $jarakKm = null;
        if ($coordinatesDonatur && $coordinatesPantiSosial) {
            $jarakKm = $this->calculateRouteDistance(
                $coordinatesDonatur['latitude'], $coordinatesDonatur['longitude'],
                $coordinatesPantiSosial['latitude'], $coordinatesPantiSosial['longitude']
            );
        }

        return view('drDetailKegiatanDonasi', compact('kegiatanDonasi', 'donaturRelawan', 'jarakKm'));
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
