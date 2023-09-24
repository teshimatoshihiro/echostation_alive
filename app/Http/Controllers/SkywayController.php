<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use NTTCom\OpenTok\OpenTok;

class SkywayController extends Controller
{
  private $skyway;

  public function __construct()
  {
    $skywayApiKey = config('services.skyway.api_key');
    $skywayApiSecret = config('services.skyway.api_secret');
  
    // SkyWayを初期化
    $this->skyway = new \Peer([
      'key' => $skywayApiKey,
      'debug' => 3
    ]);
  }

  public function index()
  {
    // 他のアクションも定義できます
    return view('skyway.index');
  }
}
