<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Category;

class FoodController extends Controller
{
    public function index()
    {
        return view('food.index');
    }

    //show all the foods

    public function show()
    {
        $foods = Food::orderBy('name')->get();
        return view('food.foods')->with(
            ['foods' => $foods]
        );
    }

    //get /foods/{id}
    public function detail(Request $request, $id)
    {
        $food = Food::find($id);
        return view('food.detail')->with([
            'foods' => $food
        ]);
    }

    // add your own food

    public function add(Request $request)
    {
        $categories = Category::getForCheckboxes();
        return view('food.add')->with([

            'foodName' => $request -> session() -> get('foodName', ''),
            'foodCalorie' => $request -> session() -> get('foodCalorie', ''),
            'foodFat' => $request -> session() -> get('foodFat', ''),
            'foodCarb' => $request -> session() -> get('foodCarb', ''),
            'foodProtein' => $request -> session() -> get('foodProtein', ''),

            'categories' => $categories
        ]);

    }

    // add your own food saved
    public function store(Request $request)
    {
        $request->validate([
            'foodName' => 'required',
            'foodCalorie' => 'required|numeric|min:0|max:1000',
            'foodFat' => 'required|numeric|min:0|max:100',
            'foodCarb' => 'required|numeric|min:0|max:100',
            'foodProtein' => 'required|numeric|min:0|max:100'
        ]);

        $food = new Food();
        $food->name = $request->foodName;
        $food->calorie = $request->foodCalorie;
        $food->fat = $request->foodFat;
        $food->carb = $request->foodCarb;
        $food->protein = $request->foodProtein;

        $food->save();

        $food->categories()->sync($request->categories);
//
        return redirect('/foods')->with([
            'alert' => 'Your food is added.'
        ]);

    }


    // edit the food data

    public function edit($id)
    {
        $food = Food::find($id);

        $name = $food->name;

        $calorie = $food->calorie;

        $fat = $food->fat;

        $carb = $food->carb;

        $protein = $food->protein;

        $categories = Category::getForCheckboxes();
//
        $categoriesForThisFood = $food->categories()->pluck('categories.id')->toArray();
//
//        if (!$food) {
//            return redirect('/foods')->with([
//                'alert' => 'Food not found.'
//            ]);
//        }
        return view('food.edit')->with([
            'food' => $food,
            'name' => $name,
            'foodCalorie' => $calorie,
            'foodFat' => $fat,
            'foodCarb' => $carb,
            'categories' => $categories,
            'categoriesForThisFood' => $categoriesForThisFood
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'foodCalorie' => 'required|numeric|min:0|max:1000',
            'foodFat' => 'required|numeric|min:0|max:100',
            'foodCarb' => 'required|numeric|min:0|max:100',
            'foodProtein' => 'required|numeric|min:0|max:100',
        ]);

        $food = Food::find($id);

        $food->categories()->sync($request->categoreis);

        $food->calorie = $request->foodCalorie;
        $food->fat = $request->foodFat;
        $food->carb = $request->foodCarb;
        $food->protein = $request->foodProtein;
        $food->save();

        return redirect('/foods/' . $id . '/edit')->with([
            'alert' => 'Your changes were saved.'
        ]);
    }

    //Delete
    public function delete($id)
    {
        $food = Food::find($id);

        if (!$food) {
            return redirect('/foods')->with('alert', 'There\'s no such food');
        }

        return view('food.delete')->with([
            'food' => $food,
        ]);
    }

    public function destroy($id)
    {
        $food = Food::find($id);

        $food->categories()->detach();

        $food->delete();

        return redirect('/foods')->with([
            'alert' => '“' . $food->name . '” was disappeared.'
        ]);
    }



    public function calc(Request $request)
    {
        $foods = Food::orderBy('name')->get();
        return view('food.calc')->with([
            'foods' => $foods,
            'quantity' => $request -> session() -> get('quantity', ''),
            'inputFood' => $request -> session() -> get('inputFood', ''),
            'nutrFacts' => $request -> session() -> get('nutrFacts', [])
        ]);
    }


    public function calcProcess(Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|gt:0|max:10',
            'unit' => 'required',
        ]);

        $foods = Food::orderBy('name')->get();


        $quantity = $request->input('quantity', null);
        $inputFood = $request->input('food', null);

        //set up coefficient based on 100g : 1 oz
        $coefficient = 100 / 28;

        $nutrFacts = [];

        # Save nutrition facts to selected food
        foreach ($foods as $food) {
            if ($inputFood === $food['name']) {


                foreach ($food['nutrition-per-100g'] as $nutr => $nutrAmt) {
                    $nutrFacts[$nutr] = round($nutrAmt * $coefficient * $quantity);

                    if ($nutr == "energy") {
                        $nutrFacts[$nutr] .= " calorie";
                    } else {
                        $nutrFacts[$nutr] .= " g";
                    }
                }
            }
        }

//        return $nutrFacts;

        return redirect('/calc')->with([
            'quantity' => $quantity,
            'unit' => $unit,
            'inputFood' => $inputFood,
            'nutrFacts' => $nutrFacts
        ]);
    }

}
