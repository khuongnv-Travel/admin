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
    'tours' => [
        'name' => 'Quản trị tour',
        'icon' => 'bx bxs-cable-car',
        'checkRole' => 'ADMIN',
        'child' => false,
    ],
    'apartments' => [
        'name' => 'Quản trị phòng',
        'icon' => 'bx bxs-buildings',
        'checkRole' => 'ADMIN',
        'child' => [
            'list' => [
                'name' => 'Căn hộ',
                'icon' => 'bx bx-chevrons-right',
                'checkRole' => 'ADMIN',
                'child' => false,
            ],
            'rooms' => [
                'name' => 'Phòng',
                'icon' => 'bx bx-chevrons-right',
                'checkRole' => 'ADMIN',
                'child' => false,
            ],
        ],
    ],
    'cars' => [
        'name' => 'Quản trị xe',
        'icon' => 'bx bxs-car',
        'checkRole' => 'ADMIN',
        'child' => false,
    ],
    'flights' => [
        'name' => 'Quản trị chuyến bay',
        'icon' => 'bx bxs-plane-alt',
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