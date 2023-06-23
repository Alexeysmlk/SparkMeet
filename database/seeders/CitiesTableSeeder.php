<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Minsk',
            'Brest',
            'Vitebsk',
            'Grodno',
            'Gomel',
            'Mogilev',
            'Bobruisk',
            'Baranovichi',
            'Borisov',
            'Pinsk',
            'Orsha',
            'Molodechno',
            'Mazyr',
            'Salihorsk',
            'Lida',
            'Polotsk',
            'Zhlobin',
            'Svetlogorsk',
            'Rechitsa',
            'Slutsk',
            'Kobryn',
            'Vawkavysk',
            'Kalinkavichy',
            'Smarhon’',
            'Rahachow',
            'Asipovichy',
            'Horki',
            'Navapolatsk',
            'Maladzyechna',
            'Byaroza'
        ];

        foreach ($cities as $city) {
            City::create([
                'name' => $city
            ]);
        }
    }
}
