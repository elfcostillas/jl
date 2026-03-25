<?php

namespace App\Service;

class BaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //   $this->model = app()->make($this->modelClassName);
    }

    public function create($request)
    {
        return $this->model->create($request);
    }
}
