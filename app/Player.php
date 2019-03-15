<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Draw;

class Player extends Model
{
    protected $fillable = [
        'name', 'draws'
    ];

    public function drawslist()
    {
        return $this->hasMany('App\Draw', 'player_id', 'id');
    }

}
