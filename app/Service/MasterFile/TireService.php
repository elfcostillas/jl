<?php

namespace App\Service\MasterFile;

use App\Models\MasterFiles\Tires;
use App\Repositories\MasterFiles\TireRepository;
use App\Service\BaseService;

class TireService extends BaseService
{
    /**
     * Create a new class instance.
     */
    public $model;
    
    public function __construct(protected TireRepository $tireRepository)
    {
        $this->model = app()->make(Tires::class);
    }

    public function getAllTires($type = 0)
    {
        return $this->tireRepository->getAllTires($type);
    }
    

}
