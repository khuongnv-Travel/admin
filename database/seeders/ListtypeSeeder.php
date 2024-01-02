<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('listtype')->insert([
            [
                'id' => (string)\Str::uuid(),
                'code' => 'DM_TINH_THANH',
                'name' => 'Danh mục tỉnh thành',
                'order' => 1,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],[
                'id' => (string)\Str::uuid(),
                'code' => 'DM_QUAN_HUYEN',
                'name' => 'Danh mục quận huyện',
                'order' => 2,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],[
                'id' => (string)\Str::uuid(),
                'code' => 'DM_PHUONG_XA',
                'name' => 'Danh mục phường xã',
                'order' => 3,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],[
                'id' => (string)\Str::uuid(),
                'code' => 'DM_LAYOUT',
                'name' => 'Danh mục layout',
                'order' => 4,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],[
                'id' => (string)\Str::uuid(),
                'code' => 'DM_LOAI_CHUYEN_MUC',
                'name' => 'Danh mục loại chuyên mục',
                'order' => 5,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],[
                'id' => (string)\Str::uuid(),
                'code' => 'DM_LOAI_BAI_VIET',
                'name' => 'Danh mục loại bài viết',
                'order' => 6,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],[
                'id' => (string)\Str::uuid(),
                'code' => 'DM_TRANG_THAI_BAI_VIET',
                'name' => 'Danh mục trạng thái bài viết',
                'order' => 7,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
