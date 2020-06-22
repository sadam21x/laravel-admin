<?php

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first_name = array(
            "Brian", // 1
            "Andhika", //2
            "Adilla", // 3
            "Shinta", // 4
            "Naufaldi", // 5
            "Rahmat", // 6
            "Bayu", // 7
            "Irene", // 8
            "Septian", // 9
            "Putu Agus" // 10
        );

        $last_name = array(
            "Juned Septory", // 1
            "Satya Wiguna", // 2
            "Syafira Putri", // 3
            "Sofie Andalis", // 4
            "Rafif Satriya", // 5
            "Sandhya Bakti", // 6
            "Satria Mukti", // 7
            "Aprilia Putri", // 8
            "Pratiwi", // 9
            "Adhi Prayoga" // 10
        );

        $phone = array(
            "082145922123", // 1
            "08563920129", // 2
            "081336521343", // 3
            "085739084266", // 4
            "081921098223", // 5
            "087762234001", // 6
            "081239098776", // 7
            "085721889012", // 8
            "082145024176", // 9
            "083117214568" // 10
        );

        $email = array(
            "brian011@gmail.com", // 1
            "d_andhika_1@gmail.com", // 2
            "adilla_sp@outlook.com", // 3
            "shinta_sofie@outlook.com", // 4
            "naufaldi_rafif78@outlook.com", // 5
            "rahmat_bakti@gmail.com", // 6
            "bayu_sm@gmail.com", // 7
            "irene_atpy@gmail.com", // 8
            "saptian_pratiwi@outlook.com", // 9
            "agus_prayoga@outlook.com" // 10
        );

        $street = array(
            "Jl. Cokro Aminoto No. 07", // 1
            "Jl. Pattimura No. 103", // 2
            "Jl. W.R Supratman No. 72", // 3
            "Jl. Diponegoro No. 12", // 4
            "Jl. Sudirman No. 108", // 5
            "Jl. Ahmad Yani No. 102", // 6
            "Jl. Ahmad Yani No. 102", // 7
            "Jl. Pemuda No. 117", // 8
            "Jl. Pramuka No. 19", // 9
            "Jl. D.I. Pandjaitan No. 109" // 10
        );

        $city = array(
            "KABUPATEN BULELENG", // 1
            "KOTA SURABAYA", // 2
            "KOTA SEMARANG", // 3
            "KABUPATEN BULELENG", // 4
            "KOTA SURABAYA", // 5
            "KOTA SEMARANG", // 6
            "KABUPATEN BULELENG", // 7
            "KOTA SURABAYA", // 8
            "KOTA SEMARANG", // 9
            "KABUPATEN BULELENG" // 10
        );

        $state = array(
            "BALI", // 1
            "JAWA TIMUR", // 2
            "JAWA TENGAH", // 3
            "BALI", // 4
            "JAWA TIMUR", // 5
            "JAWA TENGAH", // 6
            "BALI", // 7
            "JAWA TIMUR", // 8
            "JAWA TENGAH", // 9
            "BALI" // 10
        );

        $zip_code = array(
            "81154", // 1
            "60115", // 2
            "42015", // 3
            "81154", // 4
            "60115", // 5
            "42015", // 6
            "81154", // 7
            "60115", // 8
            "42015", // 9
            "81154" // 10
        );

        $jumlah_data = 10;

        for ( $i = 0; $i < $jumlah_data; $i++ ){
            DB::table('customers')->insert([
                'first_name' => $first_name[$i],
                'last_name' => $last_name[$i],
                'phone' => $phone[$i],
                'email' => $email[$i],
                'street' => $street[$i],
                'city' => $city[$i],
                'state' => $state[$i],
                'zip_code' => $zip_code[$i]
            ]);
        }
    }
}
