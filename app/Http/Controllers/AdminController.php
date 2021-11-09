<?php

namespace App\Http\Controllers;
Use App\Admin;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function connexion(Request $request){
       
        $user=new User();
        $adminEmail=Admin::where($user->email,$request->email)->get()->first();
        
        $userPass=Admin::where($user->password,$request->password)->get();
        if($userEmail && $userPass){
          return response() ->json(["user"=>$userEmail]);
        }else{
          return response()->json(['error'=>'Opps ! Error'],409); 
        }
      }
}
