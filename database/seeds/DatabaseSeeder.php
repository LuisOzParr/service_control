<?php

use App\Rol;
use App\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Rol::create(['rol'=>'user']);
        Rol::create(['rol'=>'admin']);

        //create admin user
        DB::table('users')->insert(['name'=>'Root User', 'email'=>'root@root.com', 'password'=>bcrypt('secret'),'age'=>20, 'gender'=>'male', 'rol_id'=>2]);

        //create generic users
        for ($user_id = 2 ; $user_id < 12; $user_id++){
            DB::table('users')->insert([
                'name'=>Str::random(10),
                'email'=>Str::random(10).'@fake.com',
                'password'=>bcrypt('secret'),
                'age'=>20,
                'gender'=>'male',
                'rol_id'=>1
            ]);

            //create services
            for ($service_id = 1; $service_id < 10; $service_id++ ){
                Service::create(['name'=>Str::random(10), 'user_id'=>$user_id]);
            }

        }


    }
}
