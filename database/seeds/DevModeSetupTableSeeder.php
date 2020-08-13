<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevModeSetupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dev_mode_setup')->insert([
            'developer_mode' => 1,
            'attendance_type' => 1,
            'developer' => 100,
            'created_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d'),
        ]);
    }
}
