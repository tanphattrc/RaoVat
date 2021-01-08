<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            ['cat_name' => 'Bất động sản', 'photo' => 'BDS.jpg'],
            ['cat_name' => 'Xe Cộ', 'photo' => 'xeco.jpg'],
            ['cat_name' => 'Thời trang', 'photo' => 'thoitrang.jpg'],
            ['cat_name' => 'Giải trí- Thể Thao', 'photo' => 'giaitri.jpg'],
            ['cat_name' => 'Đồ dùng văn phòng', 'photo' => 'dodungvanphong.jpg'],
            ['cat_name' => 'Dịch vụ -Du lịch', 'photo' => 'dichvu-dulich.jpg'],
            ['cat_name' => 'Thú cưng', 'photo' => 'thucung.jpg'],
            ['cat_name' => 'Mẹ và bé', 'photo' => 'mevabe.jpg'],
            ['cat_name' => 'Đồ dùng điện tử', 'photo' => 'do-dung-dien-tu .jpg'],
            ['cat_name' => 'Ẩm thực- Thực phẩm', 'photo' => 'am-thuc-thuc-pham.jpg'],
            ['cat_name' => 'Nội thất', 'photo' => 'noi-that.jpg'],
            ['cat_name' => 'Các loại khác', 'photo' => 'cac-loai-khac.png'],
         ]);
    }
}
