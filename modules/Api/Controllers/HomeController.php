<?php

namespace Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Api\Services\HomeService;

class HomeController extends Controller
{
    private $homeService;

    public function __construct(
        HomeService $homeService
    ){
        $this->homeService = $homeService;
    }
    public function blogs(Request $request)
    {
        $data = $this->homeService->loadBlog($request->all());
        return response()->json($data);
    }
}