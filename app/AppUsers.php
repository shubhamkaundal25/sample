<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class AppUsers extends Authenticatable


// class AppUsers extends Model
{ use HasApiTokens, Notifiable;

    protected $table='app_users';
    protected $fillable=['f_name','l_name','phone','phone_code','email','password','user_type','description','latitude','longitude','city','otp','is_user_verified','remember_token'];


    protected $hidden = [
'password', 'remember_token',
];

protected $primaryKey = 'id';
}

