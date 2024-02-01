<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Backend\Helpers\UsersImport;
use Modules\Backend\Services\ListService;
use Modules\Backend\Services\ListtypeService;
use Modules\Backend\Services\SupportService;

class SupportController extends Controller
{
    private $supportService;
    private $listtypeService;
    private $listService;

    public function __construct(SupportService $supportService, ListtypeService $listtypeService, ListService $listService)
    {
        $this->supportService = $supportService;
        $this->listtypeService = $listtypeService;
        $this->listService = $listService;
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
        $array = Excel::toArray(new UsersImport, $_FILES['files']['tmp_name']);
        unset($array[0][0]);
        foreach($array[0] as $key => $value){
            if(is_numeric($value[1]) !== false && !Cache::has('code_' . $value[1])){
                $this->insertDMTT($value);   
            }
        }
    }
    /**
     * Cache
     */
    public function getListtype($sCode)
    {
        if(!Cache::has('listtype_' . $sCode)){
            $data = $this->listtypeService->select('*')->where('code', $sCode)->first();
            if($data){
                Cache::forever('listtype_' . $sCode, $data);
            }
        }else{
            $data = Cache::get('listtype_'. $sCode);
        }
        return $data;
    }
    /**
     * Cập nhật DM_TINH_THANH
     */
    public function insertDMTT($data)
    {
        $code = str_replace('-', '_', \Str::slug($data[0]));
        $listtype_tinh_thanh = $this->getListtype('DM_TINH_THANH');
        $param = [
            'listtype_id' => $listtype_tinh_thanh->id ?? null,
            'code' => strtoupper($code),
            'name' => $data[0],
            'status' => 1,
        ];
        if(!$this->listService->where('listtype_id', $listtype_tinh_thanh->id)->where('code', $code)->exists()){
            $param['order'] = $this->listService->where('listtype_id', $listtype_tinh_thanh->id)->count();
            $param['created_at'] = date('Y-m-d H:i:s');
            $this->listService->create($param);
            Cache::forever('code_' . $data[1], $data[1]);
        }else{
            $param['updated_at'] = date('Y-m-d H:i:s');
            $this->listService->where('listtype_id', $listtype_tinh_thanh->id)->where('code', $code)->update($param);
            Cache::forever('code_' . $data[1], $data[1]);
        }
    }
}