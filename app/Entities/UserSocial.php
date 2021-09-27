<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\softDeletes;

class UserSocial extends Model
{
  Use softDeletes;
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  //se estiver true, vai usar as funcionalidades created_at, updated_at e deleted_at
  public $timestamps = true;

  protected $table = 'users';

  //$fillable faz por injeção o mesmo que -> $usuario = new User(['Emerson', 'emersonbsi@gmail.com', '123456'])
  protected $fillable = [
      'user_id', 'social_network', 'social_id', 'social_email', 'social_avatar'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
   /*
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];
  */
}
