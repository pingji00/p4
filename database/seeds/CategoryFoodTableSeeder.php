<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Food;

class CategoryFoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods =[
            'Almond' => ["Nuts"],
            'Oats' => ["Grain"],
            'Milk_1%' => ["Dairy", "Beverage"],
            'Apple' => ["Fruit"],
            'Beef' => ["Meats"],
            'Broccoli'  => ["Vegetable"],
            'Beer' => ["Beverage", "Alcohol"],
            'Egg'  => ["Meats", "Egg"],
            'Salmon' => ["Fish", "Seafood"],
            'Pineapple' => ["Fruit", "Vegetable"]
        ];

        foreach ($foods as $name => $categories) {

            $food = Food::where('name', 'like', $name)->first();

            foreach ($categories as $category) {
                $cate = Category::where('name', 'LIKE', $category)->first();

                # Connect this category to this food
                $food->categories()->save($cate);
            }
        }
    }
}
