<?php

namespace App\Service\MasterFiles;

use App\Models\MasterFiles\SiteLocations;
use App\Service\BaseService;

class SiteLocationsService extends BaseService
{
    public $model;
    public $primaryKey;

    public function __construct()
    {
        $this->model = app()->make(SiteLocations::class);
        $this->primaryKey = $this->model->getKeyName();
    }

    public function getSitesByCompany($company_id)
    {
        if($company_id == 0){
            return $this->model
            ->with('company')
            ->get();
        }

        return $this->model->where('company_id', $company_id)
            ->with('company')
            ->get();
    }
}


