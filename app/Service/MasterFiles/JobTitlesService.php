<?php

namespace App\Service\MasterFiles;

use App\Models\MasterFiles\JobTitle;
use App\Service\BaseService;

class JobTitlesService extends BaseService
{
    public $model;
    public $primaryKey;
    
    public function __construct()
    {
        $this->model = app()->make(JobTitle::class);
        $this->primaryKey = $this->model->getKeyName();
    }

    public function getJobTitlesByDepartment($dept_id)
    {
        if($dept_id == 0){
            return $this->model->with('department')->get();
        }

        return $this->model->where('dept_id', $dept_id)->with('department')->get();
    }      

}