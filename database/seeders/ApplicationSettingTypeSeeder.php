<?php
namespace Database\Seeders;
use App\Models\ApplicationSettingType;
use Illuminate\Database\Seeder;
class ApplicationSettingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (ApplicationSettingType::where('slug', 'application-settings')->first() == null) {
            ApplicationSettingType::create([
                'type' => 'Application Settings',
                'slug' => 'application-settings',
            ]);
        }
        if (ApplicationSettingType::where('slug', 'theme-settings')->first() == null) {
            ApplicationSettingType::create([
                'type' => 'Theme Settings',
                'slug' => 'theme-settings',
            ]);
        }
        if (ApplicationSettingType::where('slug', 'contact-details')->first() == null) {
            ApplicationSettingType::create([
                'type' => 'Contact Details',
                'slug' => 'contact-details',
            ]);
        }
        if (ApplicationSettingType::where('slug', 'popup-settings')->first() == null) {
            ApplicationSettingType::create([
                'type' => 'Popup Settings',
                'slug' => 'popup-settings',
            ]);
        }
    }
}
