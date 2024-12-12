<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager_master extends Model
{
    use HasFactory;

    protected $table = 'manager_master';

    protected $fillable = [
       ' MLM_id',
       ' CEO_id',
        'M_Name',
        'M_Department',
        'M_isActive'
    ];
    protected $primaryKey = 'M_id';

    protected $casts = [
        'M_isActive'=> 'boolean', 
    ];
}
