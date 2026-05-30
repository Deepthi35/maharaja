<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'location_name' => 'OMAHA',
                'publish' => 1,
                'order_url' => 'https://www.clover.com/online-ordering/maharaja-indian-cuisine-omaha?utm_source=web-dashboard&utm_medium=qrcode&utm_campaign=olo-qr-template',
            ],
            [
                'location_name' => 'PAPILLION',
                'publish' => 1,
                'order_url' => 'https://example.com/order-location-papillion',
            ],
        ];

        foreach ($locations as $locationData) {
            Location::updateOrCreate(
                ['location_name' => $locationData['location_name']],
                [
                    'publish' => $locationData['publish'],
                    'order_url' => $locationData['order_url'],
                ]
            );
        }
    }
}
