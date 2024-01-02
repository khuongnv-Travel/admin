<?php

namespace Modules\Api\Services;

use Carbon\Carbon;

class HomeService
{
    private $blogService;

    public function __construct(
        BlogService $blogService
    ){
        $this->blogService = $blogService;
    }
    public function loadBlog($input)
    {
        $input['sort'] = 'order';
        $input['limit'] = 3;
        $datas = $this->blogService->filter($input);
        Carbon::setLocale('vi');
        $config = config('moduleConfig');
        foreach($datas as $key => $value){
            $datas[$key]->thoigiantao = (Carbon::create($value->date_create))->diffForHumans(Carbon::now());
            $datas[$key]->url = $config['url_client'] . 'blog/reader/' . $value->slug;
        }
        return array('status' => true, 'data' => $datas);
    }
}