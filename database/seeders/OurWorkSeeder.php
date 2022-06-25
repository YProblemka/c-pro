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
        for ($i = 0; $i < 10; $i++) {
            $ourWork = OurWork::getById($i);
            if (!$ourWork->exists) {
                OurWork::query()->create(["id" => $i, "img_src"=>""]);
            }
        }
    }
}
