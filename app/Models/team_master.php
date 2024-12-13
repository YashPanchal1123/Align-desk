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
        't_isactive',
    ];
    protected $casts=[
        't_isactive' =>'boolean',
    ];

    public function toArray()
    {
        return [
            'team_id' => $this->t_id,
            'ceo_id' => $this->ceo_id,
            'm_id' => $this->m_id,
            'team_name' => $this->t_name,
            'team_department' => $this->t_dept,
            'team_isactive' => $this->t_isactive,
        ];
    }
}
