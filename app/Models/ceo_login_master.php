<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ceo_login_master extends Model
{
    use HasFactory;

    protected $table = 'ceo_login_master';

    protected $fillable = [
        'CEO_Email',
        'CEO_Password'
    ];
    protected $primaryKey = 'CEOL_Id';

//here we also define toArray() function used but we use another short method for ceo_login_master & manager_login_master
//we do not use toArray() function we added this feild directly in controller

}
