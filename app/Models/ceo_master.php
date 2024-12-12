<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ceo_master extends Model
{
    use HasFactory;

    protected $table = 'ceo_master';

    protected $fillable = [
        'CEOL_id',
        'CEO_Name'
    ];
    protected $primaryKey = 'CEO_id';
}
