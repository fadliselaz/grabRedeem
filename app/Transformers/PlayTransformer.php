<?php 
namespace App\Transformers;


use League\Fractal\TransformerAbstract;

class PlayTransformer extends TransformerAbstract
{

    public function transform($model)
    {
        return $model->toArray();
    }

}