<?php

use Illuminate\Database\Seeder;

class DevAppDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AdminModel\Project::create([
            'app_name' => 'Metronic Dashboard',
            'company_name' => 'Ferdous Anam',
            'company_address' => 'Dhaka, Bangladesh',
            'company_contact' => '01738238012',
            'company_logo' => 'logo.png',
            'brand_logo' => 'brand.png',
            'app_icon' => 'favicon.ico',
        ]);
    }
}
