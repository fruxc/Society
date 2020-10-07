<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Hammad Ansari',
            'email' => 'hammadansari17@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $wings = array("A", "B", "C", "D", "E", "F", "G", "H");
        foreach ($wings as $wing) {
            DB::table('wing')->insert(['name' => $wing]);
        }

        $roles = array("Secretary", "Treasurer", "Member");
        foreach ($roles as $role) {
            DB::table('role')->insert(['name' => $role]);
        }

        $acts = array("Completed", "Pending", "Initiated");
        foreach ($acts as $act) {
            DB::table('act')->insert(['name' => $act]);
        }
    }
}
