<?php

return [
    'danhmuctinhthanh' => [
        'code' => 'DM_TINH_THANH',
        'name' => 'Lấy danh mục Tỉnh thành',
        'name_listtype' => 'Danh mục tỉnh thành',
        'url' => 'https://provinces.open-api.vn/api/p/',
        'params' => [],
        'method' => 'get',
    ],
    'danhmucquanhuyen' => [
        'code' => 'DM_QUAN_HUYEN',
        'name' => 'Lấy danh mục Quận huyện',
        'name_listtype' => 'Danh mục quận huyện',
        'url' => 'https://provinces.open-api.vn/api/d/',
        'params' => [],
        'method' => 'get',
    ],
    'danhmucphuongxa' => [
        'code' => 'DM_PHUONG_XA',
        'name' => 'Lấy danh mục Phường xã',
        'name_listtype' => 'Danh mục phường xã',
        'url' => 'https://provinces.open-api.vn/api/w/',
        'params' => [],
        'method' => 'get',
        'options' => [
            'DM_TINH_THANH' => [
                'code' => 'DM_TINH_THANH',
                'name' => 'Cập nhật theo Tỉnh thành',
                'url' => 'https://provinces.open-api.vn/api/p/',
                'params' => ['depth' => '3']
            ],
            'DM_QUAN_HUYEN' => [
                'code' => 'DM_QUAN_HUYEN',
                'name' => 'Cập nhật theo Quận huyện'
            ],
        ]
    ],
];