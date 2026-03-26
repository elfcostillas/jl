<?php

namespace App\Http\Controllers\MasterFiles;

use App\Http\Controllers\Controller;
use App\Service\MasterFiles\CompanyService;
use App\Service\MasterFiles\SiteLocationsService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SiteLocationsController extends Controller
{
    public function __construct(protected CompanyService $companyService, protected SiteLocationsService $siteLocationsService)
    {
        //
    }

    public function index(Request $request)
    {
        $company_filter = ($request->input('search')) ? $request->input('search') : 0;

        $company = $this->companyService->getAll();
        $sites = $this->siteLocationsService->getSitesByCompany($company_filter);

        return Inertia::render('MyApp/MasterFiles/SiteLocations/MainPage', [
            'company' => $company,
            'sites' => $sites
        ]);
    }   
}
