<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert([
             'category_id' => 1,
             'img' =>'ma1.jpg',
             'name' => 'Nike top',
             'description' => 'Crni nike top od kvalitetnog materijala',
             'price' => 24.50,
             'gender_id'=>1,


         ]);
         DB::table('products')->insert([
                'category_id' => 1,
                'img' =>'ma5.jpg',
                'name' => 'Nike t-shirt',
                'description' => 'Crna nike top kvalitetnog materijala',
                'price' => 30.50,
                 'gender_id'=>1,

            ]);


         DB::table('products')->insert([
                'category_id' => 1,
                'img' =>'ma2.jpg',
                'name' => 'Nike t-shirt',
                'description' => 'Bijela siroka nike majica',
                'price' => 35.50,
                 'gender_id'=>1,


            ]);
            DB::table('products')->insert([
                   'category_id' => 1,
                   'img' =>'ma4.jpg',
                   'name' => 'Nike top',
                   'description' => 'Bijeli sportski top, nike majica',
                   'price' => 25,
                    'gender_id'=>1,

               ]);
            DB::table('products')->insert([
                   'category_id' => 1,
                   'img' =>'ma3.jpg',
                   'name' => 'Nike t-shirt',
                   'description' => 'Crni nike majica odlicne cijene',

                   'price' => 20.40,
                    'gender_id'=>1,


               ]);


                     DB::table('products')->insert([
                            'category_id' => 1,
                            'img' =>'ma1.jpg',
                            'name' => 'Nike t-shirt',
                            'description' => 'Crna nike majica dugih rukava',
                            'price' => 37.50,
                            'gender_id'=>2,


                        ]);

                        DB::table('products')->insert([
                               'category_id' => 1,
                               'img' =>'ma5.jpg',
                               'name' => 'Nike t-shirt',
                               'description' => 'Crna nike majica kratkih rukava',
                               'price' => 30.50,
                               'gender_id'=>2,


                           ]);
                           DB::table('products')->insert([
                                  'category_id' => 1,
                                  'img' =>'ma3.jpg',
                                  'name' => 'Nike t-shirt',
                                  'description' => 'Siva nike majica od kvalitetnog materijala',
                                  'price' => 15,
                                  'gender_id'=>2,


                              ]);

                                        DB::table('products')->insert([
                                                  'category_id' => 1,
                                                'img' =>'ma4.jpg',
                                                'name' => 'Nike t-shirt',
                                                'description' => 'Zelena addidas majica kratkih rukava',
                                                'price' => 20.50,
                                                'gender_id'=>2,


                                                               ]);
                        DB::table('products')->insert([
                               'category_id' => 1,
                               'img' =>'ma2.jpg',
                               'name' => 'Nike t-shirt',
                               'description' => 'Crna nike majica kratkih rukava',
                               'price' => 35.50,
                               'gender_id'=>2,


                           ]);



                                    DB::table('products')->insert([
                                           'category_id' => 2,
                                           'img' =>'ta1.jpg',
                                           'name' => 'Blue leggings',
                                           'description' => 'Sive tajice od kvalitetnog materijala',
                                           'price' => 15,
                                           'gender_id'=>1,


                                       ]);


                                       DB::table('products')->insert([
                                              'category_id' => 2,
                                              'img' =>'ta2.jpg',
                                              'name' => 'Nike t-shirt',
                                              'description' => 'Crne sportske tajice',
                                              'price' => 20,
                                              'gender_id'=>1,


                                          ]);
                                          DB::table('products')->insert([
                                                 'category_id' =>2,
                                                 'img' =>'ta4.jpg',
                                                 'name' => 'Nike top',
                                                 'description' => 'Plave sportske tajice',
                                                 'price' => 13,
                                                 'gender_id'=>1,


                                             ]);
                                             DB::table('products')->insert([
                                                    'category_id' => 2,
                                                    'img' =>'ta5.jpg',
                                                    'name' => 'Nike t-shirt',
                                                    'description' => 'Crna sportske tajice',
                                                    'price' => 30,
                                                    'gender_id'=>1,


                                                ]);
                                          DB::table('products')->insert([
                                                 'category_id' => 2,
                                                 'img' =>'ta3.jpg',
                                                 'name' => 'Nike t-shirt',
                                                 'description' => 'Crni nike tajice odlicne cijene',
                                                 'price' =>17,
                                                 'gender_id'=>1,


                                             ]);



    }
}
