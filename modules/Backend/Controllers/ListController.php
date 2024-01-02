<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Backend\Services\ListService;

class ListController extends Controller
{
    private $listService;
    public function __construct(ListService $listService)
    {
        $this->listService = $listService;
    }
    /**
     * Trang Index
     */
    public function index()
    {
        $data = $this->listService->index();
        return view('listtype.list.index', $data);
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $data = $this->listService->loadList($request->all());
        return $data;
    }
    /**
     * Thêm mới
     * Request
     */
    public function create(Request $request)
    {
        $data = $this->listService->create($request->all());
        if(isset($data['success']) && $data['success'] == false){
            return $data;
        }
        return view('listtype.list.add', $data);
    }
    /**
     * Sửa
     */
    public function edit(Request $request)
    {
        $data = $this->listService->edit($request->all());
        return view('listtype.list.add', $data);
    }
    /**
     * Cập nhật
     */
    public function update(Request $request)
    {
        $data = $this->listService->_update($request->all());
        return $data;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $data = $this->listService->_delete($request->all());
        return $data;
    }
    /**
     * Cập nhật số thứ tự
     */
    public function updateOrderTable(Request $request)
    {
        $data = $this->listService->updateOrderTable($request->all());
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $data = $this->listService->changeStatus($request->all());
        return $data;
    }
}