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