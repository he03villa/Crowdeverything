<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roles_userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([            
            'role_id' => '1',
            'user_id' => '1',
        ]);
    }
}
