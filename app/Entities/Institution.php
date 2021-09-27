<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Institution extends Model implements Transformable
{
    use TransformableTrait;

    //se estiver true, vai usar as funcionalidades created_at, updated_at e deleted_at
    public $timestamps = true;
    
    protected $fillable = ['name'];

    public function groups(){
        return $this->hasMany(Group::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
