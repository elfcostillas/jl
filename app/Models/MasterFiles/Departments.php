<?php

namespace App\Models\MasterFiles;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use LogsActivity;

    protected $table = 'departments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',       
        'dept_code',
        'dept_name' 
    ];
    
    public $timestamps = false;

    public function jobTitles()
    {
        return $this->hasMany(JobTitle::class, 'dept_id');
    }
}
