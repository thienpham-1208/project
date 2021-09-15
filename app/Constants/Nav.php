<?php

namespace App\Constants;

class Nav
{
    const NAV_ADMIN = [
        [
            'url' => '',
            'name' => 'Quản lí đơn hàng',
            'icon' => 'order.png',
        ],
        [
            'url' => 'admin.category.index',
            'name' => 'Quản lí thể loại',
            'icon' => 'setting.png',
        ],
        [
            'url' => 'admin.dish.index',
            'name' => 'Quản lí món ăn',
            'icon' => 'dish.png',
        ],
        [
            'url' => 'admin.table.index',
            'name' => 'Quản lí bàn ăn',
            'icon' => 'table.png',
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
            'icon' => 'icon_list_user.png',
        ],
    ];
}
