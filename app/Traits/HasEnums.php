<?php

namespace App\Traits;

trait HasEnums
{

    public function getEnumValue($enumArray, $index)
    {
        try{
            return $enumArray[$index];
        } catch (\Exception $e){
            return "Undefined";
        }
    }

}