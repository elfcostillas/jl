<?php

namespace App\Http\Controllers\MasterFiles;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterFiles\Departments\CreateRequest;
use App\Http\Requests\MasterFiles\Departments\UpdateRequest;
use App\Service\MasterFiles\DepartmentsService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DepartmentsController extends Controller
{
    public function __construct(protected DepartmentsService $departmentsService)
    {
        //
    }   

    public function index(Request $request)
    {
        $departments = $this->departmentsService->getAllDepartments();

        return Inertia::render('MyApp/MasterFiles/Departments/MainPage', [
            'departments' => $departments
        ]);
    }
    
    public function create(CreateRequest $request)
    {
        $validated = $request->validated();

        $result = $this->departmentsService->create($validated);

        if ($result instanceof \Throwable) {
            return response()->json([
                'message' => $result->getMessage()
            ], 500);
        }

        return response()->json(['message' => 'Company created successfully']); 
    }
    
    public function update(UpdateRequest $request)
    {
        $validated = $request->validated();

        $result = $this->departmentsService->update($validated);

        if ($result instanceof \Throwable) {
            return response()->json([
                'message' => $result->getMessage()
            ], 500);
        }

        return response()->json(['message' => 'Company updated successfully']); 
    }
}
