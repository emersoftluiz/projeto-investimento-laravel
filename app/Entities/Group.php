<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Group.
 *
 * @package namespace App\Entities;
 */
class Group extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'institution_id'];

    public function getTotalValueAttribute()
    {
        /*
        $total = 0;
        foreach($this->moviments as $moviment)
            $total += $moviment->value;

        return $total;
        */

        //return $this->moviments()->where('type', 1)->sum('value') - $this->moviments()->where('type', 2)->sum('value');
        return $this->moviments()->applications()->sum('value') - $this->moviments()->outflows()->sum('value');
    }

    public function owner()
    {
        //Um grupo pertence a um usuário através do metodo "owner"
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        //Relacionamento N:N
        return $this->belongsToMany(User::class, 'user_groups');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }

}
