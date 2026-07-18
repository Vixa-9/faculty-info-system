<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecturer;

class LecturerSeeder extends Seeder
{
    public function run()
    {
        $lecturers = [
            [
                'name'                => 'Nguyễn Văn An',
                'title'               => 'Dr.',
                'position'            => 'Head of Department',
                'department'          => 'Information Technology',
                'email'               => 'nvAn@tgu.edu.vn',
                'phone'               => '0273 369 698',
                'bio'                 => 'Dr. Nguyễn Văn An holds a PhD in Computer Science from Ho Chi Minh City University of Technology. He has over 15 years of experience in software engineering and AI research.',
                'photo'               => null,
                'research_interests'  => 'Artificial Intelligence, Machine Learning, Software Engineering',
            ],
            [
                'name'                => 'Trần Thị Bích',
                'title'               => 'MSc.',
                'position'            => 'Lecturer',
                'department'          => 'Civil Engineering',
                'email'               => 'ttBich@tgu.edu.vn',
                'phone'               => null,
                'bio'                 => 'MSc. Trần Thị Bích graduated from Can Tho University with a Master\'s degree in Structural Engineering. She specializes in construction materials and structural analysis.',
                'photo'               => null,
                'research_interests'  => 'Structural Analysis, Construction Materials, Sustainable Building',
            ],
            [
                'name'                => 'Lê Hoàng Minh',
                'title'               => 'Dr.',
                'position'            => 'Senior Lecturer',
                'department'          => 'Electrical and Electronics Engineering',
                'email'               => 'lhMinh@tgu.edu.vn',
                'phone'               => '0909 123 456',
                'bio'                 => 'Dr. Lê Hoàng Minh completed his PhD at the University of Da Nang. His research focuses on power electronics and renewable energy systems.',
                'photo'               => null,
                'research_interests'  => 'Power Electronics, Renewable Energy, Embedded Systems',
            ],
            [
                'name'                => 'Phạm Quốc Hùng',
                'title'               => 'Eng.',
                'position'            => 'Lecturer',
                'department'          => 'Mechanical Engineering',
                'email'               => 'pqHung@tgu.edu.vn',
                'phone'               => null,
                'bio'                 => 'Eng. Phạm Quốc Hùng holds a Bachelor\'s degree in Mechanical Engineering and has extensive practical experience in manufacturing and CAD/CAM.',
                'photo'               => null,
                'research_interests'  => 'CAD/CAM, Manufacturing Processes, CNC Machining',
            ],
            [
                'name'                => 'Võ Thị Lan',
                'title'               => 'MSc.',
                'position'            => 'Faculty Secretary',
                'department'          => 'Faculty Office',
                'email'               => 'vtLan@tgu.edu.vn',
                'phone'               => '0273 369 699',
                'bio'                 => 'MSc. Võ Thị Lan manages administrative affairs for the Faculty of Engineering and Technology and coordinates student academic support.',
                'photo'               => null,
                'research_interests'  => null,
            ],
        ];

        foreach ($lecturers as $data) {
            Lecturer::updateOrCreate(['email' => $data['email']], $data);
        }
    }
}
