<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalRoomsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rental_rooms')->insert([
            [
                'room_name' => 'Nhà trọ Minh Anh',
                'address' => 'Ngõ 33, Ngô Xuân Quảng, Trâu Quỳ, Gia Lâm, Hà Nội',
                'owner_name' => 'Nguyễn Minh Anh',
                'phone' => '0912345678',
                'description' => 'Phòng trọ gần cổng chính HV Nông nghiệp VN',
                'detailed_description' => 'Phòng rộng 20m2, có điều hòa, khép kín, chỗ để xe riêng. Đi bộ 5 phút ra cổng trường.',
                'status' => 'available',
                'picture' => 'minh_anh_tro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_name' => 'Trọ Kiên Thành',
                'address' => 'Ngõ 68, Cửu Việt 2, Trâu Quỳ, Gia Lâm, Hà Nội',
                'owner_name' => 'Phạm Văn Kiên',
                'phone' => '0987654321',
                'description' => 'Khu trọ yên tĩnh, gần khu ký túc xá A',
                'detailed_description' => 'Phòng khép kín, có nóng lạnh, wifi mạnh, an ninh tốt. Ưu tiên sinh viên nữ.',
                'status' => 'available',
                'picture' => 'kien_thanh_tro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_name' => 'Nhà trọ Hương Lan',
                'address' => 'Ngõ 156, Ngô Xuân Quảng, Trâu Quỳ, Gia Lâm, Hà Nội',
                'owner_name' => 'Trần Hương Lan',
                'phone' => '0905123456',
                'description' => 'Phòng đẹp, sạch sẽ, có gác xép',
                'detailed_description' => 'Diện tích 18m2, có quạt trần, máy giặt chung, cổng ra vào bằng thẻ từ, an ninh 24/7.',
                'status' => 'unavailable',
                'picture' => 'huong_lan_tro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_name' => 'Trọ Ngọc Bích',
                'address' => 'Số 9, ngách 22, Cửu Việt 1, Trâu Quỳ, Gia Lâm, Hà Nội',
                'owner_name' => 'Lê Ngọc Bích',
                'phone' => '0978899001',
                'description' => 'Phòng trọ giá rẻ cho sinh viên',
                'detailed_description' => 'Phòng nhỏ 15m2, có gác lửng, nhà vệ sinh riêng, chỗ để xe miễn phí, điện nước giá dân.',
                'status' => 'available',
                'picture' => 'ngoc_bich_tro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_name' => 'Nhà trọ Quang Dũng',
                'address' => 'Cổng phụ Học viện Nông nghiệp, đường Ngô Xuân Quảng, Trâu Quỳ, Gia Lâm, Hà Nội',
                'owner_name' => 'Đỗ Quang Dũng',
                'phone' => '0944556677',
                'description' => 'Phòng trọ cao cấp gần trường',
                'detailed_description' => 'Phòng mới xây, full nội thất: giường, tủ, bàn học, điều hòa, máy giặt, nước nóng năng lượng mặt trời.',
                'status' => 'available',
                'picture' => 'quang_dung_tro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
