<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Backend\Services\RoomService;

class RoomController extends Controller
{
    private $roomService;
    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }
    /**
     * Trang Index
     */
    public function index()
    {
        $data = $this->roomService->index();
        return view('rooms.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $data = $this->roomService->loadList($request->all());
        return $data;
    }
    /**
     * Thêm mới
     */
    public function create(Request $request)
    {
        $data = $this->roomService->create($request->all());
        return view('rooms.add', $data);
    }
    /**
     * Sửa
     */
    public function edit(Request $request)
    {
        $data = $this->roomService->edit($request->all());
        return view('rooms.add', $data);
    }
    /**
     * Cập nhật
     */
    public function update(Request $request)
    {
        $data = $this->roomService->_update($request->all());
        return $data;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $data = $this->roomService->_delete($request->all());
        return $data;
    }
    /**
     * Cập nhật số thứ tự
     */
    public function updateOrderTable(Request $request)
    {
        $data = $this->roomService->updateOrderTable($request->all());
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $data = $this->roomService->changeStatus($request->all());
        return $data;
    }
    /**
     * 
     */
    public function uploadFile(Request $request)
    {
        $data = $this->roomService->uploadFile($request->all());
        return $data;
    }
}