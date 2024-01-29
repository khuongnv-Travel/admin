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
    private $config;

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
     * 
     */
    public function formUpdate($input)
    {
        $data['datas'] = $this->listService->where('listtype_id', \DB::select("select id from listtype where code = '".$input['listtype_code']."'")[0]->id)->get();
        return $data;
    }
    /**
     * Lấy danh sách đối tượng
     */
    public function updateData($input): array
    {
        $this->config = config('supportConfig');
        // dd($input, $this->config);
        if(array_key_exists($input['code'], $this->config)){
            $data = $this->config[$input['code']];
            if(isset($data['options']) && $input['type'] && isset($data['options'][$input['type']])){
                $listtype = $this->listtypeService->where('code', $input['type'])->first();
                $lists = $this->listService->where('listtype_id', $listtype->id)->where('id', $input['listtype_id'])->first();
                $url = $data['options'][$input['type']]['url'] . $lists->order;
                $response = $this->apiService->callApi($url, $data['options'][$input['type']]['params'], $data['method']);
            }else{
                $response = $this->apiService->callApi($data['url'], $data['params'], $data['method']);
            }
            $result = $this->{$input['code']}($response, $input['listtype_id'] ?? '');
            return array('success' => true, 'message' => 'Cập nhật thành công');
        }else{
            return array('success' => false, 'message' => 'Không tồn tại mã <b class="text-primary">' . $input['code'] . '</b>!');
        }
    }
    /**
     * Lấy danh mục tỉnh thành
     * @param $data Dữ liệu truyền vào
     */
    public function danhmuctinhthanh($data)
    {
        $this->getDataDiaDanhHanhChinh($data, 'DM_TINH_THANH');
    }
    /**
     * Lấy danh mục quận huyện
     * @param $data Dữ liệu truyền vào
     */
    public function danhmucquanhuyen($data)
    {
        $this->getDataDiaDanhHanhChinh($data, 'DM_QUAN_HUYEN');
    }
    /**
     * Lấy danh mục phường xã
     * @param $data Dữ liệu truyền vào
     */
    public function danhmucphuongxa($data, $listtype_id = '')
    {
        $this->getDataDiaDanhHanhChinh($data, 'DM_PHUONG_XA', $listtype_id);
    }
    /**
     * Cập nhật danh mục địa danh hành chính
     * @param $data Dữ liệu truyền vào
     * @param $listtype_code Mã danh mục
     */
    public function getDataDiaDanhHanhChinh($data, $listtype_code, $parent_id = '')
    {
        $listtype = $this->listtypeService->where('code', $listtype_code)->first();
        if(empty($listtype)){
            $listtype = $this->insertListtype($listtype_code);
        }
        $arr = [];
        $lists = $this->listService->select('code')->where('listtype_id', $listtype->id)->get()->toArray();
        foreach($lists as $list){
            array_push($arr, $list['code']);
        }
        $params = [];
        dd($data);
        foreach($data as $key => $value){
            $params = [
                'id' => (string)\Str::uuid(),
                'listtype_id' => $listtype->id,
                'code' => strtoupper($value['codename']),
                'parent_id' => $parent_id,
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
    public function insertListtype ($listtype_code)
    {
        foreach($this->config as $k => $v){
            if($v['code'] == $listtype_code){
                $name = $v['name_listtype'];
            }
        }
        $params = [
            'id' => (string)\Str::uuid(),
            'code' => $listtype_code,
            'name' => $name ?? '',
            'order' => $this->listtypeService->select('*')->count() + 1,
            'status' => 1,
        ];
        $this->listtypeService->insert($params);
        return $this->listtypeService->where('code', $listtype_code)->first();
    }
}