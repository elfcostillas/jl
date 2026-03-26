<?php

namespace App\Http\Controllers\MasterFiles;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterFiles\Company\CreateRequest;
use App\Http\Requests\MasterFiles\Company\UpdateRequest;
use App\Service\MasterFiles\CompanyService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function __construct(protected CompanyService $companyService)
    {
    

    }

    public function index(Request $request)
    {
        $company = $this->companyService->getAll();

        return Inertia::render('MyApp/MasterFiles/Company/MainPage', [
            'company' => $company
        ]);
    }
    
    public function create(CreateRequest $request)
    {
        $validated = $request->validated();

        $result = $this->companyService->create($validated);

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

        $result = $this->companyService->update($validated);

        if ($result instanceof \Throwable) {
            return response()->json([
                'message' => $result->getMessage()
            ], 500);
        }

        return response()->json(['message' => 'Company updated successfully']); 
    }
}
