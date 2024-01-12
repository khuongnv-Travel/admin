<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListtypeSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){
            $params = [
                'id' => (string)\Str::uuid(),
                'code' => \Str::random(10),
                'name' => \Str::random(20),
                'order' => \DB::table('listtype')->count() + 1,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            \DB::table('listtype')->insert($params);
        }
    }
}
