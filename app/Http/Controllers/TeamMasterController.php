<?php

namespace App\Http\Controllers;
use App\Models\team_master; //model 
use Illuminate\Http\Request;

class TeamMasterController extends Controller
{
  // 1. Add Team
  public function addTeam(Request $request)
  {
      // Validate the incoming request
     try{ 
          $validatedData = $request->validate([
          'team_id' => 'required|integer',
          'ceo_id' => 'required|integer',
          'm_id' => 'required|integer',
          'team_name' => 'required|string',
          'team_department' => 'required|string',
          'team_isactive' => 'required|boolean',
        ]);

      // Create a new task record
      $team = team_master::create([
          't_id' => $validatedData['team_id'],
          'ceo_id' => $validatedData['ceo_id'],
          'm_id' => $validatedData['m_id'],
          't_name' => $validatedData['team_name'],
          't_dept' => $validatedData['team_department'],
          't_isactive' => $validatedData['team_isactive'],
        ]);
  

      return response()->json([
          'message' => 'Team added successfully.',
          'team' => $team,
      ], 201);
      }catch (\Exception $e) {
          return response()->json([
              'message' => 'Failed to add Team',
              'error' => $e->getMessage(),
          ], 400);
      }
  }

//     // Get All project Task by API
  public function getAllTeam()
  {
      try{
          $team = team_master::all();

          return response()->json([
              'message' => 'teams fetched successfully.',
              'team' => $team, 
          ], 200);
      }catch (\Exception $e) {
      return response()->json([
          'message' => 'Failed to fetched Project Team',
          'error' => $e->getMessage(),
      ], 400);
      }
  }

// //     // Get Project by ID API
  public function getTeamById($id)
  {
      $team = team_master::find($id);

      if (!$team ) {
          return response()->json([
              'message' => 'Team not found.',
          ], 404);
      }

      return response()->json([
          'message' => 'Team fetched successfully.',
          'team' => $team ,
      ], 200);
 }

  // Update Employee API
 public function updateTeam(Request $request, $id)
 {

     $request->validate([
        'team_id' => 'required|integer',
        'ceo_id' => 'required|integer',
        'm_id' => 'required|integer',
        'team_name' => 'required|string',
        'team_department' => 'required|string',
        'team_isactive' => 'required|boolean',
      ]);

     $task = project_task_master::find($id);
     if (!$task) {
         return response()->json([
             'message' => 'project task not found.',
         ], 404);
     }
     $task ->update([
         //database field        array               DB
         'team_id' => $request->project_task_master_id ?? $task->t_id,
         'ceo_id' => $request->project_duration ?? $task->ceo_id,
         'm_id' => $request->project_task_duration?? $task->m_id,
         'team_name' => $request->project_task_name?? $task->team_name,
         'team_department' => $request->project_task_description?? $task->team_department,
         'team_isactive'  => $request->project_isstart?? $task->team_isactive,
        ]);

     return response()->json([
         'message' => 'Project task updated successfully.',
         'task' => $task,
     ], 200);
 }

// //     //delete Employee
//   public function deleteTask($id)
//   {
//       $task = project_task_master::find($id);

//       if (!$task) {
//           return response()->json(['message' => 'Project task not found'], 404);
//       }

//       $task->delete();

//       return response()->json(['message' => 'Project Task Deleted Successfully']);
//   }
}
