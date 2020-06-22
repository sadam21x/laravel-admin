<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category_name = array(
            "Sayur", "Buah", "Padi-padian", "Kacang-kacangan"
        );

        foreach ($category_name as $category_name){
            DB::table('categories')->insert([
                'name' => $category_name
            ]);
        }
    }
}
