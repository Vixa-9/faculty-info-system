<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $departments = [
            [
                'name' => 'Information Technology',
                'slug' => 'information-technology',
                'introduction' => '<p>The Department of Information Technology is the largest and most dynamic department at the Faculty of Engineering and Technology, Tien Giang University. We offer rigorous undergraduate programs that combine theoretical computer science with hands-on software development, networking, and data systems.</p><p>Our graduates are well-prepared for careers in software engineering, system administration, data analysis, and emerging fields such as artificial intelligence and cybersecurity.</p>',
                'training_programs' => '<ul><li><strong>Bachelor of Information Technology</strong> — 4-year program covering software engineering, databases, networking, and AI fundamentals.</li><li><strong>Applied Programming Certificate</strong> — Short-term vocational track for web and mobile application development.</li><li><strong>Data Science Elective Track</strong> — Specialized elective series covering statistics, machine learning, and data visualization.</li></ul>',
                'research_activities' => '<p>Active research areas include machine learning applications in agriculture, smart city infrastructure, and cybersecurity. Faculty members regularly publish in national and international journals and collaborate with industry partners in the Mekong Delta region.</p>',
                'contact_info' => "Office: Building A, Room 201\nPhone: 0273 369 698\nEmail: it.dept@tgu.edu.vn\nOffice Hours: Monday – Friday, 7:30 AM – 5:00 PM",
            ],
            [
                'name' => 'Civil Engineering',
                'slug' => 'civil-engineering',
                'introduction' => '<p>The Department of Civil Engineering trains engineers capable of designing, constructing, and maintaining the infrastructure that underpins modern society. Students gain practical skills in structural analysis, hydraulics, transportation, and construction management through laboratory work and field projects.</p><p>The department maintains strong ties with local construction companies and government agencies, providing students with internship and employment opportunities across the Mekong Delta.</p>',
                'training_programs' => '<ul><li><strong>Bachelor of Civil Engineering</strong> — 4.5-year program covering structural engineering, geotechnics, hydraulics, and project management.</li><li><strong>Construction Technology Certificate</strong> — Vocational track focusing on building materials, site safety, and construction supervision.</li></ul>',
                'research_activities' => '<p>Research focuses on flood-resilient construction techniques suitable for the Mekong Delta, sustainable building materials, and bridge maintenance methodologies. Department faculty collaborate with the Ministry of Construction on regional infrastructure projects.</p>',
                'contact_info' => "Office: Building B, Room 101\nPhone: 0273 369 700\nEmail: civil.dept@tgu.edu.vn\nOffice Hours: Monday – Friday, 7:30 AM – 5:00 PM",
            ],
            [
                'name' => 'Electrical and Electronics Engineering',
                'slug' => 'electrical-and-electronics-engineering',
                'introduction' => '<p>The Department of Electrical and Electronics Engineering prepares students for careers in power systems, telecommunications, embedded systems, and industrial automation. Our curriculum balances foundational electrical theory with modern electronics design and practical laboratory experience.</p><p>Students graduate equipped to work in power utilities, manufacturing plants, telecom companies, and technology startups.</p>',
                'training_programs' => '<ul><li><strong>Bachelor of Electrical and Electronics Engineering</strong> — 4-year program covering circuit theory, power systems, control engineering, and signal processing.</li><li><strong>Industrial Automation Certificate</strong> — Vocational track on PLC programming, sensor systems, and SCADA.</li><li><strong>Renewable Energy Elective Track</strong> — Focus on solar, wind, and energy storage technologies.</li></ul>',
                'research_activities' => '<p>Key research areas include solar power integration for rural electrification, IoT-based monitoring systems, and power electronics for grid stability. The department operates a renewable energy laboratory equipped with photovoltaic panels and battery storage systems.</p>',
                'contact_info' => "Office: Building C, Room 105\nPhone: 0273 369 701\nEmail: eee.dept@tgu.edu.vn\nOffice Hours: Monday – Friday, 7:30 AM – 5:00 PM",
            ],
            [
                'name' => 'Mechanical Engineering',
                'slug' => 'mechanical-engineering',
                'introduction' => '<p>The Department of Mechanical Engineering provides training in the design, analysis, and manufacturing of mechanical systems. Students develop competencies in thermodynamics, fluid mechanics, materials science, and computer-aided design (CAD), preparing them for roles in manufacturing, automotive, and agricultural machinery industries.</p><p>Hands-on workshops and industry partnerships ensure graduates are job-ready from day one.</p>',
                'training_programs' => '<ul><li><strong>Bachelor of Mechanical Engineering</strong> — 4-year program covering mechanics, thermodynamics, machine design, and manufacturing processes.</li><li><strong>CNC Machining Certificate</strong> — Vocational track on CNC operation, CAM software, and precision manufacturing.</li><li><strong>Agricultural Machinery Elective</strong> — Specialized training on rice harvesting equipment and irrigation machinery relevant to the Mekong Delta.</li></ul>',
                'research_activities' => '<p>Research areas include optimization of agricultural machinery for local crop types, additive manufacturing (3D printing), and vibration analysis for industrial equipment. Faculty collaborate with local rice milling factories and agricultural cooperatives.</p>',
                'contact_info' => "Office: Building D, Room 102\nPhone: 0273 369 702\nEmail: mech.dept@tgu.edu.vn\nOffice Hours: Monday – Friday, 7:30 AM – 5:00 PM",
            ],
            [
                'name' => 'Faculty Office',
                'slug' => 'faculty-office',
                'introduction' => '<p>The Faculty Office is the administrative hub of the Faculty of Engineering and Technology. Our dedicated staff support students, faculty, and management in all administrative, academic, and logistical matters. We ensure smooth day-to-day operations, coordinate academic schedules, and serve as the first point of contact for inquiries.</p>',
                'training_programs' => null,
                'research_activities' => null,
                'contact_info' => "Office: Building A, Room 101\nPhone: 0273 369 699\nEmail: office.ket@tgu.edu.vn\nFax: 0273 369 695\nOffice Hours: Monday – Friday, 7:30 AM – 5:00 PM",
            ],
        ];

        foreach ($departments as $data) {
            Department::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
