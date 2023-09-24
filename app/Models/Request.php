<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'requesting_user_id',
        'accepting_user_id',
        'request_message',
        'request_type',
        'request_status',
        'age',
        'gender',
        'chief_complaint',
        'medical_history',
        'vitals',
        'skyway_id_1',
        'skyway_id_2',
    ];

     public function requestingUser()
    {
        return $this->belongsTo(User::class, 'requesting_user_id');
    }

    /**
     * リクエストを受けたユーザーへのリレーション
     */
    public function acceptingUser()
    {
        return $this->belongsTo(User::class, 'accepting_user_id');
    }
}
