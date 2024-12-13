<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project_task_master extends Model
{
 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_task_master';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ptm_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'p_duration',
        'p_task_duration',
        'p_task_name',
        'p_task_description',
        'p_isstart',
        'p_iscompleted',
        'p_isactive',
        'p_status',
        'p_remarks',
        'ptc_emp_id',
    ];
    protected $casts=[
        'p_isactive' =>'boolean',
        'p_isstart'=>'date',
        'p_iscompleted'=>'date',
    ];

    public function toArray()
    {
        return [
            'project_task_master_id' => $this->ptm_id,
            'project_duration' => $this->p_duration,
            'project_task_duration' => $this->p_task_duration,
            'project_task_name' => $this->p_task_name,
            'project_task_description' => $this->p_task_description,
            'project_isstart' => $this->p_isstart,
            'project_iscompleted' => $this->p_iscompleted,
            'project_isactive' => $this->p_isactive,
            'project_status' => $this->p_status,
            'project_remarks' => $this->p_remarks,
            'Project_task_completed_Employee_id' => $this->ptc_emp_id,
        ];
    }
}
