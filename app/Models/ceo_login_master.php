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
    protected $primaryKey = 'CEOL_id';
}
