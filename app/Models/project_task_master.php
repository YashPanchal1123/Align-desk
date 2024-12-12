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
        'p_duration',
        'p_task_duration',
        'p_task_name',
        'p_task_description',
        'p_isStart',
        'p_isCompleted',
        'p_isActive',
        'p_status',
        'p_remarks',
        'ptc_emp_id',
    ];
    protected $casts=[
        'p_isActive' =>'boolean',
        'p_isStart'=>'date',
        'p_isCompleted'=>'date',
    ];
}
