<?php

use Illuminate\Database\Seeder;
use App\AdminSettings;

class AdminSettingsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminSettings::truncate();
        AdminSettings::create([
            'prikaziGodine' => '1',
            'prikaziMesece'=> '1',


        ]);
    }
}
