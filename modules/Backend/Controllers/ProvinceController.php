<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Backend\Services\ProvinceService;

class ProvinceController extends Controller
{
    private $provinceService;

    public function __construct(
        ProvinceService $provinceService
    ){
        $this->provinceService = $provinceService;
    }
    public function changeProvince(Request $request)
    {
        $data = $this->provinceService->changeProvince($request->all());
        return $data;
    }
    public function changeDistrict(Request $request)
    {
        $data = $this->provinceService->changeDistrict($request->all());
        return $data;
    }
}