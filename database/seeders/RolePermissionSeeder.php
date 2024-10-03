<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'hapus']);
        Permission::create(['name' => 'lihat']);

        Permission::create(['name' => 'history']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'masyarakat']);


        $roelAdmin = Role::findByName('admin');
        $roelAdmin->givePermissionTo('tambah');
        $roelAdmin->givePermissionTo('edit');
        $roelAdmin->givePermissionTo('hapus');
        $roelAdmin->givePermissionTo('lihat');


        $roleMasyarakat = Role::findByName('masyarakat');
        $roleMasyarakat->givePermissionTo('history');
    }
}
