<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'company_name' => 'Google LLC',
            'logo' => '',
            'email' => 'press@google.com',
            'address' => '1600 Amphitheatre Parkway, Mountain View, CA',
            'website' => 'https://www.google.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
