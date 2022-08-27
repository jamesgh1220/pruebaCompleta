<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StateCitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_citas')->insert([
            'name' => 'Pendiente',
            'created_at' => Carbon::now()
        ]);
        DB::table('state_citas')->insert([
            'name' => 'Completada',
            'created_at' => Carbon::now()
        ]);
        DB::table('state_citas')->insert([
            'name' => 'Cancelada',
            'created_at' => Carbon::now()
        ]);
    }
}
