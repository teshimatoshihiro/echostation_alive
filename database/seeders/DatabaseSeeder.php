<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ユーザーシーダーデータを呼び出し
        $this->call(UsersSeeder::class);

        // リクエストシーダーデータを呼び出し
        // $this->call(RequestsSeeder::class);
    }
}
