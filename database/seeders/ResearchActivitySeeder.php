<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ResearchActivity;

class ResearchActivitySeeder extends Seeder
{
    public function run()
    {
        $activities = [
            [
                'title'       => 'Smart Irrigation System for Mekong Delta Agriculture Using IoT Sensors',
                'type'        => 'Research Project',
                'description' => 'A two-year applied research project developing a low-cost IoT-based irrigation monitoring and control system adapted to the specific flooding and drought cycles of the Mekong Delta. The system integrates soil moisture sensors, weather data, and a mobile dashboard for farmers.',
                'authors'     => 'Nguyễn Văn An, Lê Hoàng Minh',
                'date'        => '2025-03-01',
                'link'        => null,
                'image'       => null,
                'department'  => 'Information Technology',
            ],
            [
                'title'       => 'Deep Learning Approaches for Rice Disease Detection in Southern Vietnam',
                'type'        => 'Publication',
                'description' => 'Published in the Journal of Agricultural Informatics. This paper proposes a convolutional neural network model trained on a dataset of 12,000 rice leaf images collected across Tien Giang and Long An provinces, achieving 94.2% classification accuracy for six common rice diseases.',
                'authors'     => 'Nguyễn Văn An, Trần Thị Bích',
                'date'        => '2024-11-15',
                'link'        => null,
                'image'       => null,
                'department'  => 'Information Technology',
            ],
            [
                'title'       => 'International Conference on Engineering and Applied Sciences (ICEAS 2025)',
                'type'        => 'Conference',
                'description' => 'Faculty members presented three papers at ICEAS 2025 held in Ho Chi Minh City. Topics covered embedded systems for industrial automation, sustainable construction materials in tropical climates, and renewable energy integration in rural power grids.',
                'authors'     => 'Lê Hoàng Minh, Phạm Quốc Hùng, Trần Thị Bích',
                'date'        => '2025-08-20',
                'link'        => null,
                'image'       => null,
                'department'  => 'Electrical and Electronics Engineering',
            ],
            [
                'title'       => 'Workshop on CAD/CAM Technologies for Vietnamese Manufacturing SMEs',
                'type'        => 'Workshop',
                'description' => 'A two-day hands-on workshop organized in partnership with the Tien Giang Department of Industry and Trade. Over 45 engineers and technicians from local manufacturing companies attended sessions on CNC programming, SolidWorks simulation, and lean manufacturing principles.',
                'authors'     => 'Phạm Quốc Hùng',
                'date'        => '2025-05-10',
                'link'        => null,
                'image'       => null,
                'department'  => 'Mechanical Engineering',
            ],
            [
                'title'       => 'Best Paper Award — Vietnam National Engineering Symposium 2024',
                'type'        => 'Award',
                'description' => 'Dr. Nguyễn Văn An received the Best Paper Award at the Vietnam National Engineering Symposium 2024 for his research on federated learning applied to agricultural pest detection. The award was presented by the Vietnam Association of Engineering Sciences.',
                'authors'     => 'Nguyễn Văn An',
                'date'        => '2024-09-05',
                'link'        => null,
                'image'       => null,
                'department'  => 'Information Technology',
            ],
        ];

        foreach ($activities as $data) {
            ResearchActivity::updateOrCreate(
                ['title' => $data['title']],
                $data
            );
        }
    }
}
