<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Vegetable", "Beans", "Fruit", "Grain", "Meats", "Dairy", "Poultry", "Fish", "Milk", "Legumes", "Beverage", "Alcohol", "Seafood", "Egg"];


        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->name = $categoryName;
            $category->save();
        }
    }
}
