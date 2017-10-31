<?php

use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('participants')->insert([
        ['firstname' => 'Anne', 'lastname' => 'Johnsens', 'address' => 'Stationstraat 20', 'city' => 'Mechelen', 'zipcode' => 2800, 'email' => 'johnsens.anne@gmail.com','ipaddress' => '191.151.18.112','answered_correctly' => 0, 'competition_id' => 1, 'period_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
        ['firstname' => 'Ben', 'lastname' => 'De Vleeschauwer', 'address' => 'Stationstraat 15', 'city' => 'Brussel', 'zipcode' => 1000, 'email' => 'devleeschauwer.ben@gmail.com','ipaddress' => '105.224.59.80','answered_correctly' => 1, 'competition_id' => 1, 'period_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
        ['firstname' => 'Anne', 'lastname' => 'Beatens', 'address' => 'Stationstraat 10', 'city' => 'Sint-Niklaas', 'zipcode' => 9100, 'email' => 'beatens.anne@gmail.com','ipaddress' => '151.17.247.118','answered_correctly' => 0, 'competition_id' => 1, 'period_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
        ['firstname' => 'Dirk', 'lastname' => 'Huybrechts', 'address' => 'Stationstraat 5', 'city' => 'Mechelen', 'zipcode' => 2800, 'email' => 'huybrechts.dirk@gmail.com','ipaddress' => '220.213.201.89','answered_correctly' => 1, 'competition_id' => 1, 'period_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()]
      ]);

    }
}
