<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                "name" => "phone",
                "value" => "+7 (912) 987-65-43"
            ],
            [
                "name" => "email",
                "value" => "example@gmail.com"
            ],
            [
                "name" => "telegram",
                "value" => "t.me/example"
            ]
        ];
        foreach ($settings as $setting) {
            $settingDB = Setting::getByName($setting["name"]);
            if (!$settingDB->exists) {
                Setting::query()->create($setting);
            }
            else{
                $settingDB->value = $setting["value"];
                $settingDB->save();
            }
        }
    }
}
