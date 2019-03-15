<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
	protected $fillable = [
        'play_order', 'prize_id'
    ];
    //
    public function prize()
    {
        return $this->hasOne('App\Prize' , 'id', 'prize_id');
    }
}
