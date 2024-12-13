<?php

namespace App\Http\Controllers;
use App\Models\EmpMaster;       //define model
use Illuminate\Http\Request;

class EmpMasterController extends Controller
{
    // 1. Add Employee
    public function addEmployee(Request $request)
    {
        // Validate the incoming request
       try{ $validatedData = $request->validate([
            'employee_login_id' => 'required|integer',
            'manager_id' => 'required|integer',
            'team_id' => 'required|integer',
            'employee_name' => 'required|string',
            'employee_department' => 'required|string',
            'employee_role' => 'required|string',
            'employee_isactive' => 'required|boolean',
        ]);

        // Create a new employee record
        $employee = EmpMaster::create([
            'empl_id' => $validatedData['employee_login_id'],
            'created_by_m_id' => $validatedData['manager_id'],
            't_id' => $validatedData['team_id'],
            'emp_name' => $validatedData['employee_name'],
            'emp_dept' => $validatedData['employee_department'],
            'emp_role' => $validatedData['employee_role'],
            'emp_isactive' => $validatedData['employee_isactive'],
        ]);
    

        return response()->json([
            'message' => 'Employee added successfully.',
            'data' => $employee,
        ], 201);
    }catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to add Employee',
            'error' => $e->getMessage(),
        ], 400);
    }
    }

    // Get All Employees by API
    public function getAllEmployees()
    {
        try{
            $emp = EmpMaster::all();

            return response()->json([
                'message' => 'Employee fetched successfully.',
                'emp' => $emp, 
            ], 200);
        }catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to fetched Employee',
            'error' => $e->getMessage(),
        ], 400);
        }
    }

     // Get Employee by ID API
     public function getEmployeeById($id)
     {
         $emp = EmpMaster::find($id);
 
         if (!$emp ) {
             return response()->json([
                 'message' => 'Employee not found.',
             ], 404);
         }
 
         return response()->json([
             'message' => 'User fetched successfully.',
             'user' => $emp ,
         ], 200);
    }

    // Update Employee API
    public function updateEmp(Request $request, $id)
    {

        $request->validate([
            'employee_login_id' => 'required|integer',
            'manager_id' => 'required|integer',
            'team_id' => 'required|integer',
            'employee_name' => 'required|string',
            'employee_department' => 'required|string',
            'employee_role' => 'required|string',
            'employee_isactive' => 'required|boolean',
           
         ]);

        $emp = EmpMaster::find($id);

        if (!$emp) {
            return response()->json([
                'message' => 'Employee not found.',
            ], 404);
        }


        $emp ->update([
            //database field        array               DB
            'empl_id' => $request->employee_login_id ?? $emp->empl_id,
            'created_by_m_id' => $request->manager_id ?? $emp->created_by_m_id,
            't_id' => $request-> team_id?? $emp->t_id,
            'emp_name' => $request->employee_name?? $emp->emp_name,
            'emp_dept'  => $request->employee_department?? $emp->emp_dept,
            'emp_role'  => $request->employee_role?? $emp->emp_role,
            'emp_isactive'  => $request->employee_isactive?? $emp->emp_isactive
        ]);

        return response()->json([
            'message' => 'Employee updated successfully.',
            'user' => $emp,
        ], 200);
    }

    //delete Employee
    public function deleteEmp($id)
    {
        $emp = EmpMaster::find($id);

        if (!$emp) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $emp->delete();

        return response()->json(['message' => 'Employee deleted successfully']);
    }

}
