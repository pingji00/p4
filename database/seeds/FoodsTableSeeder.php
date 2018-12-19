<?php

use Illuminate\Database\Seeder;
use App\Food;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
    // order => name, Energy-per-100g(Calories), fat(g), carbohydrate(g), protein(g)
        $foods = [
            ["Almond", 576, 49, 22, 21],
            ["Oats", 362, 7, 71, 15],
            ["Milk_1%", 42, 1, 5, 3.4],
            ["Apple", 52, 14, 0.2, 0.3],
            ["Beef", 250, 15, 0, 26],
            ["Broccoli", 34, 0.4, 7, 2.8],
            ["Beer", 43, 0, 3.6, 0.5],
            ["Egg", 154, 10, 1.2, 12],
            ["Salmon", 208, 13, 0, 20],
            ["Pineapple", 208, 13, 0, 20],
        ];

        $count = count($foods);

        foreach ($foods as $key => $onefood) {
            $food = new Food();
            $food->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $food->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $food->name = $onefood[0];
            $food->calorie = $onefood[1];
            $food->fat = $onefood[2];
            $food->carb = $onefood[3];
            $food->protein = $onefood[4];
            $food->save();
            $count--;
        }
    }
}
