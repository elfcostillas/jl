<?php

namespace App\Repositories\MasterFiles;

use App\Models\MasterFiles\BooleanOptions;
use App\Models\MasterFiles\CivilStatus;
use App\Models\MasterFiles\Company;
use App\Models\MasterFiles\EmployeeStatus;

use App\Models\MasterFiles\SiteLocations;

class EmployeeOptionsRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
      
    }

    public function getCivilStatuses()
    {
        return CivilStatus::all();
    }

    public function getCompanies()
    {
        return Company::all();
    }

    public function getDepartments()
    {
        // return Department::all();
    }   

    public function getLocations($company_id = 0)
    {
        // return Locationation::all();
        if($company_id != 0){
            return SiteLocations::where('company_id', $company_id)->get();       
        }   
        return SiteLocations::all();
    }

    public function getJobTitles($depar)  
    {
        // return JobTitle::all();
        /*
        job_titles
        id
        dept_id
        job_title_code
        job_title_name
        */
    }

    public function getExitStatuses()
    {
        // return ExitStatus::all();
    }

    public function getEmployeeStatuses()
    {
        return EmployeeStatus::all();
    }

    public function getEmployeeTypes()
    {
        // return EmployeeType::all();
    }

    public function getPayTypes()
    {
        // return PayType::all();
    }

    public function getReleaseTypes()
    {
        // return ReleaseType::all();
    }

    public function getEmployeeLevels()
    {
        // return EmployeeLevel::all();
    }

    public function getBooleanOption()
    {
       return BooleanOptions::all();
    }
}
