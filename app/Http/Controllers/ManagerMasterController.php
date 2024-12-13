<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manager_master;      //import model

class ManagerMasterController extends Controller
{
    public function addManager(Request $request)
    {
        try {
            
            $validatedData = $request->validate([
                'manager_login_id' =>'required|integer',
                'ceo_id' => 'required|integer',
                'manager_name' => 'required|string',
                'manager_dept' => 'required|string',
                'manager_isActive' => 'required|boolean',

            ]);
            
            $Managermaster = manager_master::create([
                'MLM_id' => $validatedData['manager_login_id'],
                'CEO_id' => $validatedData['ceo_id'],
                'M_Name' => $validatedData['manager_name'],
                'M_Department' => $validatedData['manager_dept'],
                'M_isActive' => $validatedData['manager_isActive'],
            ]);

            return response()->json([
                'message' => 'ManagerMaster added successfully',
                'data' => $Managermaster->toArray(),
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to add ManagerMaster',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
     // Get All Manager API
     public function getManager()
     {
         $master = manager_master::all();
 
         return response()->json([
             'message' => 'Manager fetched successfully.',
             'users' => $master,
         ], 200);
     }

     // Get Manager by ID API
    public function getManagerById($id)
    {
        $manager = manager_master::find($id);

        if (!$manager ) {
            return response()->json([
                'message' => 'Manager not found.',
            ], 404);
        }

        return response()->json([
            'message' => 'Manager fetched successfully.',
            'user' => $manager,
        ], 200);
    }

     // Update Manager API
     public function updateManager(Request $request, $id)
     {
 
         $request->validate([
             'manager_login_id' => 'required|integer',
             'ceo_id' => 'required|integer',
             'manager_name' => 'required|string',
             'manager_dept' => 'required|string',
             'manager_isActive'=> 'required|boolean'
          ]);
 
         $manager = manager_master::find($id);
 
         if (!$manager) {
             return response()->json([
                 'message' => 'Manager not found.',
             ], 404);
         }
 
 
         $manager ->update([
             'MLM_id' => $request->manager_login_id ?? $manager->MLM_id,
             'CEO_id' => $request-> ceo_id ??  $manager->CEO_id,
             'M_Name' => $request->manager_name ??  $manager->M_Name,
             'M_Department' => $request->manager_dept ??  $manager->M_Department,
             'M_isActive' => $request->manager_isActive ??  $manager->M_isActive,
 
         ]);
 
         return response()->json([
             'message' => 'Manager updated successfully.',
             'user' => $manager,
         ], 200);
 
    }
     //Delete Manager API
     public function deleteManager($id)
     {
         $manager = manager_master::find($id);
 
         if (!$manager) {
             return response()->json(['message' => 'Manager not found'], 404);
         }
 
         $manager->delete();
 
         return response()->json(['message' => 'Manager deleted successfully']);
     }
 
}
