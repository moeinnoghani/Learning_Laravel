<?php

namespace App\Repositories;

use App\Models\Cycle;

class CycleRepository
{

    private Cycle $model;

    public function __construct()
    {
        $this->model = new Cycle();
    }

    public function getCycle()
    {
        return $this->model->pluck('amount', 'product_id');
    }


}
