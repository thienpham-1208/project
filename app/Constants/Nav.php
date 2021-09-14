<?php

namespace App\Constants;

class Nav
{
    const NAV_ADMIN = [
        [
            'url' => '',
            'name' => 'Quản lí đơn hàng',
            'icon' => 'setting.png',
        ],
        [
            'url' => 'admin.category.index',
            'name' => 'Quản lí thể loại',
            'icon' => 'setting.png',
        ],
        [
            'url' => 'admin.dish.index',
            'name' => 'Quản lí món ăn',
            'icon' => 'setting.png',
        ],
        [
            'url' => '',
            'name' => 'Quản lí doanh thu',
            'icon' => 'price.png',
        ],
        [
            'url' => '',
            'name' => 'Quản lí khach hang',
            'icon' => 'customer.png',
        ],
        [
            'url' => '',
            'name' => 'Quản lí người dùng',
            'icon' => 'customer.png',
        ],
    ];
}
