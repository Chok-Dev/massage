<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('commodities')->insert([
            [
                'id' => IdGenerator::generate(['table' => 'commodities', 'length' => 10, 'prefix' => "COM"]),
                'commodity_name' => 'drug_store_1',
                'commodity_id' => '7440-001-0001/312',
                'anydesk_ip' => '707564189',
                'commodity_ward' => 'คลังยา',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
        DB::table('commodities')->insert([

            [
                'id' => IdGenerator::generate(['table' => 'commodities', 'length' => 10, 'prefix' => "COM"]),
                'commodity_name' => 'drug_store_2',
                'commodity_id' => '7440-001-0001/443',
                'anydesk_ip' => '222134333',
                'commodity_ward' => 'คลังยา',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
        DB::table('commodities')->insert([

            [
                'id' => IdGenerator::generate(['table' => 'commodities', 'length' => 10, 'prefix' => "COM"]),
                'commodity_name' => 'drug_store_3',
                'commodity_id' => '7440-001-0001/441',
                'anydesk_ip' => '1439385151',
                'commodity_ward' => 'คลังยา',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
        DB::table('commodities')->insert([
            [
                'id' => IdGenerator::generate(['table' => 'commodities', 'length' => 10, 'prefix' => "COM"]),
                'commodity_name' => 'drug_store_4',
                'commodity_id' => '7440-001-0001/439',
                'anydesk_ip' => '551755496',
                'commodity_ward' => 'คลังยา',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);

    }
}
