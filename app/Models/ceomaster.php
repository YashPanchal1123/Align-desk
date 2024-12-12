<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ceomaster extends Model
{
    use HasFactory;

    protected $table = 'ceo_master';

    protected $primaryKey = 'CEO_id';

    protected $fillable = [
        'CEOL_id',
        'CEO_Name',
        'CEO_isActive'
    ];

    protected $casts = [
        'CEO_isActive' => 'boolean',
    ];

    public function toArray()
    {           
        return [
            'id' => $this->CEO_id, 
            'ceo_login_id' => $this->CEOL_id,
            'ceo_name' => $this->CEO_Name,
            'ceo_is_active' => $this->CEO_isActive,
        ];
    }
}