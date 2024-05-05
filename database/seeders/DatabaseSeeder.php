<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table('status_kegiatan_atau_penerimaan')->truncate();
        \DB::table('jenis_barang_donasi')->truncate();
        \DB::table('jenis_kegiatan_relawan')->truncate();
        \DB::table('panti_sosial')->truncate();
        \DB::table('donatur_atau_relawan')->truncate();
        \DB::table('forum')->truncate();
        \DB::table('komentar_forum')->truncate();
        \DB::table('jadwal_operasional')->truncate();
        \DB::table('kegiatan_donasi')->truncate();
        \DB::table('kegiatan_relawan')->truncate();
        \DB::table('registrasi_donatur')->truncate();
        \DB::table('registrasi_relawan')->truncate();
        \DB::table('jadwal_kegiatan_donasi')->truncate();
        \DB::table('detail_jenis_barang_dibutuhkan')->truncate();
        \DB::table('detail_jenis_barang_didonasikan')->truncate();

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->call([
            StatusKegiatanAtauPenerimaanSeeder::class,
            JenisBarangDonasiSeeder::class,
            JenisKegiatanRelawanSeeder::class,
            PantiSosialSeeder::class,
            DonaturAtauRelawanSeeder::class,
            ForumSeeder::class,
            KomentarForumSeeder::class,
            JadwalOperasionalSeeder::class,
            KegiatanDonasiSeeder::class,
            KegiatanRelawanSeeder::class,
            RegistrasiDonaturSeeder::class,
            RegistrasiRelawanSeeder::class,
            JadwalKegiatanDonasiSeeder::class,
            DetailJenisBarangDibutuhkanSeeder::class,
            DetailJenisBarangDidonasikanSeeder::class,
        ]);
    }
}
