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
        DB::statement("SET FOREIGN_KEY_CHECKS = 0");

        DB::table('tasks')->truncate();
        DB::table('todolists')->truncate();

        $todolists = [];
        $tasks = [];

        for ($i = 1; $i <= 10; $i++) {
            $date = date('Y-m-d H:i:s', strtotime("2016-05-01 08:00:00 + {$i} days"));

            $todolists[] = [
                'id' => $i,
                'title' => "Todo list $i",
                'description' => "Description $i",
                'user_id' => rand(1,2),
                'created_at' => $date,
                'updated_at' => $date
            ];

            for ($j = 1; $j <= rand(1, 5); $j++) {
                $tasks[] = [
                    'todo_list_id' => $i,
                    'title' => "The Tasl {$j} of todo list {$i}",
                    'created_at' => $date,
                    'updated_at' => $date,
                    'completed_at' => rand(0, 1) == 0 ? NULL: $date
                ];
            }
        }

        DB::table('todolists')->insert($todolists);
        DB::table('tasks')->insert($tasks);
    }

}
