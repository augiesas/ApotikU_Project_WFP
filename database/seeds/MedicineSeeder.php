<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ID CATEGORY 1
        DB::table('medicines')->insert([
            'generic_name' => 'Fentanil',
            'form' => 'inj 0,05 mg/mL (i.m./i.v.)',
            'restriction_formula' => '5 amp/kasus.',
            'price' => 15000,
            'description' => 'inj: Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi.',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'fentanil 0.05mg.jpg',
            'category_id' => 1
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'Fentanil',
            'form' => 'patch 12,5 mcg/jam',
            'restriction_formula' => '10 patch/bulan',
            'price' => 10500,
            'description' => 'patch:- Untuk nyeri kronik pada pasien kanker yang tidak terkendali. - Tidak untuk nyeri akut.',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'Fentanyl_12,5mcg-hour_patch.jpg',
            'category_id' => 1
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'Fentanil',
            'form' => 'patch 25 mcg/jam',
            'restriction_formula' => '10 patch/bulan',
            'price' => 11000,
            'description' => 'patch:- Untuk nyeri kronik pada pasien kanker yang tidak terkendali. - Tidak untuk nyeri akut.',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'fentanyl_patch_25mcg.jpg',
            'category_id' => 1
        ]);

        // ID CATEGORY 2
        DB::table('medicines')->insert([
            'generic_name' => 'Ibuprofen',
            'form' => 'tab 200 mg',
            'restriction_formula' => '30 tab/bulan',
            'price' => 9000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'ibuprofen_tab_200mg.jpg',
            'category_id' => 2
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'Ibuprofen',
            'form' => 'susp 100 mg/5 mL',
            'restriction_formula' => '1 btl/kasus',
            'price' => 15000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'ibuprofen_susp_100mg_5mL.png',
            'category_id' => 2
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'Asam Mefenamat',
            'form' => 'kaps 250 mg',
            'restriction_formula' => '30 kaps/bulan',
            'price' => 12000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'asam_mefenamat_kaps250mg.jpg',
            'category_id' => 2
        ]);

        // ID CATEGORY 3
        DB::table('medicines')->insert([
            'generic_name' => 'alopurinol',
            'form' => 'tab 100 mg',
            'restriction_formula' => '30 tab/bulan',
            'price' => 5000,
            'description' => 'Tidak diberikan pada saat nyeri akut',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'Allopurinol_Tablet_100_mg.jpg',
            'category_id' => 3
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'alopurinol',
            'form' => 'tab 300 mg',
            'restriction_formula' => '30 tab/bulan',
            'price' => 8000,
            'description' => 'Tidak diberikan pada saat nyeri akut',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'alopurinol_tab300mg.jpeg',
            'category_id' => 3
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'kolkisin',
            'form' => 'tab 500 mcg',
            'restriction_formula' => '30 tab/bulan',
            'price' => 21000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'kolkisin_tab500mcg.png',
            'category_id' => 3
        ]);

        // ID CATEGORY 4
        DB::table('medicines')->insert([
            'generic_name' => 'gabapentin',
            'form' => 'kaps 100 mg',
            'restriction_formula' => '60 kaps/bulan',
            'price' => 16000,
            'description' => 'Hanya untuk neuralgia pascaherpes atau nyeri neuropati diabetikum',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'gabapentin_kaps_100mg.jpg',
            'category_id' => 4
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'gabapentin',
            'form' => 'kaps 300 mg',
            'restriction_formula' => '30 kaps/bulan',
            'price' => 14000,
            'description' => 'Hanya untuk neuralgia pascaherpes atau nyeri neuropati diabetikum',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'gabapentin_kaps_300mg.jpg',
            'category_id' => 4
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'amitriptilin',
            'form' => 'tab 25 mg',
            'restriction_formula' => '30 kaps/bulan',
            'price' => 13000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'Amitriptyline-25mg.jpg',
            'category_id' => 4
        ]);

        // ID CATEGORY 5
        DB::table('medicines')->insert([
            'generic_name' => 'bupivakain',
            'form' => 'inj 0,5%',
            'restriction_formula' => ' ',
            'price' => 12000,
            'description' => ' ',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'bupivakin_inj0.5%.jpg',
            'category_id' => 5
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'bupivakain heavy',
            'form' => 'inj 0,5% + glukosa 8%',
            'restriction_formula' => ' ',
            'price' => 12500,
            'description' => 'Khusus untuk analgesia spinal',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'bupivakain heavy_inj 0,5% + glukosa 8%.jpg',
            'category_id' => 5
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'etil klorida',
            'form' => 'spray 100 mL',
            'restriction_formula' => ' ',
            'price' => 17000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'etil klorida_spray_100ml.jpg',
            'category_id' => 5
        ]);

        // ID CATEGORY 6
        DB::table('medicines')->insert([
            'generic_name' => 'deksmedetomidin',
            'form' => 'inj 100 mcg/mL',
            'restriction_formula' => ' ',
            'price' => 18000,
            'description' => 'Untuk sedasi pada pasien di ICU, kraniotomi, bedah jantung dan operasi yang memerlukan waktu pembedahan yang lama.',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'deksametason_inj5mg.jpg',
            'category_id' => 6
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'desfluran',
            'form' => 'ih',
            'restriction_formula' => ' ',
            'price' => 25000,
            'description' => ' ',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'desfluran_ih.jpg',
            'category_id' => 6
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'halotan',
            'form' => 'ih',
            'restriction_formula' => ' ',
            'price' => 20000,
            'description' => 'Tidak boleh digunakan berulang. Tidak untuk pasien dengan gangguan fungsi hati.',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'halothane-bp.jpg',
            'category_id' => 6
        ]);

        // ID CATEGORY 7
        DB::table('medicines')->insert([
            'generic_name' => 'atropin',
            'form' => 'inj 0,25 mg/mL (i.v./s.k.)',
            'restriction_formula' => ' ',
            'price' => 23000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'atropin_inj 0,25 mg.jpg',
            'category_id' => 7
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'midazolam',
            'form' => 'inj 1 mg/mL (i.v.)',
            'restriction_formula' => 'Dosis rumatan: 1 mg/jam (24 mg/hari). Dosis premedikasi: 8 vial/kasus.',
            'price' => 21000,
            'description' => 'Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'midazolam_inj 1 mg.jpg',
            'category_id' => 7
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'midazolam',
            'form' => 'inj 5 mg/mL (i.v.)',
            'restriction_formula' => 'Dosis rumatan: 1 mg/jam (24 mg/hari). Dosis premedikasi: 8 vial/kasus.',
            'price' => 26000,
            'description' => 'Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum. Dapat digunakan untuk sedasi pada pasien ICU dan HCU.',
            'faskes1' => false,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'midazolam_inj 5 mg.jpg',
            'category_id' => 7
        ]);

        // ID CATEGORY 8
        DB::table('medicines')->insert([
            'generic_name' => 'deksametason',
            'form' => 'inj 5 mg/mL',
            'restriction_formula' => '20 mg/hari',
            'price' => 29000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'deksametason_inj5mg.jpg',
            'category_id' => 8
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'difenhidramin',
            'form' => 'inj 10 mg/mL (i.v./i.m.)',
            'restriction_formula' => '30 mg/hari',
            'price' => 15500,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'difenhidramin_inj 10 mg.jpg',
            'category_id' => 8
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'epinefrin (adrenalin)',
            'form' => 'inj 1 mg/mL',
            'restriction_formula' => ' ',
            'price' => 17000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'epinefrin_inj 1 mg.jpg',
            'category_id' => 8
        ]);

        // ID CATEGORY 9
        DB::table('medicines')->insert([
            'generic_name' => 'diazepam',
            'form' => 'inj 5 mg/mL',
            'restriction_formula' => '10 amp/kasus, kecuali untuk kasus di ICU.',
            'price' => 18000,
            'description' => 'Tidak untuk i.m.',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'diazepam_inj5mg.jpg',
            'category_id' => 9
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'diazepam',
            'form' => 'enema 5 mg/2,5 mL',
            'restriction_formula' => '2 tube/hari, bila kejang.',
            'price' => 19000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'diazepam_enema 5.jpg',
            'category_id' => 9
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'diazepam',
            'form' => 'enema 10 mg/2,5 mL',
            'restriction_formula' => '2 tube/hari, bila kejang.',
            'price' => 15000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'diazepam_enema 10mg.jpg',
            'category_id' => 9
        ]);

        // ID CATEGORY 10
        DB::table('medicines')->insert([
            'generic_name' => 'albendazol',
            'form' => 'tab 400 mg',
            'restriction_formula' => ' ',
            'price' => 8000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'Albendazole_tab400mg.jpg',
            'category_id' => 10
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'albendazol',
            'form' => 'susp 200 mg/5 mL',
            'restriction_formula' => ' ',
            'price' => 14000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'albendazol_susp 200 mg.png',
            'category_id' => 10
        ]);
        DB::table('medicines')->insert([
            'generic_name' => 'mebendazol',
            'form' => 'tab 100 mg',
            'restriction_formula' => ' ',
            'price' => 9000,
            'description' => ' ',
            'faskes1' => true,
            'faskes2' => true,
            'faskes3' => true,
            'image' => 'Mebendazole-100mg.jpg',
            'category_id' => 10
        ]);
    }
}
