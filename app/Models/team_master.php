<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class team_master extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'team_master';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 't_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ceo_id',
        'm_id',
        't_name',
        't_dept',
    ];
}
