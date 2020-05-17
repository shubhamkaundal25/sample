<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
     protected $table='user_details';
    protected $fillable=['user_id','f_name_set','l_name_set','email_set','user_type_set','description_set','latitude_Set','longitude_set','city_set'];
}
