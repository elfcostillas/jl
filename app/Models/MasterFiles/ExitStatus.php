<?php

namespace App\Models\MasterFiles;

use Illuminate\Database\Eloquent\Model;

class ExitStatus extends Model
{
    //

    protected $table = 'emp_exit_status';

    protected $primaryKey = 'id';   

    protected $fillable = [
        'status_desc'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'exit_status_id');
    }
}
