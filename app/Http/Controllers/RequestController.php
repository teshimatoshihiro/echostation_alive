<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // リクエスト一覧を取得
        $requests = RequestModel::all();

        return view('requests.index', compact('requests'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // リクエスト作成フォームを表示
        return view('requests.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // リクエストを作成
        RequestModel::create($request->all());

        return redirect()->route('requests.index')
            ->with('success', 'リクエストが作成されました');
        //
    }

    public function edit(RequestModel $request)
    {
        // リクエストの編集フォームを表示
        return view('requests.edit', compact('request'));
    }

    public function update(Request $updateRequest, RequestModel $request)
    {
        // リクエストを更新
        $request->update($updateRequest->all());

        return redirect()->route('requests.index')
            ->with('success', 'リクエストが更新されました');
    }


    public function destroy(RequestModel $request)
    {
        // リクエストを削除
        $request->delete();

        return redirect()->route('requests.index')
            ->with('success', 'リクエストが削除されました');
    }
}
