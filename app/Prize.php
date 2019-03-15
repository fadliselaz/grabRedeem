<?php

namespace App;

use App\Traits\HasEnums;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    use HasEnums;

	// set enums
    public static $types = [
			            '0' => 'Small Prize',
			        	'1' => 'Grand Prize'
			        ];

    protected $fillable = [
        'name', 'qty', 'type'
    ];

    public function getTypeStringAttr()
    {
        return $this->getEnumValue(self::$types, $this->type);
    }

    public function draws()
    {
        return $this->hasMany('App\Draw', 'prize_id');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule', 'prize_id');
    }

    public function qtyRemains()
    {
        return ($this->qty - $this->draws->count());
    }

    public function qtyScheduleRemains()
    {
        return ($this->qty - $this->schedules->count());
    }

    public function qtyOut()
    {
        return $this->draws->count();  
    }
}
