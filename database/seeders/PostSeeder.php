<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *php artisan db:seed --class=PostSeeder
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => Str::random(4),
            'text' => Str::random(100),
            'user_id' => rand(1,3),
            'category_id' => 1,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
