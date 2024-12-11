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
    ];
}
