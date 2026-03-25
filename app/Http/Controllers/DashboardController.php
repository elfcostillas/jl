<?php

namespace App\Http\Controllers;

use App\Repositories\MasterFiles\VehicleRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct(protected VehicleRepository $vehicleRepository)
    {
       
    }

    public function index()
    {
        // $vehicles = $this->vehicleRepository->dashboardCountByType();
        return inertia('Dashboard');
    }
}
