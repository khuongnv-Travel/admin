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
     * Lấy thông tin danh sách
     */
    public function updateFile(Request $request)
    {
        // dd($request->all());
        $array = Excel::toArray(new UsersImport, $_FILES['files']['tmp_name']);
        // dd($array[0][0], $array[0][1], $request->all());
        if(!is_numeric($array[0][0][1])){
            unset($array[0][0]);
        }
        // $arrTinhThanh = array();
        // $arrQuanHuyen = array();
        // $arrPhuongXa = array();
        // $listtype_id_tt = $this->listtypeService->select('*')->where('code', 'DM_TINH_THANH')->first();
        // $listtype_id_qh = $this->listtypeService->select('*')->where('code', 'DM_QUAN_HUYEN')->first();
        // $listtype_id_px = $this->listtypeService->select('*')->where('code', 'DM_PHUONG_XA')->first();
        if(!isset($request->listtype_code)){
            return array('success' => false, 'message' => 'Bạn chưa chọn danh mục');
        }
        if($request->listtype_code == 'DM_TINH_THANH'){
            $data = $this->updateTT($array[0]);
        }elseif($request->listtype_code == 'DM_QUAN_HUYEN'){
            $data = $this->updateQH($array[0]);
        }elseif($request->listtype_code == 'DM_PHUONG_XA'){
            $data = $this->updatePX($array[0]);
        }
        return $data;
    }
    /**
     * Cache
     */
    public function getListtype($sCode)
    {
        if (!Cache::has('listtype_' . $sCode)) {
            $data = $this->listtypeService->select('*')->where('code', $sCode)->first();
            if ($data) {
                Cache::forever('listtype_' . $sCode, $data);
            }
        } else {
            $data = Cache::get('listtype_' . $sCode);
        }
        return $data;
    }
    /**
     * Cache
     */
    public function getList($listtype_id, $sCode)
    {
        if (!Cache::has('list_' . $listtype_id . '_' . $sCode)) {
            $data = $this->listService->select('*')->where('listtype_id', $listtype_id)->where('code', $sCode)->first();
            if ($data) {
                Cache::forever('list_' . $listtype_id . '_' . $sCode, $data);
            }
        } else {
            $data = Cache::get('list_' . $listtype_id . '_' . $sCode);
        }
        return $data;
    }
    public function updateTT($datas)
    {
        try {
            $listtype_code = 'DM_TINH_THANH';
            $listtype_id = Cache::get('listtype_' . $listtype_code)->id;
            $lists = $this->listService->where('listtype_id', $listtype_id)->get();
            $arrList = [];
            foreach($lists as $list){
                array_push($arrList, $list->code);
            }
            $order = 1;
            $arr = [];
            foreach ($datas as $key => $value) {
                $code = strtoupper(str_replace('-', '_', \Str::slug($value[0])));
                $listCode = $listtype_code . '_' . $code;
                if(is_numeric($value[1]) && !in_array($listCode, $arr)){
                    $this->getListtype($listtype_code);
                    array_push($arr, $listCode);
                    $params = [
                        'id' => $id ?? (string)\Str::uuid(),
                        'listtype_id' => $listtype_id,
                        'parent_id' => null,
                        'code' => $code,
                        'name' => $value[0],
                        'order' => $order++,
                        'status' => 1,
                    ];
                    if(in_array($code, $arrList)){
                        $params['updated_at'] = date('Y-m-d H:i:s');
                        $this->listService->where('listtype_id', $listtype_id)->where('code', $code)->update($params);
                    }else{
                        $params['created_at'] = date('Y-m-d H:i:s');
                        $this->listService->insert($params);
                    }
                }
            }
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        } catch (\Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }
}
