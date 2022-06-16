<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Analgesik Narkotik',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'Analgesik Non Narkotik',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'Antipirai',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'Nyeri Neuropatik',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'Anestetik Lokal',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'Anestetik Umum dan Oksigenl',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'Obat Untuk Prosedur pre-Operatif',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'antialergi dan obat untuk anafilaksis',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'antiepilepsi - antikonvulsi',
            'description' => ''
        ]);
        DB::table('categories')->insert([
            'name' => 'Antelmintik Intestinal',
            'description' => ''
        ]);
    }
}
