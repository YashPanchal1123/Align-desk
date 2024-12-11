<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class emp_master extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emp_master';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'emp_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empl_id',
        'created_by_m_id',
        't_id',
        'emp_name',
        'emp_dept',
        'emp_role',
    ];
}
