<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([

             'name' => 'majica',


         ]);
         DB::table('categories')->insert([

                'name' => 'tajice',


            ]);
            DB::table('categories')->insert([

                   'name' => 'dukserica',


               ]);
               DB::table('categories')->insert([

                      'name' => 'sorc',


                  ]);
              
    }
}
