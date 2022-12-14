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
            $user->syncRoles([Role::DEVELOPER,Role::PREOP_ANESTESISTA,Role::PREOP_EU,Role::PREOP_MEDICO]);
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


            User::factory(1)->create([
                "username" => "Medico1",
                "name" => "Medico",
                "password" => bcrypt("123")
            ])->each(function (User $user){
                $user->syncRoles(Role::MEDICO);
//            $user->shortcuts()->sync([3,4,5,6]);

            });

            User::factory(1)->create([
                "username" => "Medico2",
                "name" => "Medico 2",
                "password" => bcrypt("123")
            ])->each(function (User $user){
                $user->syncRoles(Role::MEDICO);
    //            $user->shortcuts()->sync([3,4,5,6]);

            });

            User::factory(1)->create([
                "username" => "Medico3",
                "name" => "Medico 3",
                "password" => bcrypt("123")
            ])->each(function (User $user){
                $user->syncRoles(Role::MEDICO);
    //            $user->shortcuts()->sync([3,4,5,6]);

            });

            User::factory(1)->create([

                "username" => "Admisi??n",
                "name" => "Admisi??n",
                "password" => bcrypt("123")
            ])->each(function (User $user){
                $user->syncRoles(Role::ADMISION);
//            $user->shortcuts()->sync([3,4,5,6]);

            });

            User::factory(1)->create([

                "username" => "PREOP ANESTESISTA",
                "name" => "PREOP ANESTESISTA",
                "password" => bcrypt("123")
            ])->each(function (User $user){
                $user->syncRoles(Role::PREOP_ANESTESISTA);
//            $user->shortcuts()->sync([3,4,5,6]);

            });

            User::factory(1)->create([

                "username" => "PREOP EU",
                "name" => "PREOP EU",
                "password" => bcrypt("123")
            ])->each(function (User $user){
                $user->syncRoles(Role::PREOP_EU);
//            $user->shortcuts()->sync([3,4,5,6]);

            });

            User::factory(1)->create([

                "username" => "PREOP M??DICO",
                "name" => "PREOP M??DICO",
                "password" => bcrypt("123")
            ])->each(function (User $user){
                $user->syncRoles(Role::PREOP_MEDICO);
//            $user->shortcuts()->sync([3,4,5,6]);

            });


    }
}
