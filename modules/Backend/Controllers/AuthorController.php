<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Backend\Services\AuthorService;

class AuthorController extends Controller
{
    private $authorService;
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }
    /**
     * Trang Index
     */
    public function index()
    {
        $data = $this->authorService->index();
        return view('authors.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $data = $this->authorService->loadList($request->all());
        return $data;
    }
    /**
     * Thêm mới
     */
    public function create(Request $request)
    {
        $data = $this->authorService->create($request->all());
        return view('authors.add', $data);
    }
    /**
     * Sửa
     */
    public function edit(Request $request)
    {
        $data = $this->authorService->edit($request->all());
        return view('authors.add', $data);
    }
    /**
     * Cập nhật
     */
    public function update(Request $request)
    {
        $data = $this->authorService->_update($request->all());
        return $data;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $data = $this->authorService->_delete($request->all());
        return $data;
    }
    /**
     * Cập nhật số thứ tự
     */
    public function updateOrderTable(Request $request)
    {
        $data = $this->authorService->updateOrderTable($request->all());
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $data = $this->authorService->changeStatus($request->all());
        return $data;
    }
    /**
     * 
     */
    public function uploadFile(Request $request)
    {
        $data = $this->authorService->uploadFile($request->all());
        return $data;
    }
}