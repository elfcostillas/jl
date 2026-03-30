<?php

namespace App\Models\MasterFiles;

use Illuminate\Database\Eloquent\Model;

class CivilStatus extends Model
{
    protected $table = 'civil_status';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'stat_code',
        'stat_desc'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'civil_status');
    }
}
