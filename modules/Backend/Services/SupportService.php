<?php

namespace Modules\Backend\Services;

use Modules\Backend\Models\ListModel;
use Modules\Backend\Models\ListtypeModel;
use Modules\Core\Helpers\ListtypeHelper;
use Modules\Core\Https\ApiService;

class SupportService
{
    private $apiService;
    private $listtypeService;
    private $listService;
    public function __construct(ApiService $apiService, ListtypeService $listtypeService, ListService $listService)
    {
        $this->apiService      = $apiService;
        $this->listtypeService = $listtypeService;
        $this->listService = $listService;
    }
    /** 
     * Trang Index
     * @return array
     */
    public function index(): array
    {
        $data['datas'] = config('supportConfig');
        $data['DM_TINH_THANH'] = ListtypeHelper::_getAllByCode('DM_TINH_THANH');
        $data['DM_QUAN_HUYEN'] = ListtypeHelper::_getAllByCode('DM_QUAN_HUYEN');
        $data['DM_PHUONG_XA'] = ListtypeHelper::_getAllByCode('DM_PHUONG_XA');
        return $data;
    }
    /**
     * Lấy danh sách đối tượng
     */
    public function updateData($input): array
    {
        $config = config('supportConfig');
        if(array_key_exists($input['code'], $config)){
            $data = $config[$input['code']];
            $response = $this->apiService->callApi($data['url'], $data['params'], $data['method']);
            $result = $this->{$input['code']}($response, ($input['type'] ?? ''));
            return array('success' => true, 'message' => 'Cập nhật thành công');
        }else{
            return array('success' => false, 'message' => 'Không tồn tại mã <b class="text-primary">' . $input['code'] . '</b>!');
        }
    }
    /**
     * Lấy danh mục tỉnh thành
     * @param $data Dữ liệu truyền vào
     */
    public function danhmuctinhthanh($data, $type = '')
    {
        $this->getDataDiaDanhHanhChinh($data, 'DM_TINH_THANH');
    }
    /**
     * Lấy danh mục quận huyện
     * @param $data Dữ liệu truyền vào
     */
    public function danhmucquanhuyen($data, $type = '')
    {
        $this->getDataDiaDanhHanhChinh($data, 'DM_QUAN_HUYEN');
    }
    /**
     * Lấy danh mục phường xã
     * @param $data Dữ liệu truyền vào
     */
    public function danhmucphuongxa($data, $type = '')
    {
        $this->getDataDiaDanhHanhChinh($data, 'DM_PHUONG_XA', $type);
    }
    /**
     * Cập nhật danh mục địa danh hành chính
     * @param $data Dữ liệu truyền vào
     * @param $listtype_code Mã danh mục
     */
    public function getDataDiaDanhHanhChinh($data, $listtype_code, $type = '')
    {
        $listtype = $this->listtypeService->where('code', $listtype_code)->first();
        $arr = [];
        $lists = $this->listService->select('code')->where('listtype_id', $listtype->id)->get()->toArray();
        foreach($lists as $list){
            array_push($arr, $list['code']);
        }
        $params = [];
        foreach($data as $key => $value){
            $params = [
                'id' => (string)\Str::uuid(),
                'listtype_id' => $listtype->id,
                'listtype_code' => $listtype->code,
                'code' => strtoupper($value['codename']),
                'code_other' => strtoupper($value['code']),
                'name' => $value['name'],
                'note' => $value['division_type'],
                'order' => $key + 1,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            if(!in_array(strtoupper($value['codename']), $arr)){
                $this->listService->insert($params);
            }else{
                $this->listService->where('listtype_id', $listtype->id)->where('code', strtoupper($value['codename']))->update($params);
            }
        }
    }
}