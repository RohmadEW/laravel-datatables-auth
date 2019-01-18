<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        // =====================================================================
        
        $role = new Role();
        $role->name = "admin";
        $role->display_name = "Administrator";
        $role->save();
        
        $user = new User();
        $user->name = 'Rohmad Eko Wahyudi';
        $user->email = 'rohmad.ew@gmail.com';
        $user->password = bcrypt('admin');
        $user->client_address = '127.0.0.1';
        $user->wilayah_id = '1';
        $user->wilayah_type = 'App\\Model\\MasterData\\Negara';
        $user->save();
        $user->attachRole($role);
        
        // =====================================================================
        
        $role = new Role();
        $role->name = "pusat";
        $role->display_name = "Admin Pusat";
        $role->save();
        
        $user = new User();
        $user->name = 'User Pusat';
        $user->email = 'pusat@gmail.com';
        $user->password = bcrypt('1234');
        $user->client_address = '127.0.0.1';
        $user->wilayah_id = '1';
        $user->wilayah_type = 'App\\Model\\MasterData\\Negara';
        $user->save();
        $user->attachRole($role);
        
        // =====================================================================
        
        $role = new Role();
        $role->name = "wilayah";
        $role->display_name = "Admin Wilayah";
        $role->save();
        
        $user = new User();
        $user->name = "User Wilayah";
        $user->email = 'wilayah@gmail.com';
        $user->password = bcrypt('1234');
        $user->client_address = '127.0.0.1';
        $user->wilayah_id = '14';
        $user->wilayah_type = 'App\\Model\\MasterData\\Provinsi';
        $user->save();
        $user->attachRole($role);
        
        // =====================================================================
        
        $role = new Role();
        $role->name = "cabang";
        $role->display_name = "Admin Cabang";
        $role->save();
        
        $user = new User();
        $user->name = "User Cabang";
        $user->email = 'cabang@gmail.com';
        $user->password = bcrypt('1234');
        $user->client_address = '127.0.0.1';
        $user->wilayah_id = '207';
        $user->wilayah_type = 'App\\Model\\MasterData\\Kabupaten';
        $user->save();
        $user->attachRole($role);
        
        // =====================================================================
        
        $role = new Role();
        $role->name = "sekolah";
        $role->display_name = "Kepala Sekolah";
        $role->save();
        
        $user = new User();
        $user->name = "User Sekolah";
        $user->email = 'sekolah@gmail.com';
        $user->password = bcrypt('1234');
        $user->client_address = '127.0.0.1';
        $user->wilayah_id = '1182';
        $user->wilayah_type = 'App\\Model\\MasterData\\Kecamatan';
        $user->save();
        $user->attachRole($role);
        
        // =====================================================================
        
        $role = new Role();
        $role->name = "operator";
        $role->display_name = "Operator Sekolah";
        $role->save();
        
        $user = new User();
        $user->name = "Operator";
        $user->email = 'operator@gmail.com';
        $user->password = bcrypt('1234');
        $user->client_address = '127.0.0.1';
        $user->wilayah_id = '1182';
        $user->wilayah_type = 'App\\Model\\MasterData\\Kecamatan';
        $user->save();
        $user->attachRole($role);
        
        // =====================================================================
        
        $user = new User();
        $user->npsn = "69937242";
        $user->name = "PIM";
        $user->email = 'pim@gmail.com';
        $user->password = bcrypt('123456');
        $user->client_address = '127.0.0.1';
        $user->wilayah_id = '1182';
        $user->wilayah_type = 'App\\Model\\MasterData\\Kecamatan';
        $user->save();
        $user->attachRole($role);
    }

}
