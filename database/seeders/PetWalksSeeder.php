<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\PetWalks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetWalksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pet = Pet::factory()->create();

        $petWalk = PetWalks::factory([
                                'location' => 'el parque',
                                'walk_date' => '2024-02-14',
                            ])
                            ->make();

        $pet->petWalks()->save($petWalk);
    }
}
