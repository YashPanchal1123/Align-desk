<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager_login_master extends Model
{
    use HasFactory;

    protected $table = 'manager_login_master';

    protected $fillable = [
        'M_Email',
        'M_Password'
    ];
    protected $primaryKey = 'MLM_id';


}
