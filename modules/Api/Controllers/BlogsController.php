<?php

namespace Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Api\Resources\BlogsResource;
use Modules\Api\Services\BlogService;

class BlogsController extends Controller
{
    private $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    /**
     * Danh sách bài viết
     */
    public function loadList(Request $request)
    {
        $data = $this->blogService->loadList($request->all());
        return response()->json(['status' => true, 'data' => $data]);
    }
    /**
     * Danh sách chi tiết danh mục bài viết
     */
    public function list(Request $request)
    {
        $data = $this->blogService->list($request->all());
        return response()->json(['status' => true, 'data' => $data]);
    }
    /**
     * Chi tiết bài viết
     */
    public function reader(Request $request)
    {
        $data = $this->blogService->reader($request->all());
        return response()->json(['status' => true, 'data' => $data]);
    }
}