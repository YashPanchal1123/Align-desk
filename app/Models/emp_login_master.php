<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class emp_login_master extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emp_login_master';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'empl_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_email',
        'emp_password',
    ];

}
