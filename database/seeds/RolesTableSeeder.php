<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'manager',
            'desc' => 'role to manager user',
        ]);
        DB::table('roles')->insert([
            'name' => 'client',
            'desc' => 'role to client user',
        ]);
    }
}
