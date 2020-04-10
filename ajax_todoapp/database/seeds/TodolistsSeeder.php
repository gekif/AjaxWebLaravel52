<?php

use Carbon\Carbon;
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
            $todolists[] = array(
                'title' => "Todo list $i",
                'description' => "Description $i",
                'user_id' => rand(1,2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            );
        }

        DB::table('todolists')->insert($todolists);
    }

}
