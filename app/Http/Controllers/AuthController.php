<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    //this is also define 
use Illuminate\Support\Facades\Validator;   //this is also define 
use App\Models\ceo_login_master;        //define ceo_login_master
use App\Models\manager_login_master;        //define manager_login_master

class AuthController extends Controller
{
       // CEO_LOGIN API FOR Register

       public function register(Request $request)
       {
           $validator = Validator::make($request->all(), [
               'CEO_email' => 'required|unique:ceo_login_master,CEO_Email',     //here left side field created by own it's toArray() 
               'CEO_password' => 'required|min:4',
           ]);
   
           if ($validator->fails()) {
               return response()->json(['error' => $validator->errors()], 400);
           }
   
           $ceo = ceo_login_master::create([
               'CEO_Email' => $request->CEO_email,
               'CEO_Password' => Hash::make($request->CEO_password),
           ]);
   
           return response()->json([
               'message' => 'CEO registered successfully',
               'data' => [
                   'CEO_login_id' => $ceo->CEOL_Id,
                   'CEO_email' => $ceo->CEO_Email,
                   'CEO_password' => '****', 
               ],
           ], 201);
       }

        // CEO Login API
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CEO_email' => 'required',
            'CEO_password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $ceo = ceo_login_master::where('CEO_Email', $request->CEO_email)->first();

        if (!$ceo || !Hash::check($request->CEO_password, $ceo->CEO_Password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'data' => [
                'CEO_login_id' => $ceo->CEOL_Id,
                'CEO_email' => $ceo->CEO_Email,
                'CEO_password' => '****',
            ],
        ], 200);
    }

     // MANAGER_LOGIN API FOR Register

     public function manager_register(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'manager_email' => 'required|unique:manager_login_master,M_Email',     //here left side field created by own it's toArray() 
             'manager_password' => 'required|min:4',
         ]);
 
         if ($validator->fails()) {
             return response()->json(['error' => $validator->errors()], 400);
         }
 
         $manager = manager_login_master::create([
             'M_Email' => $request->manager_email,
             'M_Password' => Hash::make($request->manager_password),
         ]);
 
         return response()->json([
             'message' => 'Manager registered successfully',
             'data' => [
                 'manager_login_id' => $manager->MLM_id,
                 'manager_email' => $manager->M_Email,
                 'manager_password' => '****', 
             ],
         ], 201);
     }

     // MANAGER Login API
    public function manager_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'manager_email' => 'required',
            'manager_password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $manager = manager_login_master::where('M_Email', $request->manager_email)->first();

        if (!$manager || !Hash::check($request->manager_password, $manager->M_Password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'data' => [
                'manager_login_id' => $manager->MLM_id,
                'manager_email' => $manager->M_Email,
                'manager_password' => '****',
            ],
        ], 200);
    }
   
}
