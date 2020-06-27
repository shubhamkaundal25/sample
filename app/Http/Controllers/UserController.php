<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AppUsers;

class UserController extends Controller
{
    public function Index(Request $request)


    {
    	$users=(new AppUsers())->where('user_type','!=','3')->paginate('20');
    	

    	return view('users.index',['users'=>$users]);
    } 
}
