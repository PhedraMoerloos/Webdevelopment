<?php

use Illuminate\Database\Seeder;

class CompetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('competitions')->insert([
        ['title' => 'Competition Yuppie!', 'photo_url' => 'img/goldfish.jpg', 'description' => 'Answer the question correctly and you might win a free goldfish and aquarium! Every 2 weeks a new winner is selected!', 'competition_manager_name' => 'Phedra Moerloos', 'competition_manager_email' => 'moerloos.phedra@hotmail.com', 'created_at' => NOW(), 'updated_at' => NOW()]
      ]);

    }
}
