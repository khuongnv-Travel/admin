<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Backend\Services\CarService;
use Modules\Core\Helpers\ListtypeHelper;

class CarController extends Controller
{
    private $carService;

    public function __construct(
        CarService $carService
    ){
        $this->carService = $carService;
    }
    /**
     * Index
     */
    public function index(Request $request)
    {
        $data['listtype'] = ListtypeHelper::_getAllByCode('DM_LOAI_XE');
        return view('cars.index', $data);
    }
    /**
     * Trang danh sách
     */
    public function loadList(Request $request)
    {
        $data = $this->carService->loadList($request->all());
        return $data;
    }
    /**
     * Thêm mới
     */
    public function create(Request $request)
    {
        $data = $this->carService->_create($request->all());
        return view('cars.add', $data);
    }
    /**
     * Sửa
     */
    public function edit(Request $request)
    {
        $data = $this->carService->_edit($request->all());
        return view('cars.add', $data);
    }
    /**
     * Cập nhật
     */
    public function update(Request $request)
    {
        $data = $this->carService->_update($request->all());
        return $data;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $data = $this->carService->_delete($request->all());
        return $data;
    }
    /**
     * Cập nhật số thứ tự
     */
    public function updateOrderTable(Request $request)
    {
        $data = $this->carService->updateOrderTable($request->all());
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $data = $this->carService->changeStatus($request->all());
        return $data;
    }
}