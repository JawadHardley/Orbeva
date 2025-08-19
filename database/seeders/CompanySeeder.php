<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Company::insert([
            [
                'name' => 'Orbeva',
                'type' => 'admin',
                'email' => 'jawadcharls@gmail.com',
                'address' => 'Kinondoni, Dar es Salaam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mikhanyi Logistics',
                'type' => 'vendor',
                'email' => 'ilungam@mikhanyi.co.za',
                'address' => 'P.O BOX 1322',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alistair James Company Ltd',
                'type' => 'transporter',
                'email' => 'trading@alistairgroup.com',
                'address' => 'P.O BOX 4543, Dar es Salaam, Kurasini Temeke',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more companies as needed...
        ]);
    }
}
