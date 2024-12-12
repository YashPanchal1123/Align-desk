<?php

namespace App\Http\Controllers;

use App\Models\CEOMaster;   //import model
use Illuminate\Http\Request;

class CEOMasterController extends Controller
{
    public function addCEO(Request $request)
    {
        try {
            
            $validatedData = $request->validate([
                'ceo_login_id' => 'required|integer',
                'ceo_name' => 'required|string',
                'ceo_is_active' => 'required|boolean',
            ]);

            
            $CEOMaster = CEOMaster::create([
                'CEOL_id' => $validatedData['ceo_login_id'],
                'CEO_Name' => $validatedData['ceo_name'],
                'CEO_isActive' => $validatedData['ceo_is_active'],
            ]);

            return response()->json([
                'message' => 'CEOMaster added successfully',
                'data' => $CEOMaster->toArray(),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to add CEOMaster',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
    // Get All CEO API
    public function getCEO()
    {
        $ceo = CEOMaster::all();

        return response()->json([
            'message' => 'CEO fetched successfully.',
            'users' => $ceo,
        ], 200);
    }

    // Get CEO by ID API
    public function getCEOById($id)
    {
        $ceo = CEOMaster::find($id);

        if (!$ceo ) {
            return response()->json([
                'message' => 'User not found.',
            ], 404);
        }

        return response()->json([
            'message' => 'User fetched successfully.',
            'user' => $ceo ,
        ], 200);
    }

    // Update CEO API
    public function updateCEO(Request $request, $id)
    {

        $request->validate([
            'ceo_login_id' => 'required|integer',
            'ceo_name' => 'required|string',
            'ceo_is_active' => 'required|boolean',
           
         ]);

        $ceo = CEOMaster::find($id);

        if (!$ceo) {
            return response()->json([
                'message' => 'CEO not found.',
            ], 404);
        }


        $ceo ->update([
            'CEOL_id' => $request->ceo_login_id ?? $ceo->CEOL_id,
            'CEO_Name' => $request-> ceo_name ??  $ceo->CEO_Name,
            'CEO_isActive' => $request->ceo_is_active ??  $ceo->CEO_isActive,

        ]);

        return response()->json([
            'message' => 'CEO updated successfully.',
            'user' => $ceo,
        ], 200);
    }

}