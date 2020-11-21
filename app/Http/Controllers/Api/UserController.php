<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\AppUsers;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\UserDetails;
use Carbon\Carbon;
use Laravel\Passport\Passport; 
use DB;
 
class UserController extends Controller
{
    public function Register(Request $request)

    {
      try{
          if($request->isMethod("POST"))
          {
             $inputs=$request->all();
             // $otp=generateNumericOTP();
             $otp="1234";

             if((new AppUsers())->where('phone',$inputs['phone'])->exists())
             {
               return(['success'=>false,'status_code'=>200,'message'=>'This Phone Number Already Exists','result'=>[]]);

             }

             // $otp="1234";

             // SendTextMessage($inputs['phone']," OTP For Account Verification is ".$otp." Please Enter This OTP To Verify Your Frisbiz Account");

			 $data=array( 'phone'=>$inputs['phone'],
             'phone_code'=>$inputs['phone_code'],
             
             'password'=>bcrypt($inputs['password']),
             
             'otp'=>$otp
              );

 

             $create=(new AppUsers())->insertGetId($data);

              $user_details=(new UserDetails())->create(['user_id'=>$create]);
             $response=(new AppUsers())->where('id',$create)->select('phone','otp','id')->get();

             return(['success'=>true,'status_code'=>200,'message'=>'Record Created Successfully','result'=>$response->toArray()]);

          }

          else
          {
          	return (['success'=>false,'status_code'=>500,'message'=>"Oops! Something Went Wrong "]);
          }
      }
      catch(\Exception $e)
      {
      	echo $e->getMessage();
      }




    }


    public function verifyOtp(Request $request)
    {
      try{
        if($request->isMethod('post'))
        {
          $inputs=$request->all();
          $data=(new AppUsers())->where('phone',$inputs['phone'])->first();
          if($data->otp==$inputs['otp'])
          {  
            (new AppUsers())->where('phone',$inputs['phone'])->update(['is_user_verified'=>'1']);



            $generateAuthToken = (new AppUsers())
            ->join('user_details','app_users.id','=','user_details.user_id')->select('app_users.*','user_details.f_name_set','user_details.l_name_set','user_details.email_set','user_details.city_set','user_details.latitude_set','user_details.longitude_set','user_details.user_type_set','user_details.description_set')
            ->where('app_users.phone',$inputs['phone'])
            ->first();

             if (!session('app_user_id')) {
           session(['app_user_id' => $generateAuthToken->id]);
        }

        $userId = session()->get('app_user_id');
                DB::table('oauth_access_tokens')->where('user_id', $userId)->update(['revoked' => true]);

          $tokenResult = $generateAuthToken->createToken('Personal Access Token');
        $token = $tokenResult->token;
         $generateAuthToken['token']=$tokenResult->accessToken;
            return(['success'=>true,'status_code'=>200,'message'=>'OTP Matched Successfully','result'=>$generateAuthToken]);
          }

          else
          {
              return(['success'=>false,'status_code'=>200,'message'=>'OTP Not Matched','result'=>[]]);
          }

        }


        else
        {
               return (['success'=>false,'status_code'=>500,'message'=>"Oops! Something Went Wrong "]);
        }

      }


        catch(\Exception $e)
        {
          echo $e->getMessage();
        }

    }

    public function details(Request $request)
    {
 // dd($request->header('Authorization'));
      $user = auth()->guard('api')->user(); 
      // dd()
      return response()->json($user);
    }



    public function ResendOtp(Request $request)

    {
      try{
            if($request->isMethod('post'))
            {
              $inputs=$request->all();

              if((new AppUsers())->where('phone',$inputs['phone'])->exists())
              {
                 $otp=generateNumericOTP();
                 $otp="1234";

                 (new AppUsers())->where('phone',$inputs['phone'])->update(['otp'=>$otp]);

                 // SendTextMessage($inputs['phone']," OTP For Account Verification is ".$otp." Please Enter This OTP To Verify Your Frisbiz Account");

                 return (['success'=>true,'status_code'=>200,'message'=>"OPT Sent Successfully"]);
              }

              else
              {
                return (['success'=>false,'status_code'=>200,'message'=>"This Number Do Not Exist In Our Records"]);
              }



            }

            else

            {
              return (['success'=>false,'status_code'=>500,'message'=>"Oops! Something Went Wrong "]);
            }
      }

      catch(\Exception $e)
      {
        echo $e->getMessage();
      }
    }


    
}
