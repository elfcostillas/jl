<?php

namespace App\Http\Controllers\MasterFiles;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterFiles\JobTitles\CreateRequest;
use App\Http\Requests\MasterFiles\JobTitles\UpdateRequest;
use App\Service\MasterFiles\DepartmentsService;
use App\Service\MasterFiles\JobTitlesService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobTitlesController extends Controller
{
    public function __construct(protected JobTitlesService $jobTitlesService, protected DepartmentsService $departmentsService)
    {

    }

    public function index(Request $request)
    {
        $department_filter = ($request->input('search')) ? $request->input('search') : 0;

        $departments = $this->departmentsService->getAll();
        $jobTitles = $this->jobTitlesService->getJobTitlesByDepartment($department_filter);

        return Inertia::render('MyApp/MasterFiles/JobTitles/MainPage', [
            'departments' => $departments,
            'jobTitles' => $jobTitles
        ]);
    }   

    public function create(CreateRequest $request)
    {
        $validated = $request->validated();

        $result = $this->jobTitlesService->create($validated);

        if ($result instanceof \Throwable) {
            return response()->json([
                'message' => $result->getMessage()
            ], 500);
        }

        return response()->json(['message' => 'Job Title created successfully']); 
    }

    public function update(UpdateRequest $request)
    {
        $validated = $request->validated();

        $result = $this->jobTitlesService->update($validated);

        if ($result instanceof \Throwable) {
            return response()->json([
                'message' => $result->getMessage()
            ], 500);
        }

        return response()->json(['message' => 'Job Title updated successfully']); 
    }
}
