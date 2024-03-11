<?php

namespace Modules\Backend\Repositories;

use Modules\Backend\Models\CarModel;
use Modules\Core\BaseRepository;

class CarRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return CarModel::class;
    }
}