<?php

use Illuminate\Support\Facades\DB;

function developer_mode() {
    $dev = DB::table('dev_mode_setup')->first();
    return $dev->developer_mode;
}

function dev_details() {
    return DB::table('dev_developer_details')->first();
}
