<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('article')->insert([
            [
                'name'        => 'Introduction to the Faculty of Engineering and Technology',
                'description' => 'Overview of the Faculty of Engineering and Technology at Tien Giang University.',
                'content'     => '<p>The Faculty of Engineering and Technology (FET) was established in 2003. It offers undergraduate programs in Information Technology, Electrical Engineering, Civil Engineering, and Mechanical Engineering.</p>',
                'menu_id'     => 2,
                'user'        => '0',
                'hot'         => '1',
                'image'       => '/images/posts/default.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'Chương trình đào tạo ngành Công nghệ thông tin 2024',
                'description' => 'Cập nhật chương trình đào tạo ngành CNTT áp dụng từ năm học 2024-2025.',
                'content'     => '<p>Chương trình đào tạo ngành Công nghệ thông tin được cập nhật nhằm đáp ứng nhu cầu của thị trường lao động. Sinh viên sẽ được trang bị kiến thức về lập trình, mạng máy tính, trí tuệ nhân tạo và an toàn thông tin.</p>',
                'menu_id'     => 3,
                'user'        => '0',
                'hot'         => '1',
                'image'       => '/images/posts/default.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'National ICT Scientific Conference 2026',
                'description' => 'FET hosts the National ICT Scientific Conference on June 15, 2026.',
                'content'     => '<p>The Faculty of Engineering and Technology of Tien Giang University will host the National ICT Scientific Conference 2026. The event brings together researchers, lecturers, and students from universities across Vietnam to present papers on Artificial Intelligence, IoT, and Cybersecurity.</p>',
                'menu_id'     => 29,
                'user'        => '0',
                'hot'         => '1',
                'image'       => '/images/posts/default.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'Thông báo tuyển sinh đại học chính quy năm 2024',
                'description' => 'Thông tin tuyển sinh các ngành thuộc Khoa Kỹ thuật Công nghệ năm 2024.',
                'content'     => '<p>Khoa Kỹ thuật Công nghệ thông báo chỉ tiêu tuyển sinh năm 2024 cho các ngành: Công nghệ thông tin (150 chỉ tiêu), Điện - Điện tử (100 chỉ tiêu), Xây dựng (80 chỉ tiêu), Cơ khí (80 chỉ tiêu). Hồ sơ nhận từ tháng 3 đến tháng 5 năm 2024.</p>',
                'menu_id'     => 24,
                'user'        => '0',
                'hot'         => '0',
                'image'       => '/images/posts/default.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'name'        => 'Tien Giang University Accepts International Students for Internships',
                'description' => 'FET welcomes international students from partner universities for internship programs.',
                'content'     => '<p>As part of its international cooperation strategy, the Faculty of Engineering and Technology has welcomed 5 international students from partner universities in Thailand and Japan for a 3-month internship program. Students will work alongside faculty members on research projects related to renewable energy and embedded systems.</p>',
                'menu_id'     => 29,
                'user'        => '0',
                'hot'         => '1',
                'image'       => '/images/posts/default.jpg',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);
    }
}
