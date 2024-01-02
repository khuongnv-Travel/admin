<?php

namespace Modules\Api\Services;

use Modules\Api\Repositories\BlogsRepository;
use Modules\Api\Resources\BlogsResource;
use Modules\Backend\Services\ListtypeService;
use Modules\Core\BaseService;
use Modules\Core\Helpers\ListtypeHelper;

class BlogService extends BaseService
{
    private $listtypeService;

    public function __construct(
        ListtypeService $listtypeService
    ){
        $this->listtypeService = $listtypeService;
        parent::__construct();
    }
    public function repository()
    {
        return BlogsRepository::class;
    }
    public function loadList($input): array
    {
        $columnSelect = ['*', \DB::raw("(select name from categories where id = blogs.categories_id) as categories_name")];
        $lists = ListtypeHelper::_getAllByCode('DM_LOAI_BAI_VIET');
        $data = [];
        foreach($lists as $key => $value){
            $items = $this->repository->select($columnSelect)
                    ->where('blog_type', 'like', '%' . $value['code'] . '%')
                    ->where('current_status', 'DA_DUYET')
                    ->whereDate('date_create', '<=', date('Y-m-d'))
                    ->where('status', 1)->take(6)->get()->toArray();
            if(!empty($items)){
                $data[$key] = [
                    'name' => $value['name'],
                    'code' => strtolower($value['code']),
                    'items' => $items,
                ];
            }
        }
        return $data;
    }
    /**
     * Danh sách chi tiết danh mục bài viết
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function list($input): array
    {
        $input['code'] = $input['code'] ?? '';
        $lists = ListtypeHelper::_getSingleByCode('DM_LOAI_BAI_VIET', $input['code']);
        $columnSelect = ['*', \DB::raw("(select name from categories where id = blogs.categories_id) as categories_name")];
        $data['name'] = $lists['name'] ?? '';
        $data['datas'] = $this->repository->select($columnSelect)->where('blog_type', 'like', '%' . $input['code'] . '%')->where('current_status', 'DA_DUYET')->whereDate('date_create', '<=', date('Y-m-d'))->where('status', 1)->take(6)->get()->toArray();
        return $data;
    }
    /**
     * Chi tiết bài viết
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function reader($input): array
    {
        $columnSelect = ['*', \DB::raw("(select name from categories where id = blogs.categories_id) as categories_name")];
        $data['datas'] = $this->repository->select($columnSelect)
                        ->where('slug', $input['slug'])
                        ->whereDate('date_create', '<=', date('Y-m-d'))
                        ->first();
        return $data;
    }
}