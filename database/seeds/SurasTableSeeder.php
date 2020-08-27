<?php

use App\Sura;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sura::truncate();
        $sql = file_get_contents(base_path('database/sql/all.sql'));
        DB::statement($sql);
    }
}
