<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Backend\Services\CategoriesService;

class CategoriesController extends Controller
{
    private $categoriesService;
    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }
    /**
     * Trang Index
     */
    public function index()
    {
        $data = $this->categoriesService->index();
        return view('categories.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $data = $this->categoriesService->loadList($request->all());
        return $data;
    }
    /**
     * Thêm mới
     */
    public function create(Request $request)
    {
        $data = $this->categoriesService->create($request->all());
        return view('categories.add', $data);
    }
    /**
     * Sửa
     */
    public function edit(Request $request)
    {
        $data = $this->categoriesService->edit($request->all());
        return view('categories.add', $data);
    }
    /**
     * Cập nhật Danh sách
     */
    public function addListtype(Request $request)
    {
        $data = $this->categoriesService->addListtype($request->all());
        return view('categories.addListtype', $data);
    }
    /**
     * Cập nhật Danh sách
     */
    public function updateListtype(Request $request)
    {
        $data = $this->categoriesService->updateListtype($request->all());
        return $data;
    }
    /**
     * Cập nhật Danh sách đối tượng
     */
    public function addList(Request $request)
    {
        $data = $this->categoriesService->addList($request->all());
        return view('categories.addList', $data);
    }
    /**
     * Cập nhật Danh sách đối tượng
     */
    public function updateList(Request $request)
    {
        $data = $this->categoriesService->updateList($request->all());
        return $data;
    }
    /**
     * 
     */
    public function refresh(Request $request)
    {
        $data = $this->categoriesService->refresh($request->all());
        return $data;
    }
    /**
     * Cập nhật
     */
    public function update(Request $request)
    {
        $data = $this->categoriesService->_update($request->all());
        return $data;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $data = $this->categoriesService->_delete($request->all());
        return $data;
    }
    /**
     * Cập nhật số thứ tự
     */
    public function updateOrderTable(Request $request)
    {
        $data = $this->categoriesService->updateOrderTable($request->all());
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $data = $this->categoriesService->changeStatus($request->all());
        return $data;
    }
}