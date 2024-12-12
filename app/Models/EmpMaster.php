<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmpMaster extends Model
{
    use HasFactory;

    protected $table = 'emp_master';

    protected $primaryKey = 'emp_id';

    protected $fillable = [
        'empl_id',
        'created_by_m_id',
        't_id',
        'emp_name',
        'emp_dept',
        'emp_role',
        'emp_isactive',
    ];

    protected $casts = [
        'emp_isactive' => 'boolean',
    ];

    public function toArray()
    {
        return [
            'employee_id' => $this->emp_id,
            'employee_login_id' => $this->empl_id,
            'manager_id' => $this->created_by_m_id,
            'team_id' => $this->t_id,
            'employee_name' => $this->emp_name,
            'employee_department' => $this->emp_dept,
            'employee_role' => $this->emp_role,
            'employee_isactive' => $this->emp_isactive,
        ];
    }
}
