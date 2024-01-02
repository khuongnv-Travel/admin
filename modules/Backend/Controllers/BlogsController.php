<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Backend\Services\BlogService;

class BlogsController extends Controller
{
    private $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    /**
     * Trang Index
     */
    public function index()
    {
        $data = $this->blogService->index();
        return view('blogs.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $data = $this->blogService->loadList($request->all());
        return $data;
    }
    /**
     * Thêm mới
     */
    public function create(Request $request)
    {
        $data = $this->blogService->create($request->all());
        return view('blogs.add', $data);
    }
    /**
     * Sửa
     */
    public function edit(Request $request)
    {
        $data = $this->blogService->edit($request->all());
        return view('blogs.add', $data);
    }
    /**
     * Cập nhật
     */
    public function update(Request $request)
    {
        $data = $this->blogService->_update($request->all());
        return $data;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $data = $this->blogService->_delete($request->all());
        return $data;
    }
    /**
     * Cập nhật số thứ tự
     */
    public function updateOrderTable(Request $request)
    {
        $data = $this->blogService->updateOrderTable($request->all());
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $data = $this->blogService->changeStatus($request->all());
        return $data;
    }
    /**
     * 
     */
    public function uploadFile(Request $request)
    {
        $data = $this->blogService->uploadFile($request->all());
        return $data;
    }
}