<?php

namespace App\Service\MasterFiles;

use App\Models\MasterFiles\Departments;
use App\Service\BaseService;

class DepartmentsService extends BaseService
{
    public $model;
    public $primaryKey;

    public function __construct()
    {
        $this->model = app()->make(Departments::class);
        $this->primaryKey = $this->model->getKeyName();
    }

    public function getAllDepartments()
    {
        return $this->model->get();
    }   
}
