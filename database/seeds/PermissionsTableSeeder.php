<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'add_order',
            'desc' => 'client add order',
        ]);
        DB::table('permissions')->insert([
            'name' => 'add_message',
            'desc' => 'add message',
        ]);
        DB::table('permissions')->insert([
            'name' => 'add_to_worked',
            'desc' => 'add to worked',
        ]);
        DB::table('permissions')->insert([
            'name' => 'closed_order',
            'desc' => 'closed order',
        ]);
        DB::table('permissions')->insert([
            'name' => 'show_list_orders',
            'desc' => 'show list orders',
        ]);
        DB::table('permissions')->insert([
            'name' => 'show_order',
            'desc' => 'show order',
        ]);
        DB::table('permissions')->insert([
            'name' => 'view_manager_panel',
            'desc' => 'view manager panel',
        ]);
        DB::table('permissions')->insert([
            'name' => 'show_all_list_orders',
            'desc' => 'show all list orders',
        ]);
        DB::table('permissions')->insert([
            'name' => 'show_all_order',
            'desc' => 'show all order',
        ]);
    }
}
