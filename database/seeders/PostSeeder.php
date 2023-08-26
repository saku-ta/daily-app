<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
                'user_id' => '1',
                'body' => '今日は友達と喧嘩をして悲しかった…。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
