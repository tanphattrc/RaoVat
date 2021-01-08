<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cities')->insert([
            ['name' => 'Hồ Chí Minh'],
            ['name' => 'Bà Rĩa Vũng Tàu'],
            ['name' => 'Bình Dương'],
            ['name' => 'Bình Phước'],
            ['name' => 'Đồng Nai'],
            ['name' => 'Tây Ninh'],
            ['name' => 'Thanh Hoá'],
            ['name' => 'Nghệ An'],
            ['name' => 'Hà Tĩnh'],
            ['name' => 'Quảng Bình'],
            ['name' => 'Quảng Trị'],
            ['name' => 'Thừa Thiên Huế'],
            ['name' => 'An Giang'],
            ['name' => 'Bạc Liêu'],
            ['name' => 'Bến Tre'],
            ['name' => 'Cà Mau'],
            ['name' => 'Cần Thơ'],
            ['name' => 'Đồng Tháp'],
            ['name' => 'Hậu Giang'],
            ['name' => 'Kiên Giang'],
            ['name' => 'Long An'],
            ['name' => 'Sóc Trăng'],
            ['name' => 'Tiền Giang'],
            ['name' => 'Trà Vinh'],
            ['name' => 'Vĩnh Long'],
            ['name' => 'Phú Thọ'],
            ['name' => 'Hà Giang'],
            ['name' => 'Tuyên Quang'],
            ['name' => 'Cao Bằng'],
            ['name' => 'Bắc cạn'],
            ['name' => 'Thái Nguyên'],
            ['name' => 'Lạng Sơn'],
            ['name' => 'Bắc Giang'],
            ['name' => 'Quảng Ninh'],
            ['name' => 'Yên Bái'],
            ['name' => 'Lào Cai'],
            ['name' => 'Lai Châu'],
            ['name' => 'Sơn La'],
            ['name' => 'Điện Biên'],
            ['name' => 'Hòa Bình'],
            ['name' => 'Đà Nẵng'],
            ['name' => 'Quảng Nam'],
            ['name' => 'Quảng Ngãi'],
            ['name' => 'Bình Định'],
            ['name' => 'Phú Yên'],
            ['name' => 'Khánh Hoa'],
            ['name' => 'Ninh Thuận'],
            ['name' => 'Bình Thuận'],
            ['name' => 'Kon Tum'],
            ['name' => 'Gia Lai'],
            ['name' => 'Đắk Lắk'],
            ['name' => 'Lâm Đồng'],
            ['name' => 'Hà Nội'],
            ['name' => 'Bắc Ninh'],
            ['name' => 'Hà Nam'],
            ['name' => 'Hải Dương'],
            ['name' => 'Hải Phòng'],
            ['name' => 'Hưng Yên'],
            ['name' => 'Nam Định'],
            ['name' => 'Thái Bình'],
            ['name' => 'Vĩnh Phúc'],
            ['name' => 'Ninh Bình'],

           
           
          

        ]);
    }
}
