<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // 追加：認証ユーザー情報取得のため

class MatchesController extends Controller
{
    // public function matchUsers(Request $request)
    // {
    //     $requirements = ['心臓', '上腹部', '下腹部'];

    //     $matchedUsers = [];
    //     foreach ($requirements as $requirement) {
    //         $users = User::withSpeciality($requirement)->get();
    //         $matchedUsers = array_merge($matchedUsers, $users->toArray());
    //     }

    //     $matchedUsers = array_unique($matchedUsers, SORT_REGULAR);

    //     return response()->json($matchedUsers);
    // }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    // public function show(Matches $matches)
    // {
    //     $user_id = Auth::id(); // ログイン中のユーザーIDを取得

    //     $matches = Matches::where('requester_id', $user_id)
    //         ->with('user')
    //         ->get();

    //     return view('matches.index', ['matches' => $matches]);
    // }

    public function showSkyway($userId)
    {
        // 必要に応じてユーザーの情報やその他のデータを取得する処理をここに追加します。
        $user = User::find($userId);

        // ユーザーが存在しない場合は、404エラーを返す
        if (!$user) {
            abort(404);
        }

        return view('skyway', ['user' => $user]);
    }


    public function listBySpeciality($speciality)
    {
        // ここで特定の専門領域を持つユーザーを5名まで取得
        $usersWithSpeciality = User::where('speciality',
            $speciality
        )
        ->take(5)
        ->get();

        Log::info('listBySpeciality method was called with speciality: ' . $speciality);

        return view('matches.index', ['matches' => $usersWithSpeciality]);
    }

    //     $usersWithSpeciality = User::where('speciality', $speciality)->get();
    //     Log::info('listBySpeciality method was called with speciality: ' . $speciality);

    //     return view('matches.index', ['matches' => $usersWithSpeciality]);
    // }

    public function edit(Matches $matches)
    {
        //
    }

    public function update(Request $request, Matches $matches)
    {
        //
    }

    public function destroy(Matches $matches)
    {
        //
    }
}
