<?php

namespace Modules\Backend\Services;

use Modules\Backend\Repositories\CarRepository;
use Modules\Core\BaseService;

class CarService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }
    public function repository()
    {
        return CarRepository::class;
    }
    /**
     * Trang danh sách
     * @param $input Dữ liệu đầu vào
     * @return array
     */
    public function loadList($input)
    {
        $input['sort'] = 'order';
        $data['datas'] = $this->repository->filter($input);
        return array(
            'arrData' => view('cars.loadList', $data)->render(),
            'perPage' => $input['limit'],
        );;
    }
    /**
     * Thêm mới
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function create($input): array
    {
        $data['listtype'] = ListtypeHelper::_getAllByCode('DM_LOAI_XE');
        $data['listtype_id'] = $input['listtype_id'] ?? '';
        $rooms = $this->repository->select('order')->orderBy('order', 'desc')->first();
        $data['order'] = isset($rooms->order) ? (int)$rooms->order + 1 : 1;
        $data['provinces'] = ListtypeHelper::_getAllByCode('DM_TINH_THANH');
        return $data;
    }
}