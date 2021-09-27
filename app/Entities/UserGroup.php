<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    Use softDeletes;
    use Notifiable;
    
    //se estiver true, vai usar as funcionalidades created_at, updated_at e deleted_at
    public $timestamps = true;

    protected $table = 'user_groups';

    //$fillable faz por injeção o mesmo que -> $usuario = new User(['Emerson', 'emersonbsi@gmail.com', '123456'])
    protected $fillable = [
        'user_id', 'group_id', 'permission'
    ];
    
    protected $hidden = [];
}
