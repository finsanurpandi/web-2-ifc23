<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            [
                'id' => 1,
                'name' => 'Teknik Sipil',
                'code' => '22201',
                'alias' => 'SI'
            ],
            [
                'id' => 2,
                'name' => 'Teknik Industri',
                'code' => '26201',
                'alias' => 'TI'
            ],
            [
                'id' => 3,
                'name' => 'Teknik Informatika',
                'code' => '55201',
                'alias' => 'IF'
            ],
        ]);
    }
}
