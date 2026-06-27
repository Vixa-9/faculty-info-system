<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('news')->insert([
            [
                'title'        => 'National ICT Scientific Conference 2026 at Tien Giang University',
                'summary'      => 'The Faculty of Engineering and Technology hosts the National ICT Scientific Conference 2026, bringing together researchers from universities across Vietnam.',
                'content'      => '<p>The Faculty of Engineering and Technology of Tien Giang University is proud to host the <strong>National ICT Scientific Conference 2026</strong>. The event will take place on June 15, 2026 at the main campus in Than Cuu Nghia.</p><p>Topics include Artificial Intelligence, IoT, Cybersecurity, and Software Engineering. Researchers and lecturers from over 30 universities are expected to attend.</p>',
                'image'        => null,
                'published_at' => Carbon::parse('2026-05-01'),
                'active'       => true,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'title'        => 'Tien Giang University Welcomes International Internship Students',
                'summary'      => 'Five international students from Thailand and Japan joined FET for a 3-month research internship on renewable energy and embedded systems.',
                'content'      => '<p>As part of its international cooperation program, the Faculty of Engineering and Technology has welcomed <strong>5 international students</strong> from partner universities in Thailand and Japan.</p><p>The students will work alongside faculty members on research projects related to solar energy systems and microcontroller-based automation from June to August 2026.</p>',
                'image'        => null,
                'published_at' => Carbon::parse('2026-06-01'),
                'active'       => true,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
            [
                'title'        => 'Thông báo tuyển sinh đại học chính quy năm học 2026-2027',
                'summary'      => 'Khoa Kỹ thuật Công nghệ thông báo chỉ tiêu tuyển sinh năm 2026 cho các ngành Công nghệ thông tin, Điện - Điện tử, Xây dựng và Cơ khí.',
                'content'      => '<p>Khoa Kỹ thuật Công nghệ - Trường Đại học Tiền Giang thông báo chỉ tiêu tuyển sinh năm học 2026-2027 như sau:</p><ul><li>Công nghệ thông tin: 150 chỉ tiêu</li><li>Điện - Điện tử: 100 chỉ tiêu</li><li>Xây dựng: 80 chỉ tiêu</li><li>Cơ khí: 80 chỉ tiêu</li></ul><p>Hồ sơ đăng ký nhận từ tháng 3 đến tháng 5 năm 2026. Liên hệ: email@tgu.edu.vn | ĐT: 0273369698.</p>',
                'image'        => null,
                'published_at' => Carbon::parse('2026-03-01'),
                'active'       => true,
                'created_at'   => $now,
                'updated_at'   => $now,
            ],
        ]);
    }
}
