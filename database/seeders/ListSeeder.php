<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Backend\Models\ListModel;
use Modules\Backend\Models\ListtypeModel;
use Modules\Backend\Services\ListService;

class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_canho = (string)\Str::uuid();
        $id_xe = (string)\Str::uuid();
        $count_listtype = ListtypeModel::select('*')->count();
        $count = ListModel::select('*')->count();
        
        if (!ListtypeModel::select('*')->where('code', 'DM_CAN_HO')->exists()) {
            ListtypeModel::insert([
                'id' => $id_canho,
                'code' => 'DM_CAN_HO',
                'name' => 'Danh mục căn hộ',
                'order' => ++$count_listtype,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            ListModel::insert([
                [
                    'id' => (string)\Str::uuid(),
                    'listtype_id' => $id_canho,
                    'code' => 'VILLA',
                    'name' => 'Villa',
                    'order' => ++$count,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => (string)\Str::uuid(),
                    'listtype_id' => $id_canho,
                    'code' => 'PENTHOUSE',
                    'name' => 'Penthouse',
                    'order' => ++$count,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => (string)\Str::uuid(),
                    'listtype_id' => $id_canho,
                    'code' => 'HOTEL',
                    'name' => 'Hotel',
                    'order' => ++$count,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => (string)\Str::uuid(),
                    'listtype_id' => $id_canho,
                    'code' => 'MOTEL',
                    'name' => 'Motel',
                    'order' => ++$count,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        }
        if (!ListtypeModel::select('*')->where('code', 'DM_LOAI_XE')->exists()) {
            ListtypeModel::insert([
                'id' => $id_canho,
                'code' => 'DM_LOAI_XE',
                'name' => 'Danh mục loại xe',
                'order' => ++$count_listtype,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            ListModel::insert([
                [
                    'id' => (string)\Str::uuid(),
                    'listtype_id' => $id_xe,
                    'code' => 'XE_4_CHO',
                    'name' => 'Xe 4 chỗ',
                    'order' => ++$count,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => (string)\Str::uuid(),
                    'listtype_id' => $id_xe,
                    'code' => 'XE_7_CHO',
                    'name' => 'Xe 7 chỗ',
                    'order' => ++$count,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => (string)\Str::uuid(),
                    'listtype_id' => $id_xe,
                    'code' => 'XE_KHACH',
                    'name' => 'Xe khách',
                    'order' => ++$count,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'id' => (string)\Str::uuid(),
                    'listtype_id' => $id_xe,
                    'code' => 'XE_GIUONG_NAM',
                    'name' => 'Xe giường nằm',
                    'order' => ++$count,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        }
    }
}
