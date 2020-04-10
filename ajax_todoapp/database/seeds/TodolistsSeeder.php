<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodolistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todolists')->truncate();

        $todolists = [];

        for ($i = 1; $i <= 10; $i++) {
            $todolists[] = [
                'title' => "Todo list $i",
                'description' => "Description $i",
                'user_id' => rand(1,2)
            ];
        }

        DB::table('todolists')->insert($todolists);
    }

}
