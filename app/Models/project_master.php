<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project_master extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_master';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'p_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'p_name',
        'p_description',
        'm_id',
        'ptm_id',
        't_id',
        't_isactive',
    ];

    protected $casts = [
        't_isactive' => 'boolean',
    ];

    public function toArray()
    {
        return [
            'project_id' => $this->p_id,
            'manager_id' => $this->m_id,
            'team_id' => $this->t_id,
            'project_task_master_id' => $this->ptm_id,
            'project_name' => $this->p_name,
            'project_description' => $this->p_description,
            'team_isactive' => $this->t_isactive,
        ];
    }
}
