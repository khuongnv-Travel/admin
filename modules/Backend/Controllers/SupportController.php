<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Backend\Helpers\UsersImport;
use Modules\Backend\Services\SupportService;

class SupportController extends Controller
{
    private $supportService;
    public function __construct(SupportService $supportService)
    {
        $this->supportService = $supportService;
    }
    /**
     * Trang Index
     */
    public function index()
    {
        $data = $this->supportService->index();
        return view('support.index', $data);
    }
    /**
     * Cập nhật
     */
    public function formUpdate(Request $request)
    {
        $data = $this->supportService->formUpdate($request->all());
        return view('support.form', $data);
    }
    /**
     * Lấy thông tin danh sách
     */
    public function updateData(Request $request)
    {
        $data = $this->supportService->updateData($request->all());
        return $data;
    }
    /**
     * Lấy thông tin danh sách
     */
    public function updateFile(Request $request)
    {
        // dd($request->all(), $_FILES);
        // $data = $this->supportService->updateFile($request->all());
        // return $data;
        $file = $_FILES['files']['tmp_name'];
        $array = Excel::toArray(new UsersImport, $_FILES['files']['tmp_name']);
        // $array = Excel::load($file, function($reader) {
        //     // Getting all results
        //     $results = $reader->get();
        //     dd($results);
        //     // ->all() is a wrapper for ->get() and will work the same
        //     $results = $reader->all();
        // });
        dd($array[0][0], $array[0][1]);
        foreach($array[0] as $key => $value){
            // dd($array[0][1], \Str::slug($array[0][1][1]));
            if(is_numeric($value[0]) !== false){
                $code = str_replace('-', '_', \Str::slug($value[1]));
                $param = [
                    'code' => strtoupper($code),
                    'name' => $value[2],
                ];
                dd($param);
            }
        }
    }
}