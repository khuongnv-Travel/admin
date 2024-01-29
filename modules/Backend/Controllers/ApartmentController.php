<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Backend\Services\ApartmentService;

class ApartmentController extends Controller
{
    private $apartmentService;
    public function __construct(ApartmentService $apartmentService)
    {
        $this->apartmentService = $apartmentService;
    }
    /**
     * Trang Index
     */
    public function index()
    {
        $data = $this->apartmentService->index();
        return view('apartments.index', $data);
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $data = $this->apartmentService->loadList($request->all());
        return $data;
    }
    /**
     * Thêm mới
     */
    public function create(Request $request)
    {
        $data = $this->apartmentService->create($request->all());
        return view('apartments.add', $data);
    }
    /**
     * Sửa
     */
    public function edit(Request $request)
    {
        $data = $this->apartmentService->edit($request->all());
        return view('apartments.add', $data);
    }
    /**
     * Cập nhật
     */
    public function update(Request $request)
    {
        $data = $this->apartmentService->_update($request->all());
        return $data;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $data = $this->apartmentService->_delete($request->all());
        return $data;
    }
    /**
     * Cập nhật số thứ tự
     */
    public function updateOrderTable(Request $request)
    {
        $data = $this->apartmentService->updateOrderTable($request->all());
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $data = $this->apartmentService->changeStatus($request->all());
        return $data;
    }
    /**
     * 
     */
    public function uploadFile(Request $request)
    {
        $data = $this->apartmentService->uploadFile($request->all());
        return $data;
    }
}