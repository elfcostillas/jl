<?php

namespace App\Repositories\MasterFiles;

use App\Models\MasterFiles\BooleanOptions;
use App\Models\MasterFiles\CivilStatus;
use App\Models\MasterFiles\Company;

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

    public function getLocations()
    {
        // return Location::all();
    }

    public function getJobTitles()  
    {
        // return JobTitle::all();
    }

    public function getExitStatuses()
    {
        // return ExitStatus::all();
    }

    public function getEmployeeStatuses()
    {
        // return EmployeeStatus::all();
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
