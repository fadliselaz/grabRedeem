<?php

namespace App;

use App\Traits\HasEnums;
use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{
    use HasEnums;

    public static $statuses = [
			            '0' => 'Canceled',
			        	'1' => 'Unclaimed',
			        	'2' => 'Claimed',
			        ];

    protected $fillable = [
		'status', 'prize_id', 'player_id'
    ];

    public function getStatusStringAttr()
    {
        return $this->getEnumValue(self::$statuses, $this->status);
    }

    public function prize()
    {
        return $this->hasOne('App\Prize' , 'id', 'prize_id');
    }

    public function player()
    {
        return $this->hasOne('App\Player', 'id', 'player_id');
    }
}
