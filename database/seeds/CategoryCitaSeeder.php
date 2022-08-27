<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryCitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_citas')->insert([
            'name' => 'Cita',
            'created_at' => Carbon::now()
        ]);
        DB::table('category_citas')->insert([
            'name' => 'Recordatorio',
            'created_at' => Carbon::now()
        ]);
    }
}
