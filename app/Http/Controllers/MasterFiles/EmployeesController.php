<?php

namespace App\Http\Controllers\MasterFiles;

use App\Http\Controllers\Controller;
use App\Models\MasterFiles\Employee;
use App\Repositories\MasterFiles\EmployeeOptionsRepository;
use App\Service\MasterFiles\CompanyService;
use App\Service\MasterFiles\EmployeesService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeesController extends Controller
{
    public function __construct(protected EmployeesService $employeesService,protected CompanyService $companyService,protected EmployeeOptionsRepository $employeeOptionsRepository)
    {
        
    }

    public function index(Request $request)
    {
        $company_filter = ($request->input('company_search')) ? $request->input('company_search') : 0;
        $employees = $this->employeesService->getEmployeesByCompany($company_filter);
        // $company = $this->companyService->getAll();
        $dept_search = ($request->input('dept_search')) ? $request->input('dept_search') : 0;

        $civil_status = $this->employeeOptionsRepository->getCivilStatuses();
        $companies = $this->employeeOptionsRepository->getCompanies();
        $departments = $this->employeeOptionsRepository->getDepartments();
        $locations = $this->employeeOptionsRepository->getLocations();
        $job_titles = $this->employeeOptionsRepository->getJobTitles($dept_search);
        $exit_statuses = $this->employeeOptionsRepository->getExitStatuses();
        $employee_statuses = $this->employeeOptionsRepository->getEmployeeStatuses();
        $employee_types = $this->employeeOptionsRepository->getEmployeeTypes();             
        $pay_types = $this->employeeOptionsRepository->getPayTypes();
        $release_types = $this->employeeOptionsRepository->getReleaseTypes();
        $employee_levels = $this->employeeOptionsRepository->getEmployeeLevels();
        $boolean_options = $this->employeeOptionsRepository->getBooleanOption();


        return Inertia::render('MyApp/MasterFiles/Employees/MainPage', [
            'employees' => $employees,
            'company' => $companies,
            'civil_status' => $civil_status,
            'departments' => $departments,
            'locations' => $locations,
            'job_titles' => $job_titles,
            'exit_statuses' => $exit_statuses,
            'employee_statuses' => $employee_statuses,
            'employee_types' => $employee_types,
            'pay_types' => $pay_types,
            'release_types' => $release_types,
            'employee_levels' => $employee_levels,
            'boolean_options' => $boolean_options
        ]);
    }
}
