<?php

use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('pengaturan')->truncate();
        
        DB::table('pengaturan')->insert(['id' => 1, 'kode' => 'registrasi_kode', 'isi' => 'XXASD', 'user_id' => 1]);
        DB::table('pengaturan')->insert(['id' => 2, 'kode' => 'registrasi_kode_exp', 'isi' => '5', 'user_id' => 1]);
        DB::table('pengaturan')->insert(['id' => 3, 'kode' => 'registrasi_wilayah', 'isi' => 'kabupaten', 'user_id' => 1]);
        DB::table('pengaturan')->insert(['id' => 4, 'kode' => 'versi_format_excel', 'isi' => 'LPMPWNUJATENG2019_v1', 'user_id' => 1]);
    }

}
