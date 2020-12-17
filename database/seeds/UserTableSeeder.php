<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Aula 40
      factory(User::class,10) -> create();      

        //Aula 39
       /* User::create([
            'name' => 'Mateus Mach',
            'email' => 'mateuschiemba@hotmail.com',
            'password' => bcrypt('mwata0606')
        ]);*/
    }
}
