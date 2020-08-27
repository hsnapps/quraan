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
        $handle = fopen(base_path('database/sql/arabic.sql'), "r");
        if ($handle) {
            while (($sql = fgets($handle)) !== false) {
                DB::statement($sql);
            }
        
            fclose($handle);
        } else {
            logger('Unable to read file!');
        }
    }
}
