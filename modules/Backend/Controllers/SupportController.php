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
        $array = Excel::toArray(new UsersImport, $_FILES['files']['tmp_name']);
        // dd($array[0][1], $request->all());
        unset($array[0][0]);
        try {

            foreach ($array[0] as $key => $value) {
                $code_other = '';
                $param = [];
                if ($request->listtype_code == 'DM_TINH_THANH') {
                    $listtype_id = $this->getListtype($request->listtype_code)->id ?? null;
                    $code_other = $value[1];
                    $param = [
                        'parent_id' => null,
                        'code' => $value[1],
                        'name' => $value[0],
                    ];
                } else {
                    $listtype_code = $request->listtype_code == 'DM_QUAN_HUYEN' ? 'DM_TINH_THANH' : 'DM_QUAN_HUYEN';
                    $code_other = $value[3];
                    $listtype_id = $this->getListtype($request->listtype_code)->id ?? null;
                    $lists = $this->getList($this->getListtype($listtype_code)->id ?? null, strtoupper(str_replace('-', '_', \Str::slug($value[0]))));
                    $param = [
                        'parent_id' => $lists->id ?? null,
                        'code' => $value[3],
                        'name' => $value[2],
                    ];
                }
                // dd($value, $code_other, $listtype_id);
                if (is_numeric($code_other) !== false && !Cache::has('123')) {
                    // dd($code_other, $value);
                    $this->insert($param, $listtype_id);
                }
            }
            return array('success' => true, 'message' => 'thanhf cong');
        } catch (\Exception $e) {
            return array('success' => true, 'message' => $e->getMessage());
        }
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
    /**
     * Cập nhật DM_TINH_THANH
     */
    public function insert($data, $listtype_id)
    {
        $code = str_replace('-', '_', \Str::slug($data['name']));
        $param = [
            'parent_id' => $data['parent_id'],
            'listtype_id' => $listtype_id,
            'code' => strtoupper($code),
            'name' => $data['name'],
            'status' => 1,
        ];
        // dd($param);
        if (!$this->listService->where('listtype_id', $listtype_id)->where('code', $code)->exists()) {
            $param['order'] = $this->listService->where('listtype_id', $listtype_id)->count();
            $param['created_at'] = date('Y-m-d H:i:s');
            $this->listService->create($param);
            Cache::forever('123', '123');
            // Cache::forever('code_' . $data[1], $data[1]);
        } else {
            $param['updated_at'] = date('Y-m-d H:i:s');
            $this->listService->where('listtype_id', $listtype_id)->where('code', $code)->update($param);
            Cache::forever('123', '123');
            // Cache::forever('code_' . $data[1], $data[1]);
        }
    }
}
