<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FacultyInfo;

class FacultyInfoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'introduction' => '<p>The <strong>Faculty of Engineering and Technology</strong> (Khoa Kỹ thuật Công nghệ) is one of the core faculties of Tien Giang University, established to meet the growing demand for qualified engineers and technologists in the Mekong Delta region. The faculty currently offers undergraduate programs in Information Technology, Electrical and Electronic Engineering, Civil Engineering, and Mechanical Engineering.</p><p>With a dedicated teaching staff and modern laboratories, the faculty is committed to delivering quality education that combines theoretical knowledge with practical skills.</p>',

            'vision' => '<p>To become a leading engineering faculty in the Mekong Delta, recognized for academic excellence, applied research, and strong industry partnerships by 2030.</p>',

            'mission' => '<p>To train competent, ethical, and innovative engineers who contribute to the sustainable development of the Mekong Delta and Vietnam as a whole. The faculty fosters a culture of lifelong learning, applied research, and community engagement.</p>',

            'history' => '<p>The Faculty of Engineering and Technology was founded in <strong>2001</strong> as part of Tien Giang University. Over more than two decades, it has grown from a small department into a full faculty offering four undergraduate programs and serving over 1,500 students.</p><p>Key milestones include the launch of the Information Technology program in 2003, the construction of the dedicated Engineering building in 2010, and the establishment of the IoT and Embedded Systems research lab in 2020.</p>',

            'org_structure' => '<p>The faculty is organized as follows:</p><ul><li><strong>Dean\'s Office</strong> — overall management and academic direction</li><li><strong>Department of Information Technology</strong></li><li><strong>Department of Electrical and Electronic Engineering</strong></li><li><strong>Department of Civil Engineering</strong></li><li><strong>Department of Mechanical Engineering</strong></li><li><strong>Research and International Cooperation Office</strong></li><li><strong>Student Affairs Office</strong></li></ul>',

            'office_info' => '<p><strong>Faculty of Engineering and Technology</strong><br>Tien Giang University<br>119 Ap Bac Street, Ward 5, My Tho City, Tien Giang Province, Vietnam</p><p>Phone: (0273) 369 698<br>Email: kythuatcongnghe@tgu.edu.vn<br>Office hours: Monday – Friday, 7:30 – 11:30 and 13:30 – 17:00</p>',
        ];

        foreach ($data as $key => $value) {
            FacultyInfo::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
