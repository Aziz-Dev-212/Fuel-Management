<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\FuelType;
use App\Models\Service;
use App\Models\Car;
use App\Models\FuelStock;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $diesel = FuelType::create(['type' => 'gazoil']);
        $super = FuelType::create(['type' => 'super']);

        // Services
        $it = Service::create(['name' => 'IT Department']);
        $accounting = Service::create(['name' => 'Accounting']);

        // Cars
        Car::create(['name' => 'Toyota Hilux', 'matricule' => 'ABC-123', 'kilometrage' => 120000, 'model' => '2020', 'fuel_type_id' => $diesel->id, 'service_id' => $it->id]);
        Car::create(['name' => 'Mercedes Vito', 'matricule' => 'XYZ-987', 'kilometrage' => 85000, 'model' => '2019', 'fuel_type_id' => $super->id, 'service_id' => $accounting->id]);

        // Fuel Stock
        FuelStock::create(['fuel_type_id' => $diesel->id, 'quantity' => 1000]);
        FuelStock::create(['fuel_type_id' => $super->id, 'quantity' => 500]);
    }
}
