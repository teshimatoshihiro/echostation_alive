<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => '児玉浩康',
                'is_requester' => True,
                'email' => 'user1@example.com',
                'password' => Hash::make('12345678'),
                'speciality' => '心臓',
                'notes' => '超音波専門医',
                'skyway_url' => 'skyway1',
                'region' => '関東'
            ],
            [
                'username' => '新川優愛',
                'is_requester' => True,
                'email' => 'yua@example.com',
                'password' => Hash::make('12345678'),
                'speciality' => '上腹部',
                'notes' => '超音波検査士',
                'skyway_url' => 'skyway2345',
                'region' => '関東'
            ],
            [
                'username' => '手嶋敏裕',
                'is_requester' => True,
                'email' => 'tessey@example.com',
                'password' => Hash::make('12345678'),
                'speciality' => '下腹部',
                'notes' => '超音波検査士',
                'skyway_url' => 'teshiteshi123',
                'region' => '九州'
            ],
            [
                'username' => '徳竹喜子',
                'is_requester' => False,
                'email' => 'su@example.com',
                'password' => Hash::make('12345678'),
                'speciality' => '上腹部',
                'notes' => '内科医師',
                'skyway_url' => 'sususu123',
                'region' => '関東'
            ],
            [
                'username' => '山田太郎',
                'is_requester' => False,
                'email' => 'yamada@example.com',
                'password' => Hash::make('12345678'),
                'speciality' => '下腹部',
                'notes' => '臨床検査技師',
                'skyway_url' => 'baseball1',
                'region' => '四国'
            ],
            [
                'username' => 'CUNE',
                'is_requester' => False,
                'email' => 'cune@example.com',
                'password' => Hash::make('12345678'),
                'speciality' => '上腹部、下腹部',
                'notes' => '超音波専門医',
                'skyway_url' => 'cune1',
                'region' => '東北'
            ],
            [
                'username' => '大杉太郎',
                'is_requester' => False,
                'email' => 'taro@example.com',
                'password' => Hash::make('12345678'),
                'speciality' => '上腹部',
                'notes' => '超音波専門医',
                'skyway_url' => 'codeisvolume',
                'region' => '北海道'
            ],
            [
                'username' => '後藤成希',
                'is_requester' => False,
                'email' => 'goto@example.com',
                'password' => Hash::make('12345678'),
                'skyway_url' => 'gotty',
                'notes' => '超音波専門医',
                'region' => '九州',
                'speciality' => '上腹部、下腹部'
            ],

            // ここに必要なユーザーを追加してください
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
