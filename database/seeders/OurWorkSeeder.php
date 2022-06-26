<?php

namespace Database\Seeders;

use App\Models\OurWork;
use Illuminate\Database\Seeder;

class OurWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 6; $i++) {
            $ourWork = OurWork::getById($i);
            if (!$ourWork->exists) {
                OurWork::query()->create(["id" => $i, "img_src"=>"1.png"]);
            }
        }
    }
}
