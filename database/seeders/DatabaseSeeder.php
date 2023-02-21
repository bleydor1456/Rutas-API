<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\PublicService;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        City::firstOrCreate([
            'name' => 'Rosarito'
        ]);
        City::firstOrCreate([
            'name' => 'Tijuana'
        ]);
        City::firstOrCreate([
            'name' => 'Ensenada'
        ]);
        City::firstOrCreate([
            'name' => 'Mexicali'
        ]);
        City::firstOrCreate([
            'name' => 'Tecate'
        ]);

        PublicService::firstOrCreate([
            'name' => 'Agua'
        ]);

        PublicService::firstOrCreate([
            'name' => 'Luz'
        ]);

        PublicService::firstOrCreate([
            'name' => 'Gas'
        ]);

        PublicService::firstOrCreate([
            'name' => 'Drenaje'
        ]);

        PublicService::firstOrCreate([
            'name' => 'Internet'
        ]);
        

    }
}
