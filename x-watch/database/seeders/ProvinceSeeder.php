<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        DB::unprepared(file_get_contents(database_path('seeders/don-vi-hanh-chinh-27.04.021.sql')));
    }
}
