<?php
namespace Database\Seeders;
use App\Models\ApplicationSetting;
use App\Models\ApplicationSettingType;
use Illuminate\Database\Seeder;
class ApplicationSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = ApplicationSettingType::where('slug', 'application-settings')->first();
        if (ApplicationSetting::where('slug', 'sidebar-collapse')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Sidebar Collapse',
                'slug' => 'sidebar-collapse',
                'input_type' => 'switch',
                'value' => '0',
                'application_setting_type_id' => $type->id
            ]);
        }
        $type1 = ApplicationSettingType::where('slug', 'theme-settings')->first();
        if (ApplicationSetting::where('slug', 'logo')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Logo',
                'slug' => 'logo',
                'input_type' => 'file',
                'value' => ' ',
                'application_setting_type_id' => $type1->id
            ]);
        }
        if (ApplicationSetting::where('slug', 'site-name')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Site Name',
                'slug' => 'site-name',
                'input_type' => 'textbox',
                'value' => ' ',
                'application_setting_type_id' => $type1->id
            ]);
        }
        if (ApplicationSetting::where('slug', 'primay-color')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Primay Color',
                'slug' => 'primay-color',
                'input_type' => 'color',
                'value' => ' ',
                'application_setting_type_id' => $type1->id
            ]);
        }
        if (ApplicationSetting::where('slug', 'secondary-color')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Secondary Color',
                'slug' => 'secondary-color',
                'input_type' => 'color',
                'value' => ' ',
                'application_setting_type_id' => $type1->id
            ]);
        }
        $type2 = ApplicationSettingType::where('slug', 'contact-details')->first();
        if (ApplicationSetting::where('slug', 'primary-phone-number')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Primary Phone Number',
                'slug' => 'primary-phone-number',
                'input_type' => 'textbox',
                'value' => ' ',
                'application_setting_type_id' => $type2->id
            ]);
        }
        if (ApplicationSetting::where('slug', 'secondary-phone-number')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Secondary Phone Number',
                'slug' => 'secondary-phone-number',
                'input_type' => 'textbox',
                'value' => ' ',
                'application_setting_type_id' => $type2->id
            ]);
        }
        if (ApplicationSetting::where('slug', 'primary-mail')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Primary Mail',
                'slug' => 'primary-mail',
                'input_type' => 'textbox',
                'value' => ' ',
                'application_setting_type_id' => $type2->id
            ]);
        }
        if (ApplicationSetting::where('slug', 'secondary-mail')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Secondary Mail',
                'slug' => 'secondary-mail',
                'input_type' => 'textbox',
                'value' => ' ',
                'application_setting_type_id' => $type2->id
            ]);
        }
        if (ApplicationSetting::where('slug', 'contact-address')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Contact Address',
                'slug' => 'contact-address',
                'input_type' => 'textarea',
                'value' => ' ',
                'application_setting_type_id' => $type2->id
            ]);
        }
        $type7 = ApplicationSettingType::where('slug', 'popup-settings')->first();
        if (ApplicationSetting::where('slug', 'popup-toggle')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Popup Toggle',
                'slug' => 'popup-toggle',
                'input_type' => 'switch',
                'value' => '',
                'application_setting_type_id' =>  $type7->id
            ]);
        }


        if (ApplicationSetting::where('slug', 'popup-once-day')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Popup Once a day',
                'slug' => 'popup-once-day',
                'input_type' => 'switch',
                'value' => '',
                'application_setting_type_id' =>  $type7->id
            ]);
        }

        
    if (ApplicationSetting::where('slug', 'popup-title')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Popup Title',
                'slug' => 'popup-title',
                'input_type' => 'textbox',
                'value' => ' ',
                'application_setting_type_id' => $type7->id
            ]);
        }
        if (ApplicationSetting::where('slug', 'popup-image')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Popup Image',
                'slug' => 'popup-image',
                'input_type' => 'file',
                'value' => ' ',
                'application_setting_type_id' => $type7->id
            ]);
        }
        if (ApplicationSetting::where('slug', 'popup-text')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Popup Text',
                'slug' => 'popup-text',
                'input_type' => 'textarea',
                'value' => ' ',
                'application_setting_type_id' => $type7->id
            ]);
        }
        if (ApplicationSetting::where('slug', 'popup-button-text')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Popup Button Text',
                'slug' => 'popup-button-text',
                'input_type' => 'textbox',
                'value' => '',
                'application_setting_type_id' => $type7->id
            ]);
        }

        if (ApplicationSetting::where('slug', 'popup-button-url')->first() == null) {
            ApplicationSetting::create([
                'field_name' => 'Popup Button Url',
                'slug' => 'popup-button-url',
                'input_type' => 'textbox',
                'value' => '',
                'application_setting_type_id' => $type7->id
            ]);
        }

    }
}
