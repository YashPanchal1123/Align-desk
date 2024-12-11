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
        'p_remarks',
        'ptc_emp_id',
    ];
}
