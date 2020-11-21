<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\AppUsers;
use Laravel\Passport\Passport; 

use Carbon\Carbon;
use DB;
use App\UserDetails;
class AuthController extends Controller
{

	 public function login(Request $request)
    {
    $inputs=$request->all();


    if((new AppUsers())->where('phone',$inputs['phone'])->exists())

{    if(Auth::attempt(['phone' => $inputs['phone'], 'password' =>$inputs['password']],true)){ 
            $user = Auth::user();
            
            // $success['token'] =  $user->createToken('MyApp')->accessToken; 
            // Passport::tokensExpireIn(Carbon::now()->addDays(15));


             $generateAuthToken = (new AppUsers())
             ->join('user_details','app_users.id','=','user_details.user_id')->select('app_users.*','user_details.f_name_set','user_details.l_name_set','user_details.email_set','user_details.city_set','user_details.latitude_set','user_details.longitude_set','user_details.user_type_set','user_details.description_set')
             ->where('app_users.phone',$inputs['phone'])
             ->first();

             if($generateAuthToken->is_user_verified=='0')
             {
             	return(['success' => false,'status_code'=>200,'message'=>"User is Not Verified!",'result'=> (object)[]]);
             }
 
             if (!session('app_user_id')) {
           session(['app_user_id' => $generateAuthToken->id]);
        }

        $userId = session()->get('app_user_id');
        DB::table('oauth_access_tokens')->where('user_id', $userId)->update(['revoked' => true]);
        $tokenResult = $generateAuthToken->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $generateAuthToken['token']=$tokenResult->accessToken;

            return(['success' => true,'status_code'=>200,'message'=>"Login Successfull",'result'=>$generateAuthToken]); 
        } 
        else{ 
            return(['success' => false,'status_code'=>200,'message'=>"Please Check Your Login Credentials",'result'=> (object)[]]); 
        } 
    }

    else
    {
    	 return(['success' => false,'status_code'=>200,'message'=>"User not found, please signup.",'result'=> (object)[]]);
    }
    }

    }
