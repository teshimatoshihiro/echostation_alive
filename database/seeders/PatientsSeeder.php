<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $users = [
      [
        'username' => 'user1',
        'email' => 'user1@example.com',
        'password' => Hash::make('12345678'),
        'role' => '依頼',
        'specialty' => '内科',
        'qualification_year_1' => '医師 10年',
        'qualification_year_2' => '看護師 10年',
        'notes' => 'ユーザー1の備考',
      ],
      [
        'username' => 'user2',
        'email' => 'user2@example.com',
        'password' => Hash::make('12345678'),
        'role' => '受託',
        'specialty' => '外科',
        'qualification_year_1' => '医師 10年',
        'qualification_year_2' => 'スタッフ 10年',
        'notes' => 'ユーザー2の備考',
      ],
      [
        'username' => 'user3',
        'email' => 'user3@example.com',
        'password' => Hash::make('password3'),
        'role' => '依頼',
        'specialty' => '小児科',
        'qualification_year_1' => '医師 10年',
        'qualification_year_2' => '看護師 10年',
        'notes' => 'ユーザー3の備考',
      ],
      [
        'username' => 'user4',
        'email' => 'user4@example.com',
        'password' => Hash::make('password4'),
        'role' => '受託',
        'specialty' => '眼科',
        'qualification_year_1' => '医師 10年',
        'qualification_year_2' => 'スタッフ 10年',
        'notes' => 'ユーザー4の備考',
      ],

      // ここに必要なユーザーを追加してください
    ];

    foreach ($users as $user) {
      DB::table('users')->insert($user);
    }
  }
}
