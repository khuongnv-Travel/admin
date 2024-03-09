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
        $id = (string)\Str::uuid();
        $param = [
            'id' => $id,
            'code' => 'DM_CAN_HO',
            'name' => 'Danh mục căn hộ',
            'order' => ListtypeModel::select('*')->count() + 1,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        ListtypeModel::insert($param);
        $count = ListModel::select('*')->count();
        $param = [
            [
                'id' => (string)\Str::uuid(),
                'listtype_id' => $id,
                'code' => 'VILLA',
                'name' => 'Villa',
                'order' => ++$count,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => (string)\Str::uuid(),
                'listtype_id' => $id,
                'code' => 'PENTHOUSE',
                'name' => 'Penthouse',
                'order' => ++$count,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => (string)\Str::uuid(),
                'listtype_id' => $id,
                'code' => 'HOTEL',
                'name' => 'Hotel',
                'order' => ++$count,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => (string)\Str::uuid(),
                'listtype_id' => $id,
                'code' => 'MOTEL',
                'name' => 'Motel',
                'order' => ++$count,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];
        ListModel::insert($param);
    }
}
