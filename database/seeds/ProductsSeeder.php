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
        // 1 = sayur, 2 = buah, 3 = padi-padian, 4 = kacang-kacangan
        $category_id = array(
            1, // 1
            1, // 2
            1, // 3
            1, // 4
            2, // 5
            2, // 6
            2, // 7
            2, // 8
            3, // 9
            3, // 10
            4, // 11
            4 // 12
        );

        $name = array(
            "Brokoli", // 1
            "Terong", // 2
            "Sawi Putih", // 3
            "Kubis", // 4
            "Anggur Hijau", // 5
            "Mangga Gadung", // 6
            "Strawberry", // 7
            "Salak Bali", // 8
            "Gandum", // 9
            "Ketan Putih", // 10
            "Kacang Merah", // 11
            "Kedelai" // 12
        );

        $price = array(
            30700, // 1
            14300, // 2
            11200, // 3
            8700, // 4
            41200, // 5
            21800, // 6
            24500, // 7
            30100, // 8
            42700, // 9
            29800, // 10
            34800, // 11
            37800 // 12
        );

        $stock = array(
            120, // 1
            240, // 2
            220, // 3
            520, // 4
            340, // 5
            375, // 6
            360, // 7
            200, // 8
            150, // 9
            140, // 10
            180, // 11
            410 // 12
        );

        $explanation = array(
            /* 1 */ "Brokoli adalah tanaman sayuran yang termasuk dalam suku kubis-kubisan atau Brassicaceae. Brokoli berasal dari daerah Laut Tengah dan sudah sejak masa Yunani Kuno dibudidayakan. Sayuran ini masuk ke Indonesia belum lama dan kini cukup populer sebagai bahan pangan.",
            /* 2 */ "Terung adalah tumbuhan penghasil buah yang dijadikan sayur-sayuran. Asalnya adalah India dan Sri Lanka. Terung atau terong masih berkerabat dekat dengan kentang dan leunca, namun agak jauh dari tomat. Terung ialah terna yang sering ditanam secara tahunan. Tanaman ini tumbuh hingga 40–150 cm tingginya.",
            /* 3 */ "Sawi putih dikenal sebagai sayuran olahan dalam masakan Tionghoa; karena itu disebut juga sawi cina. Sebutan lainnya adalah petsai. Disebut sawi putih karena daunnya yang cenderung kuning pucat dan tangkai daunnya putih. Sawi putih dapat dilihat penggunaannya pada asinan, dalam capcai, atau pada sup bening.",
            /* 4 */ "Kubis, kol, kobis, atau kobis bulat adalah tanaman dua tahunan hijau atau ungu berdaun, ditanam sebagai tanaman tahunan sayuran untuk kepala padat berdaunnya. Erat kaitannya dengan tanaman cole lainnya, seperti brokoli, kembang kol, dan kubis brussel, itu diturunkan dari B. oleracea var. oleracea, kubis lapangan liar. ",
            /* 5 */ "Anggur Hijau adalah salah satu jenis anggur yang mungkin belum banyak diketahui oleh masyarakat luas dibandingkan dengan anggur merah dan anggur hitam. Hal ini karena anggur Hijau membutuhkan tanah khusus untuk dapat tumbuh, jadi tanaman ini tidak bisa hidup di sembarangan tanah. Anggur Hijau memang tak semanis anggur merah dan anggur hitam. Rasa manis terkuat dipegang oleh anggur merah kemudian anggur Hitam sedangkan Anggur Hijau memiliki rasa manis dan sedikit asam.",
            /* 6 */ "Mangga gadung adalah salah satu jenis mangga yang memiliki rasa manis yang khas. Mangga gadung ini banyak diminati banyak orang karena rasanya yang manis tersebut dan buah yang tebal. Harga mangga gadung ini lumayan mahal bisa mencapai 5-7 ribu dalam satu kilonya.",
            /* 7 */ "Stroberi atau tepatnya stroberi kebun adalah sebuah varietas stroberi yang paling banyak dikenal di dunia. Seperti spesies lain dalam genus Fragaria, buah ini berada dalam keluarga Rosaceae.",
            /* 8 */ "Salak adalah sejenis palma dengan buah yang biasa dimakan. Ia dikenal juga sebagai sala. Dalam bahasa Inggris disebut salak atau snake fruit, sementara nama ilmiahnya adalah Salacca zalacca. Buah ini disebut snake fruit karena kulitnya mirip dengan sisik ular.",
            /* 9 */ "Gandum adalah sekelompok tanaman serealia dari suku padi-padian yang kaya akan karbohidrat. Gandum biasanya digunakan untuk memproduksi tepung terigu, pakan ternak, ataupun difermentasi untuk menghasilkan alkohol. Pada umumnya, biji gandum berbentuk opal dengan panjang 6–8 mm dan diameter 2–3 mm.",
            /* 10 */ "Ketan adalah sejenis biji-bijian serealia yang memiliki tekstur dan kandungan yang mirip dengan beras. Ketan sendiri cukup populer dengan nama beras ketan. Ketan didapatkan dari padi ketan yang tumbuh di daerah tropis seperti Asia Tenggara. Ketan memiliki bentuk seperti beras yaitu bulat lonjong dan berukuran sedikit lebih besar dibanding beras lokal.",
            /* 11 */ "Kacang jogo adalah sejenis kacang dari jenis Phaseolus vulgaris. Dalam bahasa Inggris, kacang ini dikenal dengan nama Red Kidney Bean. Dalam masakan Indonesia, kacang ini dicampurkan ke dalam rendang atau dimasak sebagai sup, yang disebut sup kacang merah. ",
            /* 12 */ "Kedelai, atau kacang kedelai, adalah salah satu tanaman jenis polong-polongan yang menjadi bahan dasar banyak makanan dari Asia Timur seperti kecap, tahu, dan tempe. Berdasarkan peninggalan arkeologi, tanaman ini telah dibudidayakan sejak 3500 tahun yang lalu di Asia Timur. "
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
