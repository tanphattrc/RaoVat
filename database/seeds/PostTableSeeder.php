<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon as SupportCarbon;
use Seld\PharUtils\Timestamps;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('posts')->insert([
            ['cat_id' => 8, 'city_id' => 42, 'user_id' => 2, 'title' => 'Máy hút sữa điện đơn cho mẹ', 'description' => 'máy hút sữa điện đơn cho mẹ. mình đã dùng vài lần nay pass lại cho me nào cần. về mẹ chỉ cần rửa sạch vì cất lâu ko dùng đến', 'photo' => 'mayhutsuame.jpg', 'price' => '700000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 1, 'city_id' => 1, 'user_id' => 1, 'title' => 'Bán nhà mặt tiền', 'description' => 'Khu vực xung quanh chuẩn bị mở dự án', 'photo' => 'nha-mat-tien.jpg', 'price' => '5000000000', 'state' => true, 'created_at' => date("Y-m-d H:i:s", mktime(15, 50, 30, 4, 30, 2017))],
            ['cat_id' => 2, 'city_id' => 2, 'user_id' => 2, 'title' => 'Cần ra đi Yazzz', 'description' => 'Xe zin nguyên con', 'photo' => 'xe-yaz.jpg', 'price' => '120000000', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 4, 31, 2017))],
            ['cat_id' => 3, 'city_id' => 3, 'user_id' => 3, 'title' => 'Set đồ thu đông', 'description' => 'Chất loai vải cotton, thoáng mát', 'photo' => 'fashion-thu-dong.jpg', 'price' => '1000000', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 5, 30, 2017))],
            ['cat_id' => 4, 'city_id' => 4, 'user_id' => 1, 'title' => 'Giày tempo', 'description' => ' 2nd.. Đá được 2 trận', 'photo' => 'giay-tempo.jpeg', 'price' => '321324', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 3, 30, 2018))],
            ['cat_id' => 5, 'city_id' => 1, 'user_id' => 2, 'title' => 'Kệ sách thông minh', 'description' => 'Di chuyện linh hoạt nhiều ngăn kéo, hàng Mỹ', 'photo' => 'ke-sach-smart.jpg', 'price' => '213213213', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 4, 20, 2019))],
            ['cat_id' => 6, 'city_id' => 2, 'user_id' => 3, 'title' => 'Tour du lịch Phú Quốc', 'description' => 'Giá bao gồm tất cả các chi phí, tiện ích', 'photo' => 'tour-PhuQuoc.jpg', 'price' => '12000000', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 4, 20, 2019))],
            ['cat_id' => 7, 'city_id' => 3, 'user_id' => 3, 'title' => 'Husky kute', 'description' => 'Giống chó ngáo vui tính linh hoạt, gần gũi mọi người', 'photo' => 'Husky-dog.jpg', 'price' => '1000000', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 11, 29, 2019))],
            ['cat_id' => 8, 'city_id' => 4, 'user_id' => 2, 'title' => 'Tả lót thông minh', 'description' => 'Mềm mại,tạo cảm giác mát mẻ cho bé, thơm tho', 'photo' => 'Ta-lot-em-be.png', 'price' => '1231234', 'state' => true, 'created_at' => date("Y-m-d H:i:s", mktime(15, 50, 30, 5, 29, 2019))],
            ['cat_id' => 9, 'city_id' => 1, 'user_id' => 1, 'title' => 'Macbook air 2nd', 'description' => 'Thích hợp cho làm việc văn phòng, lập trình, do kẹt tiền nên cần bán gấp', 'photo' => 'macbook-air.jpg', 'price' => '49000000', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 4, 30, 2019))],
            ['cat_id' => 10, 'city_id' => 1, 'user_id' => 2, 'title' => 'Bún đậu nhà làm', 'description' => 'Bún đậu mắm tôm truyền thống nha làm, bao ăn, bao ngon khỏi lo về giá', 'photo' => 'bun-dau-mam-tom.jpg', 'price' => '500000', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 4, 30, 2018))],
            ['cat_id' => 11, 'city_id' => 2, 'user_id' => 3, 'title' => 'Bộ salon thông minh', 'description' => 'Có thể linh hoạt thành giường ngủ, mềm mại, mát mẻ', 'photo' => 'sofa-giuong-hien-dai-dep.jpg', 'price' => '32432144', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 9, 30, 2018))],
            ['cat_id' => 12, 'city_id' => 10, 'user_id' => 1, 'title' => 'Cây mai ngày tết', 'description' => 'Mai mọi năm nở rộ rất đẹp, buôn bán mai uy tín 30 năm nay', 'photo' => 'cay-mai-vang.jpg', 'price' => '213123213', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 4, 12, 2019))],
            ['cat_id' => 1, 'city_id' => 11, 'user_id' => 2, 'title' => 'Căn hộ chung cư landmark', 'description' => 'Nội thất đầy đủ tiện nghi, tiện ích xung quanh đầy đủ', 'photo' => 'chung-cu-landmark.jpg', 'price' => '12315543233224', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 7, 29, 2019))],
            ['cat_id' => 2, 'city_id' => 12, 'user_id' => 3, 'title' => 'Mercedes giá rẻ', 'description' => 'Dòng xe thương hiệu uy tín, xe mới mua chạy chỉ 500km, không bị va chạm trày sướt, giấy tờ đầy đủ', 'photo' => 'xe-mercedes.jpg', 'price' => '231234254213', 'state' => true, 'created_at' =>  date("Y-m-d H:i:s", mktime(15, 50, 30, 8, 14, 2019))],
            ['cat_id' => 3, 'city_id' => 10, 'user_id' => 2, 'title' => 'Áo đá banh có chữ ký Ronadol', 'description' => 'Do ronaldo đặc biệt ký tặng fan trong buổi lễ họp fan vừa qua', 'photo' => 'aodau-ronaldo.jpg', 'price' => '21312343', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 4, 'city_id' => 4, 'user_id' => 3, 'title' => 'Bút viết thông minh', 'description' => 'Có thể viết trình chiếu', 'photo' => 'but-smart.jpg', 'price' => '213213', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 9, 'city_id' => 1, 'user_id' => 1, 'title' => 'Máy Tính Bảng Quatab LG T32 10 inch Ram 2Gb / 16Gb', 'description' => 'Máy tính bảng Quatab LG T32 là máy tính bảng chính hãng sản xuất riêng cho thị trường nội địa Nhật Bản. Chiếc máy tính bảng 10 inch giá tốt nhất ở thời điểm hiện tại đây ạ.', 'photo' => 'maytinhbanglg.jpeg', 'price' => '1550000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 9, 'city_id' => 60, 'user_id' => 2, 'title' => 'LÔ NET XÃ GIÁ CỰC RẼ CORE,I5,XEON,I7 CÂN LOL PUBG', 'description' => 'CPU: E8400 3.0ghz x 2 CHIẾN LOL BAO MƯỢT ÍRAM: 4G CÂN LOL TỐT
            HDD: 320G DƯ CHỨA GAME
            VGA: RỜI 1G DDR5 CÂN GAME NET TỐT
            PSU: ACBEL 350W CST CÂN CẢ DÀN', 'photo' => 'lonetxagia.jpeg', 'price' => '1990000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 9, 'city_id' => 22, 'user_id' => 1, 'title' => 'Bộ NIKON D3000+ lens NIKON 18-55mmVR', 'description' => 'Bộ NIKON D3000+ lens NIKON18-55mmVR, máy còn mới 95%, cao su chử còn đẹp rỏ, màn hình tốt không trầy xước, ống kính rất mới không bụi rể, pin, sạc, dây đeo zin theo máy, bảo hành 03 tháng.', 'photo' => 'bonikon.jpeg', 'price' => '2500000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 2, 'city_id' => 50, 'user_id' => 3, 'title' => 'XE BÁNH TO HÀNG ĐỘC KHÔNG SỬ DỤNG TỚI NƠI', 'description' => 'Em có chiếc xe đặt riêng từ nước ngoài về
            khung xe bằng nhôm, hàng rất xịn, nay muốn vừa bán vừa cho lấy tiền có việc.
            Xem xe tại nhà ạ', 'photo' => 'xedapbanhto.jpg', 'price' => '9800000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 3, 'city_id' => 59, 'user_id' => 2, 'title' => 'Ví Nam Da Bò Giá tốt đón xuân', 'description' => '- Thiết kế cổ điển
            - Sản phẩm như hình, chất liệu mềm cầm chắt tay.
            - khuyến mãi giá ưu đãi khi mua 2 Sản phẩm', 'photo' => 'vinamdabo.jpg', 'price' => '199000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 9, 'city_id' => 4, 'user_id' => 3, 'title' => 'airpods pro new mỹ', 'description' => 'airpods pro mỹ mới 100%
            bao test tẹt ga chưa active bảo hành 1 tháng hổ trợ bh 1 năm đổi trả', 'photo' => 'airportpro.jpg', 'price' => '6300000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 9, 'city_id' => 33, 'user_id' => 2, 'title' => 'Loa sub yamaha sw800', 'description' => 'loa sub yamaha w800 bass 30 nhật rất mạnh mẽ dòng nay quá nổi tiếng', 'photo' => 'loasubyamaha.jpg', 'price' => '10500000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 2, 'city_id' => 18, 'user_id' => 1, 'title' => 'Honda Lead', 'description' => 'Cửa Hàng ÔTÔ xe máy Thái Hoà Cần bán xe lead 2014 xe cực đẹp mua về sử dụng ngay
            - BSTP 9 chủ 1 công chứng , sang tên nhanh lẹ
            - Máy móc nguyên zin , máy chạy nhẹ không hú
            - Full mọi chức năng
            - Xe đẹp , dàn áo zin
            - Niếu AC chưa có kinh nghiệm mua xe cũ có thể nhờ người thân có qua kinh nghiệm theo xem cùng cho yên tâm', 'photo' => 'hondalead.jpg', 'price' => '23300000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 9, 'city_id' => 45, 'user_id' => 3, 'title' => 'Màn hình Lenovo ThinkVisson 23inch nguyên zin', 'description' => 'Kích thước: 23 Inch
            Tỉ lệ tương phản: 50.000.000:1
            Độ phân giải: 1920 x 1080
            Góc nhìn: 178°(H) / 178°(V)
            Hỗ trợ: màu16 triệu màu
            Thời gian đáp ứng: 5 ms', 'photo' => 'manhinhlenovo.jpg', 'price' => '1700000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 2, 'city_id' => 41, 'user_id' => 1, 'title' => 'VIOS E MT GIÁ SỐC 4 NGÀY CUỐI', 'description' => 'TOYOTA VIOS 2019 - CHỈ 130 TRIỆU NHẬN XE, GÓP LÃI SUẤT THẤP', 'photo' => 'viosemtxe.jpg', 'price' => '470000000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 9, 'city_id' => 54, 'user_id' => 2, 'title' => 'Iphone ProMax 512GB Green Za/a 2 sim tiện lợi', 'description' => 'Dư dùng cần bán Iphone ProMax 512GB Green Za/a 2 sim tiện lợi, máy nguyên zin áp đẹp keng ít dùng còn BH Apple 10/2020, fullbox sạc cáp zin theo máy, ace qa xem máy và giao dịch tại nhà cho yên tâm', 'photo' => 'iphonePromax.jpg', 'price' => '29200000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 1, 'city_id' => 5, 'user_id' => 3, 'title' => 'Bán Lô Đất Thổ Cư Diện Tích 613m2 Sổ Hồng Riêng', 'description' => 'Diện Tích, Rộng 15m, Dài 41m. Tổng diện tích là 615m2. Có 300m2 Thổ Cư còn lại 313m2 Đất trồng cây lâu năm
            bán kính 500m có trường học, ủy ban xã và Chợ
            Có đèn đường mở từ 6h tối tới 6h sang, Gần cty may, nông trường phạm văn cội .', 'photo' => 'but-smart.jpg', 'price' => '3600000000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 7, 'city_id' => 4, 'user_id' => 3, 'title' => 'Cá rồng highback 20cm', 'description' => 'Cá rồng highback
            20cm
            Chuẩn ko lổi
            Mua số lượng nhiều giá tốt', 'photo' => 'caronghighback.jpg', 'price' => '1700000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 7, 'city_id' => 23, 'user_id' => 1, 'title' => 'Chó Phốc Sóc rất xinh', 'description' => 'Nhà có đàn Phốc sóc đã được tiêm ngừa và tẩy giun. Nay đến tuổi về nhà mới.
            Đực cái đều có
            Xem chó tại nhà!', 'photo' => 'chophocsoc.jpg', 'price' => '4500000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 7, 'city_id' => 49, 'user_id' => 2, 'title' => 'Lory và electux', 'description' => 'Em đang tìm gia đình chăm sóc, yêu Quý. Tặng kèm bọt ống khi mua', 'photo' => 'loryandelectux.jpg', 'price' => '11000000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 8, 'city_id' => 24, 'user_id' => 1, 'title' => 'máy vắt sữa Medela của Mỹ, xài roi, còn tốt, bao', 'description' => 'máy còn đầy đủ phụ kiện như hình, đá nhựa, pin sạc .....( hình thật ) , có mẹ bầu de thử máy luôn, bao tốt', 'photo' => 'mayvatsuamedela.jpg', 'price' => '3000000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 6, 'city_id' => 11, 'user_id' => 1, 'title' => 'Cho thuê xe 16 chỗ Ford Transit SVP đời mới', 'description' => 'Cho thuê xe 16 chỗ Ford Transit SVP đời mới , chính chủ chạy kỹ , cho thuê tháng , năm hợp đồng lâu dài , cảm ơn đã xem tin.', 'photo' => 'thuexe16cho.jpg', 'price' => '20000000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 6, 'city_id' => 10, 'user_id' => 1, 'title' => 'Sưu tầm 52 tờ 28 quốc gia', 'description' => 'Sưu tầm hàng độc bộ quốc tế 52 tờ 28 nước
            Săn hàng độc với giá chỉ 440k
            sở hữu ngay 52 tờ gồm các mệnh giá ở 28 quốc gia khác nhau.', 'photo' => 'suutamtien.jpg', 'price' => '440000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 11, 'city_id' => 4, 'user_id' => 3, 'title' => 'Đh treo tường ODO 57/8 búa 8 gông đồng lạ độc zin', 'description' => 'đh treo tường hiệu ODO 57/8 hàng sưu tầm kiểu dáng lạ , mặt số la mã độc zin đẹp  hiếm gặp .Máy vàng ươm triện mộc đầy đủ rõ ràng (8 gông đồng 8 búa ) đánh nhạc bài wetsminto có bính bong , âm Thanh hay ngân Vang như chuông nhà thờ . Tổng thể như hình , hình thật ( hình sao đồ vậy ) không nhận Tin nhắn , alo trực tiếp nhé . Mua bán tại nhà trước 9 giờ tối . Cám ơn mọi người đã xem tin . Cám ơn chợ tốt đã đăng tải lên ...', 'photo' => 'dhtreotuongodo.jpg', 'price' => '25000000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 4, 'city_id' => 19, 'user_id' => 3, 'title' => 'Đàn Classic Chính Hiệu G-90A sản xuất Yamaha Japan', 'description' => 'Tình trạng Used, ZIN nguyên bản, không cấn bể.
            Mọi chi tiết kỹ thuật đã được kiểm tra ổn định.
            Bảo hành 1 năm - Ship Toàn Quốc.', 'photo' => 'danclassicchinhhieu.jpg', 'price' => '1800000', 'state' => true, 'created_at' => date("Y-m-d H:i:s", mktime(15, 50, 30, 4, 30, 2017))],
            ['cat_id' => 4, 'city_id' => 53, 'user_id' => 2, 'title' => 'Guitar Splendor Hàng nội địa Japan Âm Vang Hay', 'description' => 'Đàn zin keng, không cấn bể.
            Có trày xước nhẹ, vì đàn cũ, và quá trình vận chuyển từ nhật, âm vang sáng rất hay!!
            Action bao chuẩn từ A-Z
            LH để ship toàn quốc.', 'photo' => 'guitarsplendor.jpg', 'price' => '1700000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 12, 'city_id' => 11, 'user_id' => 2, 'title' => 'Máy lạnh sharp 1 hp inverter đời 2018', 'description' => 'Máy lạnh sharp inverter 1hp hoạt đong tốt tiết kiệm điện năng tiêu thụ, bảo hành 1 năm', 'photo' => 'maylanhsharp1hp.jpg', 'price' => '3700000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 12, 'city_id' => 16, 'user_id' => 1, 'title' => 'máy giặt cửa trên SHARP new100%', 'description' => 'Nút bấm tiếng Việt
            7,8kg
            Mâm giặt diệt khuẩn
            Máy giặt Sharp ES-U78GV-H là thương hiệu nổi tiếng của Nhật Bản,
            Với thiết kế nắp đậy bằng kính dễ dàng quan sát quá trình giặt bên trong
            Lồng giặt không lỗ, hạn chế nấm mốc
            Máy nguyên thùng, nguyên seal , mới sản xuất, có thể qua xem máy tại nhà mình nhé.', 'photo' => 'maygiacshrap100.jpg', 'price' => '2890000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 11, 'city_id' => 26, 'user_id' => 1, 'title' => 'Bàn ăn gỗ sồi nhập', 'description' => 'Bàn ăn gỗ sồi nhập khẩu 4 ghế giá chỉ 4tr
            Gỗ tự nhiên 100%, bền đẹp bảo hành 5 năm cho mọi sản phẩm', 'photo' => 'banangosoinhap.jpg', 'price' => '4000000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 5, 'city_id' => 24, 'user_id' => 3, 'title' => 'THANH LÝ BỘ MÁY POS CẢM ỨNG CHÍNH HÃNG OTEK', 'description' => 'Cấu hình : CPU ATOM D2250 DDR3 4GB HDD 320GB
            Máy in hóa đơn K80mm BIRCH BPT3 TỰ ĐỘNG CẮT GIẤY
            Két tiền tự động 5 ngăn kết nối máy in', 'photo' => 'bomayposcamung.jpg', 'price' => '7200000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 5, 'city_id' => 52, 'user_id' => 1, 'title' => 'Pallet Nhựa Giá PL1188 Giao hàng toàn quốc', 'description' => 'Được sử dụng rất phổ biến và rộng rãi ở hầu hết các khu công nghiệp sản xuất, khu chế xuất, nhà xưởng, công ty, xí nghiệp,...', 'photo' => 'palletnhuapl1188.jpg', 'price' => '280000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 6, 'city_id' => 15, 'user_id' => 2, 'title' => 'TOUR DU LỊCH PHƯỢNG HOÀNG CỔ TRẤN - TRUNG QUỐC', 'description' => '
✅Hồ sơ visa đơn giản, chỉ cần hộ chiếu

✅ Bay thẳng 𝙑𝙞𝙚𝙩𝙟𝙚𝙩 𝙖𝙞𝙧.
            
✅ Khách sạn tiêu chuẩn 𝟰 *
            
✅ 2 đ𝙚̂𝙢 𝙋𝙝𝙪̛𝙤̛̣𝙣𝙜 𝙃𝙤𝙖̀𝙣𝙜 𝘾𝙤̂̉ 𝙏𝙧𝙖̂́𝙣
            
✅ T͟h͟ă͟m͟ ͟q͟u͟a͟n͟ : 𝟐 đ𝐞̂𝐦 𝙋𝙝𝙪̛𝙤̛̣𝙣𝙜 𝙃𝙤𝙖̀𝙣𝙜 𝘾𝙤̂̉ 𝙏𝙧𝙖̂́𝙣,𝙥𝙝𝙤̂́ 𝙆𝙚̂ 𝘽𝙤̂́, 𝘾𝙖̂̀𝙪 𝙆𝙞́𝙣𝙝, 𝙏𝙝𝙞𝙚̂𝙣 𝙈𝙤̂𝙣 𝙎𝙤̛𝙣,𝘁𝗵𝗮𝗻𝗴 𝗺𝗮́𝘆 𝗕𝗮́𝗰𝗵 𝗟𝗼𝗻𝗴 𝗧𝗵𝗶𝗲̂𝗻,𝗛𝗼̂̀ 𝗕𝗮̉𝗼 𝗣𝗵𝗼𝗻𝗴 ...', 'photo' => 'tourdulichtrungquoc.jpg', 'price' => '10990000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cat_id' => 8, 'city_id' => 4, 'user_id' => 3, 'title' => 'Bộ đồ chơi nấu ăn điện từ', 'description' => '
💢💢BỘ NẤU ĂN NHÀ BẾP 36 món 💢
☘️Bộ đồ chơi nấu ăn này cưng lắm nhé. Các đồ vật như nồi áp suất, ấm nước, bếp được làm y như thật luôn.
☘️Chất liệu nhựa an toàn.
☘️Bếp từ sử dung pin, có đèn led hiển thị nhiệt độ. Nút bấm tăng giảm như thật. Số hiển thị trên màn led.
☘️Nồi áp suất có chốt khóa như nồi thật nha', 'photo' => 'bodochoidientu.jpg', 'price' => '199000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
['cat_id' => 7, 'city_id' => 41, 'user_id' => 1, 'title' => 'Mèo Nga Mắt 2 Màu', 'description' => '
😸😸😸mèo nga, lông trắng, giới tính Đực.
Bé được 4 tháng tuổi 😻😻😻.
vào đông cảm lạnh nên bé bị cảm nhẹ😿😿😿', 'photo' => 'meongamat2mau.jpg', 'price' => '700000', 'state' => true, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
