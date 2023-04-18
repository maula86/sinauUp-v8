<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use App\Buku;
use App\Anggotas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(BosMe::class);
        // DB::table('users');

        User::create(
            [
                'name'      => 'Safa',
                'email'     =>'safa@gmail.com',
                'password'  =>bcrypt('safaart86')


            ]);
         User::create(
            [
                'name'      => 'Maula',
                'email'     =>'maula@gmail.com',
                'password'  =>bcrypt('maulaart86')


            ]);

        // DB::table('bukus');
        Buku::create(
            [
                'kode_b'        =>'BK-001',
                'judul'         =>'Dunia Anna',
                'penerbit'      =>'Gueen',
                'pengarang'     =>'carlos',
                'rak'           =>'x-01a',
                'jml'           =>'1',
                'price'         =>'30000',
                'imgbuku'       =>'BK-1.jpg',
                'sts_buku'      =>'ADA',
                'fo'            =>'1'
        ]);

        Buku::create(
            [
                'kode_b'        =>'BK-002',
                'judul'         =>'Queen Sircus',
                'penerbit'      =>'Gueen',
                'pengarang'     =>'carlos',
                'rak'           =>'x-01b',
                'jml'           =>'1',
                'price'         =>'30000',
                'imgbuku'       =>'BK00D.jpg',
                'sts_buku'      =>'ADA',
                'fo'            =>'1'
        ]);

        Buku::create(
            [
                'kode_b'        =>'BK-003',
                'judul'         =>'Orange Girl',
                'penerbit'      =>'Gueen',
                'pengarang'     =>'carlos',
                'rak'           =>'x-01c',
                'jml'           =>'1',
                'price'         =>'30000',
                'imgbuku'       =>'BK00B.jpg',
                'sts_buku'      =>'ADA',
                'fo'            =>'1'
        ]);

        // DB::table('aggotas');

        Anggotas::create(
            [
                'kd_agt'        =>'Agt-01',
                'nm_agt'        =>'neng yii',
                'alamat_agt'    =>'Madura',
                'hp'            =>'098987676545',
                'img_agt'       =>'Neng Yii.jpg',
                'sts_agt'       =>'AKTIV',
                'kondisi'       =>'BELUM'
        ]);

        Anggotas::create(
            [
                'kd_agt'        =>'Agt-02',
                'nm_agt'        =>'Cak Pony',
                'alamat_agt'    =>'Jetis',
                'hp'            =>'09898767895',
                'img_agt'       =>'Cak Phony.png',
                'sts_agt'       =>'AKTIV',
                'kondisi'       =>'BELUM'
        ]);

    }
}
