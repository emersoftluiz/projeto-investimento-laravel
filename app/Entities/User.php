<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    Use SoftDeletes;
    use Notifiable;
    
    //se estiver true, vai usar as funcionalidades created_at, updated_at e deleted_at
    public $timestamps = true;

    protected $table = 'users';

    //$fillable faz por injeção o mesmo que -> $usuario = new User(['Emerson', 'emersonbsi@gmail.com', '123456'])
    protected $fillable = [
        'cpf', 'name', 'phone', 'birth', 'gender', 'notes', 'email', 'password', 'status', 'permission'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
     /*
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    */

    public function groups()
    {
        //Relacionamento N:N
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function getFormattedCpfAttribute()
    {
        $cpf = $this->attributes['cpf'];

        $cpf = str_replace('-', '', $cpf);
        $cpf = str_replace('.', '', $cpf);

        return substr($cpf, 0, 3).'.'.substr($cpf, 3, 3).'.'.substr($cpf, 6, 3).'-'.substr($cpf, -2);
    }

    public function getFormattedPhoneAttribute()
    {
        $phone = $this->attributes['phone'];

        $phone = str_replace('(', '', $phone);
        $phone = str_replace(')', '', $phone);
        $phone = str_replace('-', '', $phone);

        return '('.substr($phone, 0, 2).') '.substr($phone, 2, 5).'-'.substr($phone, -4);
    }

    public function getFormattedBirthAttribute()
    {
        $birth = explode('-', $this->attributes['birth']);
        
        if(count($birth) != 3)
            return '';

        $birth = $birth[2].'/'.$birth[1].'/'.$birth[0];

        return $birth;
    }
}
