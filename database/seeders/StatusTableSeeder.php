<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            [
                'status' => 'Aktif'
            ],
            [
                'status' => 'Cuti'
            ],
            [
                'status' => 'Pensiun'
            ],
        ];

        Status::insert($status);
    }
}
