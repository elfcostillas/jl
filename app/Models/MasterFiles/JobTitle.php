<?php

namespace App\Models\MasterFiles;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use LogsActivity;

    protected $table = 'job_titles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',    
        'dept_id',   
        'job_title_code',
        'job_title_name' 
    ];

    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo(Departments::class, 'dept_id');
    }
}


/*
id
dept_id
job_title_code
job_title_name
*/