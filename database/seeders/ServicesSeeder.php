<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Service::create([
            'user_id'=>1,
            'amount'=>'10$',
            'type_service'=>'internal',
            'description'=>'Exterior washing
                            Vacuum cleaning
                            Interior wet cleaning
                            Window wiping'

        ]);

    }
}
