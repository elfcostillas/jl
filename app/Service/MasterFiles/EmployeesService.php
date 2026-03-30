<?php

namespace App\Service\MasterFiles;

use App\Models\MasterFiles\Employee;
use App\Service\BaseService;

class EmployeesService extends BaseService
{

    public $model;
    public $primaryKey;
    
    public function __construct()
    {
        $this->model = app()->make(Employee::class);
        $this->primaryKey = $this->model->getKeyName();
    }

    public function getEmployeesByCompany($company_id)
    {
        $result = $this->model  
            ->with('company')
            ->with('siteLocation')
            ->with('exitStatus')
            ->with('employeeStatus');

        if ($company_id && $company_id != 0) {
            return $result->where('company_id', $company_id)->get();
        } else {
            return $result->get(); 
        }
    }
}