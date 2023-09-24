<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $requests = [
            [
                'requesting_user_id' => 1,
                'accepting_user_id' => 2,
                'request_message' => 'ユーザー1からユーザー2への依頼メッセージ',
                'request_type' => '腹部',
                'request_status' => '緊急',
                'age' => 30,
                'gender' => '男性',
                'chief_complaint' => '腹痛',
                'medical_history' => '高血圧',
                'vitals' => '血圧: 120/80',
                'skyway_id_1' => 'Skyway ID 1',
                'skyway_id_2' => 'Skyway ID 2',
            ],
            [
                'requesting_user_id' => 3,
                'accepting_user_id' => 4,
                'request_message' => 'ユーザー3からユーザー4への依頼メッセージ',
                'request_type' => '胸部',
                'request_status' => '通常',
                'age' => 25,
                'gender' => '女性',
                'chief_complaint' => '呼吸困難',
                'medical_history' => '喘息',
                'vitals' => '呼吸数: 20',
                'skyway_id_1' => 'Skyway ID 3',
                'skyway_id_2' => 'Skyway ID 4',
            ],
             [
                'requesting_user_id' => 3,
                'accepting_user_id' => 4,
                'request_message' => 'ユーザー3からユーザー4への依頼メッセージ',
                'request_type' => '胸部',
                'request_status' => '通常',
                'age' => 25,
                'gender' => '女性',
                'chief_complaint' => '呼吸困難',
                'medical_history' => '喘息',
                'vitals' => '呼吸数: 20',
                'skyway_id_1' => 'Skyway ID 3',
                'skyway_id_2' => 'Skyway ID 4',
            ],
            [
                'requesting_user_id' => 4,
                'accepting_user_id' => 3,
                'request_message' => 'ユーザー4からユーザー3への依頼メッセージ',
                'request_type' => '腹部',
                'request_status' => '緊急',
                'age' => 30,
                'gender' => '男性',
                'chief_complaint' => '腹痛',
                'medical_history' => '胃潰瘍',
                'vitals' => '血圧: 120/80',
                'skyway_id_1' => 'Skyway ID 4',
                'skyway_id_2' => 'Skyway ID 3',
            ],
            // ここに必要なリクエストを追加してください
        ];

        foreach ($requests as $request) {
            DB::table('requests')->insert($request);
        }
    }
}
