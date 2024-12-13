<?php

namespace App\Http\Controllers;
use App\Models\project_task_master; //model 
use Illuminate\Http\Request;

class ProjectTaskMasterController extends Controller
{
    // 1. Add project task
    public function addProjectTask(Request $request)
    {
        // Validate the incoming request
       try{ 
            $validatedData = $request->validate([
            'project_task_master_id' => 'required|integer',
            'project_duration' => 'required|date',
            'project_task_duration' => 'required|date',
            'project_task_name' => 'required|string',
            'project_task_description' => 'required|string',
            'project_isstart' => 'required|date',
            'project_iscompleted' => 'required|date',
            'project_isactive' => 'required|boolean',
            'project_status' => 'required|string',
            'project_remarks' => 'required|string',
            'Project_task_completed_Employee_id' => 'required|integer',
        ]);

        // Create a new task record
        $task = project_task_master::create([
            'ptm_id' => $validatedData['project_task_master_id'],
            'p_duration' => $validatedData['project_duration'],
            'p_task_duration' => $validatedData['project_task_duration'],
            'p_task_name' => $validatedData['project_task_name'],
            'p_task_description' => $validatedData['project_task_description'],
            'p_isstart' => $validatedData['project_isstart'],
            'p_iscompleted' => $validatedData['project_iscompleted'],
            'p_isactive' => $validatedData['project_isactive'],
            'p_status' => $validatedData['project_status'],
            'p_remarks' => $validatedData['project_remarks'],
            'ptc_emp_id' => $validatedData['Project_task_completed_Employee_id'],
        ]);
    

        return response()->json([
            'message' => 'Project Task added successfully.',
            'task' => $task,
        ], 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to add Project Task',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

//     // Get All project Task by API
    public function getAllTasks()
    {
        try{
            $task = project_task_master::all();

            return response()->json([
                'message' => 'Project Tasks fetched successfully.',
                'task' => $task, 
            ], 200);
        }catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to fetched Project Tasks',
            'error' => $e->getMessage(),
        ], 400);
        }
    }

//     // Get Project by ID API
    public function getTaskById($id)
    {
        $task = project_task_master::find($id);

        if (!$task ) {
            return response()->json([
                'message' => 'Projects Task not found.',
            ], 404);
        }

        return response()->json([
            'message' => 'Projects Task fetched successfully.',
            'task' => $task ,
        ], 200);
   }

//    // Update Employee API
   public function updateTask(Request $request, $id)
   {

       $request->validate([
        'project_task_master_id' => 'required|integer',
        'project_duration' => 'required|date',
        'project_task_duration' => 'required|date',
        'project_task_name' => 'required|string',
        'project_task_description' => 'required|string',
        'project_isstart' => 'required|date',
        'project_iscompleted' => 'required|date',
        'project_isactive' => 'required|boolean',
        'project_status' => 'required|string',
        'project_remarks' => 'required|string',
        'Project_task_completed_Employee_id' => 'required|integer',
          
        ]);

       $task = project_task_master::find($id);

       if (!$task) {
           return response()->json([
               'message' => 'project task not found.',
           ], 404);
       }


       $task ->update([
           //database field        array               DB
           'ptm_id' => $request->project_task_master_id ?? $task->ptm_id,
           'p_duration' => $request->project_duration ?? $task->p_duration,
           'p_task_duration' => $request->project_task_duration?? $task->p_task_duration,
           'p_task_name' => $request->project_task_name?? $task->p_task_name,
           'p_task_description' => $request->project_task_description?? $task->p_task_description,
           'p_isstart'  => $request->project_isstart?? $task->p_isstart,
           'p_iscompleted'  => $request->project_iscompleted?? $task->p_iscompleted,
           'p_isactive'  => $request->project_isactive?? $task->p_isactive,
           'p_status'  => $request->project_status?? $task->p_status,
           'p_remarks'  => $request->project_remarks?? $task->p_remarks,
           'ptc_emp_id'  => $request->Project_task_completed_Employee_id??$task->ptc_emp_id,
       ]);

       return response()->json([
           'message' => 'Project task updated successfully.',
           'task' => $task,
       ], 200);
   }

//     //delete Employee
    public function deleteTask($id)
    {
        $task = project_task_master::find($id);

        if (!$task) {
            return response()->json(['message' => 'Project task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Project Task Deleted Successfully']);
    }

}
