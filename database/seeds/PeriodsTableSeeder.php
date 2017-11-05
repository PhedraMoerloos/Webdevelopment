<?php

use Illuminate\Database\Seeder;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('periods')->insert([

        ['period_number' => 1,
         'startdate' => '2017-10-09',
         'enddate' => '2017-10-22',
         'question' => 'In which European city can you find the home of Anne Frank?',
         'answer' => 'Amsterdam',
         'competition_id' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()],

        ['period_number' => 2,
         'startdate' => '2017-10-23',
         'enddate' => '2017-11-05',
         'question' => 'How many miles long is the Great Wall of China?',
         'answer' => '4000',
         'competition_id' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()],

        ['period_number' => 3,
         'startdate' => '2017-11-06',
         'enddate' => '2017-11-19',
         'question' => 'In what year did princess diana die?',
         'answer' => '1997',
         'competition_id' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()],

        ['period_number' => 4,
         'startdate' => '2017-11-20',
         'enddate' => '2017-12-03',
         'question' => 'What is the name of the Indian holy river?',
         'answer' => 'Ganges',
         'competition_id' => 1,
         'created_at' => NOW(),
         'updated_at' => NOW()]
         
      ]);

    }
}
