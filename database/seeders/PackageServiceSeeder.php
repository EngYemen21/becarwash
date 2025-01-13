<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          // إنشاء الخدمات
    $services = [
        ['name' => 'غسيل خارجي'],
        ['name' => 'تنظيف بالمكنسة'],
        ['name' => 'تنظيف داخلي رطب'],
        ['name' => 'مسح النوافذ'],
    ];
    Service::insert($services);

    // إنشاء العروض
    $packages = [
        ['name' => 'الخدمة الأساسية', 'price' => 12],
        ['name' => 'التنظيف الأساسي', 'price' => 24],
        ['name' => 'الغسيل المميز', 'price' => 30],
        ['name' => 'بريميوم+', 'price' => 59],
    ];
    Package::insert($packages);

    // ربط الخدمات بالعروض
    $packageService = [
        // الخدمة الأساسية
        ['package_id' => 1, 'service_id' => 1, 'is_included' => true],
        ['package_id' => 1, 'service_id' => 2, 'is_included' => false],
        ['package_id' => 1, 'service_id' => 3, 'is_included' => false],
        ['package_id' => 1, 'service_id' => 4, 'is_included' => false],

        // التنظيف الأساسي
        ['package_id' => 2, 'service_id' => 1, 'is_included' => true],
        ['package_id' => 2, 'service_id' => 2, 'is_included' => true],
        ['package_id' => 2, 'service_id' => 3, 'is_included' => false],
        ['package_id' => 2, 'service_id' => 4, 'is_included' => false],

        // الغسيل المميز
        ['package_id' => 3, 'service_id' => 1, 'is_included' => true],
        ['package_id' => 3, 'service_id' => 2, 'is_included' => true],
        ['package_id' => 3, 'service_id' => 3, 'is_included' => true],
        ['package_id' => 3, 'service_id' => 4, 'is_included' => false],

        // بريميوم+
        ['package_id' => 4, 'service_id' => 1, 'is_included' => true],
        ['package_id' => 4, 'service_id' => 2, 'is_included' => true],
        ['package_id' => 4, 'service_id' => 3, 'is_included' => true],
        ['package_id' => 4, 'service_id' => 4, 'is_included' => true],
    ];
    DB::table('package_service')->insert($packageService);
    }
}
