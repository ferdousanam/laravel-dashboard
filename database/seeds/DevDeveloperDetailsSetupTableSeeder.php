<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevDeveloperDetailsSetupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dev_developer_details')->insert([
            'dev_name' => 'Ferdous Anam',
            'dev_email' => 'ferdous.anam@gmail.com',
            'dev_website' => 'https://ferdousanam.xyz',
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d'),
        ]);
    }
}
