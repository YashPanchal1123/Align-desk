<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager_master extends Model
{
    use HasFactory;

    protected $table = 'manager_master';
    protected $primaryKey = 'M_id';

    protected $fillable = [
        'MLM_id',
        'CEO_id',
        'M_Name',
        'M_Department',
        'M_isActive'
    ];
  

    protected $casts = [
        'M_isActive'=> 'boolean', 
    ];

    public function toArray()
    {           
        return [
            'id' => $this->M_id, 
            'manager_login_id' => $this->MLM_id,
            'ceo_id' => $this->CEO_id,
            'manager_name' => $this->M_Name,
            'manager_dept' => $this->M_Department,
            'manager_isActive' => $this->M_isActive,
        ];
    }
}
