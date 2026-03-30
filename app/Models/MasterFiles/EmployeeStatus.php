<?php

namespace App\Models\MasterFiles;

use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{
    protected $table = 'emp_emp_stat';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'estatus_desc'
    ];

    public $timestamps = false;

    public function employees()
    {
        return $this->hasMany(Employee::class, 'employee_stat');
    }
}
