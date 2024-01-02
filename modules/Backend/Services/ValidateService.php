<?php

namespace Modules\Backend\Services;

use Illuminate\Support\Facades\Validator;

class ValidateService
{
    private $messageRequired = 'không được để trống!';
    
    public function validate($data, $name = '')
    {
        // dd($data);
        $messages = "";
        $str = !empty($name) ? ' ' . $name : ''; // VD: danh mục
        $validator = Validator::make(
            $data,
            [
                // Danh mục
                'code'           => isset($data['code']) ? 'required' : '',
                'name'           => isset($data['name']) ? 'required' : '',
                // Bài viết
                'categories_id'  => isset($data['categories_id']) ? 'required' : '',
                'title'          => isset($data['title']) ? 'required' : '',
                'slug'           => isset($data['slug']) ? 'required' : '',
                'author'         => isset($data['author']) ? 'required' : '',
                'blog_type'      => isset($data['blog_type']) ? 'required' : '',
                'current_status' => isset($data['current_status']) ? 'required' : '',
                // Phần chung
                'order'          => ['required','numeric'],
            ],[
                // Danh mục
                'code.required'           => 'Mã' . $str . ' ' . $this->messageRequired,
                'name.required'           => 'Tên' . $str . ' ' . $this->messageRequired,
                // Bài viết
                'categories_id.required'  => 'Danh mục' . $str . ' ' . $this->messageRequired,
                'title.required'          => 'Tiêu đề' . $str . ' ' . $this->messageRequired,
                'slug.required'           => 'Đường dẫn' . $str . ' ' . $this->messageRequired,
                'author.required'         => 'Tác giả' . $str . ' ' . $this->messageRequired,
                'blog_type.required'      => 'Loại' . $str . ' ' . $this->messageRequired,
                'current_status.required' => 'Trạng thái' . $str . ' ' . $this->messageRequired,
                // Phần chung
                'order.required'          => 'Thứ tự ' . $this->messageRequired,
                'order.numeric'           => 'Thứ tự phải là số!',
            ]
        );
        if ($validator->fails()) {
            $status   = false;
            $messages = $validator->messages()->toArray();
        } else {
            $status = true;
        }
        $response['status']  = $status;
        $response['message'] = $messages;
        return $response;
    }
}