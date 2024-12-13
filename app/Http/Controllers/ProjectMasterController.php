<?php

namespace App\Http\Controllers;
use App\Models\project_master; //model 
use Illuminate\Http\Request;

class ProjectMasterController extends Controller
{
    // 1. Add project
    public function addProject(Request $request)
    {
        // Validate the incoming request
       try{ 
            $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'manager_id' => 'required|integer',
            'team_id' => 'required|integer',
            'project_task_master_id' => 'required|integer',
            'project_name' => 'required|string',
            'project_description' => 'required|string',
            'team_isactive' => 'required|boolean',
        ]);

        // Create a new employee record
        $project = project_master::create([
            'p_id' => $validatedData['project_id'],
            'm_id' => $validatedData['manager_id'],
            't_id' => $validatedData['team_id'],
            'ptm_id' => $validatedData['project_task_master_id'],
            'p_name' => $validatedData['project_name'],
            'p_description' => $validatedData['project_description'],
            't_isactive' => $validatedData['team_isactive'],
        ]);
    

        return response()->json([
            'message' => 'Project added successfully.',
            'data' => $project,
        ], 201);
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to add Project',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    // Get All project by API
    public function getAllProjects()
    {
        try{
            $project = project_master::all();

            return response()->json([
                'message' => 'projects fetched successfully.',
                'project' => $project, 
            ], 200);
        }catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to fetched Projects',
            'error' => $e->getMessage(),
        ], 400);
        }
    }

    // Get Project by ID API
    public function getProjectById($id)
    {
        $project = project_master::find($id);

        if (!$project ) {
            return response()->json([
                'message' => 'Projects not found.',
            ], 404);
        }

        return response()->json([
            'message' => 'Projects fetched successfully.',
            'project' => $project ,
        ], 200);
   }

   // Update Employee API
   public function updateProject(Request $request, $id)
   {

       $request->validate([
            'project_id' => 'required|integer',
            'manager_id' => 'required|integer',
            'team_id' => 'required|integer',
            'project_task_master_id' => 'required|integer',
            'project_name' => 'required|string',
            'project_description' => 'required|string',
            'team_isactive' => 'required|boolean',
          
        ]);

       $project = project_master::find($id);

       if (!$project) {
           return response()->json([
               'message' => 'project not found.',
           ], 404);
       }


       $project ->update([
           //database field        array               DB
           'p_id' => $request->project_id ?? $project->p_id,
           'm_id' => $request->manager_id ?? $project->m_id,
           't_id' => $request->team_id?? $project->t_id,
           'ptm_id' => $request->project_task_master_id?? $project->ptm_id,
           'p_name' => $request->project_name?? $project->p_name,
           'p_description'  => $request->project_description?? $project->p_description,
           't_isactive'  => $request->team_isactive?? $project->t_isactive
       ]);

       return response()->json([
           'message' => 'Project updated successfully.',
           'project' => $project,
       ], 200);
   }

    //delete Employee
    public function deleteProject($id)
    {
        $project = project_master::find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $project->delete();

        return response()->json(['message' => 'project deleted successfully']);
    }

}
