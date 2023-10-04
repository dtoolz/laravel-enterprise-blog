<?php

namespace Database\Seeders;

use App\Models\FooterInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterInformation::updateOrCreate(
            ['language' => 'en'],
            [
                'logo' => '/test',
                'description' => 'test',
                'copyright' => 'test'
            ]
        );
    }
}
