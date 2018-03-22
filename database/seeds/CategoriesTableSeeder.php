<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "Cash";
        $category->save();

        $category = new Category();
        $category->name = "Material";
        $category->save();

        $category = new Category();
        $category->name = "Services";
        $category->save();
    }
}
