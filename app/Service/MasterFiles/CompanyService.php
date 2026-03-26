<?php

namespace App\Service\MasterFiles;

use App\Models\MasterFiles\Company;
use App\Service\BaseService;

class CompanyService extends BaseService
{
    public $model;
    public $primaryKey;
    
    public function __construct()
    {
        $this->model = app()->make(Company::class);
        $this->primaryKey = $this->model->getKeyName();
    }


}
