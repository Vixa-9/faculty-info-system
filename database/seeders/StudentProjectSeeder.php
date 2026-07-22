<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentProject;

class StudentProjectSeeder extends Seeder
{
    public function run()
    {
        $projects = [
            [
                'title'        => 'Automated Greenhouse Monitoring System Using Raspberry Pi',
                'description'  => 'This project designs and implements a low-cost automated greenhouse monitoring system using Raspberry Pi and various environmental sensors. The system measures temperature, humidity, soil moisture, and CO₂ levels, transmitting data in real time to a mobile dashboard. Automated irrigation and ventilation are triggered based on threshold values, reducing labor and water consumption by up to 35%.',
                'team_members' => 'Nguyễn Hoàng Phúc, Trần Minh Khoa, Lê Thị Ngọc Hân',
                'supervisor'   => 'Dr. Nguyễn Văn An',
                'department'   => 'Information Technology',
                'year'         => 2024,
                'award'        => 'First Prize — Faculty Science Fair 2024',
                'image'        => null,
            ],
            [
                'title'        => 'Flood-Resistant Low-Cost Housing Design for Mekong Delta Communities',
                'description'  => 'A structural engineering project proposing an affordable elevated housing model adapted to the seasonal flooding patterns of the Mekong Delta. The design uses locally sourced bamboo-reinforced concrete columns and prefabricated wall panels. Load calculations, material tests, and scale model construction were completed as part of the project deliverables.',
                'team_members' => 'Phạm Thị Lan Anh, Võ Quốc Tuấn, Đặng Văn Bình',
                'supervisor'   => 'MSc. Trần Thị Bích',
                'department'   => 'Civil Engineering',
                'year'         => 2024,
                'award'        => null,
                'image'        => null,
            ],
            [
                'title'        => 'Solar-Powered Street Lighting Controller with Adaptive Dimming',
                'description'  => 'This project develops an intelligent solar street light controller that adjusts luminosity based on ambient light levels and pedestrian motion detection. The system integrates a MPPT solar charge controller, LDR sensor, PIR motion sensor, and a microcontroller-based dimming circuit. Field tests on the university campus showed 42% energy savings compared to fixed-brightness systems.',
                'team_members' => 'Huỳnh Anh Tuấn, Nguyễn Thị Mỹ Linh',
                'supervisor'   => 'Dr. Lê Hoàng Minh',
                'department'   => 'Electrical and Electronics Engineering',
                'year'         => 2023,
                'award'        => 'Second Prize — Provincial Student Innovation Contest 2023',
                'image'        => null,
            ],
            [
                'title'        => 'Design and Fabrication of a Semi-Automatic Rice Transplanting Machine',
                'description'  => 'This capstone project focuses on designing a lightweight semi-automatic rice transplanting machine suited to small paddy fields typical of Tien Giang province. The machine uses a chain-driven seedling tray mechanism and adjustable planting depth, reducing transplanting time by approximately 60% compared to manual methods. A working prototype was built and tested in a local cooperative field.',
                'team_members' => 'Lê Văn Dũng, Trần Thị Thu Thảo, Nguyễn Quang Huy',
                'supervisor'   => 'Eng. Phạm Quốc Hùng',
                'department'   => 'Mechanical Engineering',
                'year'         => 2023,
                'award'        => 'First Prize — TGU Mechanical Engineering Design Competition 2023',
                'image'        => null,
            ],
            [
                'title'        => 'Web-Based Academic Course Registration System for Faculty of Engineering',
                'description'  => 'A full-stack web application built with Laravel and Vue.js to streamline course registration, timetable conflict detection, and grade reporting for engineering students. The system supports role-based access for students, lecturers, and administrators, and integrates email notifications for registration deadlines and grade publications.',
                'team_members' => 'Đỗ Thị Phương Thảo, Bùi Minh Tuấn, Nguyễn Khánh Linh',
                'supervisor'   => 'Dr. Nguyễn Văn An',
                'department'   => 'Information Technology',
                'year'         => 2022,
                'award'        => null,
                'image'        => null,
            ],
        ];

        foreach ($projects as $data) {
            StudentProject::updateOrCreate(['title' => $data['title']], $data);
        }
    }
}
