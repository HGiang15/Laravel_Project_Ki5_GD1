<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Passenger;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('bookings')->delete(); // xoa DL cũ

        $faker = Faker::create();

        // Lấy danh sách tất cả các chuyến bay và hành khách
        $idflights = Flight::pluck('FlightNumber')->toArray();
        $idpassengers = Passenger::pluck('EmailAddress')->toArray();

        // Tạo dữ liệu giả cho bảng bookings
        for ($i = 0; $i < 25; $i++) {
            Booking::create([
                'idFlight' => $faker->randomElement($idflights),
                'idPassenger' => $faker->randomElement($idpassengers),
            ]);
        }
    }
}
