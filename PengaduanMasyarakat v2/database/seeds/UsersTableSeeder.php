<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $petugasRole = Role::where('name', 'petugas')->first();
        $masyarakatRole = Role::where('name', 'masyarakat')->first();

        $admin = User::create([
            'nik' => '32313213',
            'alamat' => 'Subang',
            'tanggal_lahir' => '2020-04-07',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
        
        $petugas = User::create([
            'nik' => '5544352',
            'alamat' => 'Bogor',
            'tanggal_lahir' => '2022-12-07',
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('petugas')
        ]);
        $masyarakat = User::create([
            'nik' => '6224241',
            'alamat' => 'Bandung',
            'tanggal_lahir' => '2120-04-17',
            'name' => 'Kalam',
            'email' => 'kalam@gmail.com',
            'password' => bcrypt('kalam1313')
        ]);

        $admin->roles()->attach($adminRole);
        $petugas->roles()->attach($petugasRole);
        $masyarakat->roles()->attach($masyarakatRole);
    }
}
