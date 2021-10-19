<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        //Usuario admin
        User::factory(1)->create([
            "username" => "dev",
            "name" => "Developer",
            "password" => bcrypt("admin")
        ])->each(function (User $user){
            $user->syncRoles([Role::DEVELOPER]);
            $user->options()->sync(Option::pluck('id')->toArray());
            $user->shortcuts()->sync([3,4,5,6]);
        });

        User::factory(1)->create([
            "username" => "Super",
            "name" => "Super Admin",
            "password" => bcrypt("123")
        ])->each(function (User $user){
            $user->syncRoles(Role::SUPERADMIN);
            $user->options()->sync(Option::pluck('id')->toArray());
            $user->shortcuts()->sync([3,4,5,6]);

        });

        User::factory(1)->create([
            "username" => "Admin",
            "name" => "Administrador",
            "password" => bcrypt("123")
        ])->each(function (User $user){
            $user->syncRoles(Role::ADMIN);
            $user->options()->sync(Option::pluck('id')->toArray());
            $user->shortcuts()->sync([3,4,5,6]);

        });

        if (app()->environment()=='local'){

            User::factory(1)->create([
                "username" => "Medico",
                "name" => "Medico",
                "password" => bcrypt("123")
            ])->each(function (User $user){
                $user->syncRoles(Role::MEDICO);
//            $user->shortcuts()->sync([3,4,5,6]);

            });

            User::factory(1)->create([

                "username" => "Admisión",
                "name" => "Admisión",
                "password" => bcrypt("123")
            ])->each(function (User $user){
                $user->syncRoles(Role::ADMISION);
//            $user->shortcuts()->sync([3,4,5,6]);

            });


        }
    }
}
