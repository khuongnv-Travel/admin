<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
        return view('dashboard.index');
    }
}