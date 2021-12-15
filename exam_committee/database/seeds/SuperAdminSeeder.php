<?php

use App\User;
use App\department;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
          'name'=>'Examination Committee',
          'email'=>'Examination.Committee@gmail.com',
          'is_super'=>1,
          'password'=> bcrypt('143431asd'),
          
      ]);

      department::create([
        'name'=>'Software',
       
        
    ]);

    department::create([
        'name'=>'Civil',
       
        
    ]);

    department::create([
         'name'=>'Petroleum',
       
       
    ]);
    
    department::create([
        'name'=>'Chemical',
      
      
   ]);
   
   department::create([
    'name'=>'Architecture',
  
  
]);

department::create([
'name'=>'Geotechnical',


]);

department::create([
'name'=>'Manufacture',


]);
    }
}
