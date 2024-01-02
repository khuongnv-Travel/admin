<?php

return [
    'dashboard' => [
        'name' => 'Trang chủ',
        'icon' => 'bx bxs-dashboard',
        'checkRole' => false,
        'child' => false
    ],
    'listtype' => [
        'name' => 'Quản trị danh mục',
        'icon' => 'bx bx-list-ul',
        'checkRole' => 'ADMIN',
        'child' => [
            'listtype' => [
                'name' => 'Loại danh mục',
                'icon' => 'bx bx-chevrons-right',
                'checkRole' => 'ADMIN',
                'child' => false,
            ],
            'list' => [
                'name' => 'Danh mục đối tượng',
                'icon' => 'bx bx-chevrons-right',
                'checkRole' => 'ADMIN',
                'child' => false,
            ],
        ],
    ],
    'categories' => [
        'name' => 'Quản trị chuyên mục',
        'icon' => 'bx bx-menu',
        'checkRole' => 'ADMIN',
        'child' => false,
    ],
    'authors' => [
        'name' => 'Quản trị tác giả',
        'icon' => 'bx bxs-user-check',
        'checkRole' => 'ADMIN',
        'child' => false,
    ],
    'blogs' => [
        'name' => 'Quản trị bài viết',
        'icon' => 'bx bx-news',
        'checkRole' => 'ADMIN',
        'child' => false,
    ],
    'support' => [
        'name' => 'Hỗ trợ hệ thống',
        'icon' => 'bx bx-support',
        'checkRole' => 'ADMIN',
        'child' => false,
    ],
];