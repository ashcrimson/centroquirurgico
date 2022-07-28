<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTable2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::factory(1)->create([
//            "username" => "BANCO SANGRE",
//            "name" => "BANCO SANGRE",
//            "password" => bcrypt("123")
//        ])->each(function (User $user){
//            $user->syncRoles(Role::BANCO_SANGRE);
//            $user->shortcuts()->sync([3,4,5,6]);
//        });
    }
}
