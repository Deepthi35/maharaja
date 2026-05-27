<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = \App\Models\Location::all();
        
        foreach ($locations as $location) {
            // You can set specific URLs for each location here
            // These are placeholder URLs - update them with your actual order URLs
            if ($location->id == 1) {
                $location->order_url = 'https://example.com/order-location-1';
            } elseif ($location->id == 2) {
                $location->order_url = 'https://example.com/order-location-2';
            } else {
                $location->order_url = null;
            }
            $location->save();
        }
    }
}
