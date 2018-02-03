<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
        	'name' => 'Restaurante Valhala',
        	'description' => 'Atención cálida y comida preparada por artistas.',
            'email' => 'bachb-1997@hotmail.com',
            'logo' => 'https://s6.postimg.org/mmrgdywyp/logo2.png',
        	'long_description' => 'You do know, you do know that they don’t want you to have lunch. I’m keeping it real with you, so what you going do is have lunch. I’m giving you cloth talk, cloth. Special cloth alert, cut from a special cloth. You should never complain, complaining is a weak emotion, you got life, we breathing, we blessed. The key to more success is to get a massage once a week, very important, major key, cloth talk. Egg whites, turkey sausage, wheat toast, water. Of course they don’t want us to eat our breakfast, so we are going to enjoy our breakfast',
            'direccion' => 'Barrio el Jardin',
            'municipio' => 'Puerto Caicedo',
            'departamento' => 'Putumayo',
        	'user_id' => '1'
        ]);
    }
}