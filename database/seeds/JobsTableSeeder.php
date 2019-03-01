<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            'user_id' => 1,
            'body' => str_random(20),
            
        ]);

    }
}
