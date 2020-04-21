<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Timeclock extends Model
{
    //
    protected $table = 'timeclocks';
    protected $fillable = [
        'user_id',
        'direction',
        'stamp'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
