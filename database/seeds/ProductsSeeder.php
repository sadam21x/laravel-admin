<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // id kategori
        $category_id = array(
            1, // 1
            2, // 2
            1, // 3
            2, // 4
            1, // 5
            2, // 6
            1, // 7
            2, // 8
            1, // 9
            2, // 10
            1, // 11
            2, // 12
            2 // 12
        );

        $name = array(
            "Jack Purcell", // 1
            "One Star CC Slip", // 2
            "One Star Academy", // 3
            "One Star", // 4
            "ERX Impress", // 5
            "Louie Lopez Pro", // 6
            "Converse Courtlandt", // 7
            "Converse El Distrito", // 8
            "Converse Star Replay", // 9
            "Converse Star Replay", // 10
            "Converse Rival", // 11
            "Chuck 70", // 12
            "Chuck 70" // 12
        );

        $price = array(
            859000, // 1
            699000, // 2
            999000, // 3
            899000, // 4
            1599000, // 5
            999000, // 6
            659000, // 7
            559000, // 8
            659000, // 9
            559000, // 10
            699000, // 11
            799000, // 12
            799000 // 12
        );

        $stock = array(
            43, // 1
            30, // 2
            48, // 3
            50, // 4
            37, // 5
            22, // 6
            33, // 7
            23, // 8
            38, // 9
            20, // 10
            28, // 11
            49, // 12
            49 // 12
        );

        $explanation = array(
            /* 1 */ "Lorem ipsum dolor sit amet.",
            /* 2 */ "Lorem ipsum dolor sit amet.",
            /* 3 */ "Lorem ipsum dolor sit amet.",
            /* 4 */ "Lorem ipsum dolor sit amet.",
            /* 5 */ "Lorem ipsum dolor sit amet.",
            /* 6 */ "Lorem ipsum dolor sit amet.",
            /* 7 */ "Lorem ipsum dolor sit amet.",
            /* 9 */ "Lorem ipsum dolor sit amet.",
            /* 10 */ "Lorem ipsum dolor sit amet.",
            /* 11 */ "Lorem ipsum dolor sit amet.",
            /* 12 */ "Lorem ipsum dolor sit amet.",
            /* 12 */ "Lorem ipsum dolor sit amet."
        );

        $jumlah_data = 12;

        for ( $i = 0; $i < $jumlah_data; $i++ ){
            DB::table('products')->insert([
                'category_id' => $category_id[$i],
                'name' => $name[$i],
                'price' => $price[$i],
                'stock' => $stock[$i],
                'explanation' => $explanation[$i]
            ]);
        }

    }
}
