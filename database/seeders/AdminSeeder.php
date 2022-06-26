<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                "login" => "admin",
                "password" => env('ADMIN_PASSWORD', 'Rad027S')
            ]
        ];
        foreach ($admins as $admin) {
            $user = User::getByLogin($admin["login"]);
            if (!$user->exists) {
                $user = new User();
                $user->password = $admin["password"];
                $user->login = $admin["login"];
                $user->save();
            }
            else{
                $user->password = $admin["password"];
                $user->save();
            }
        }
    }
}
