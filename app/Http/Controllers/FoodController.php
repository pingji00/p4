<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        return view('food.index');
    }

    public function calc(Request $request)
    {
        $foodsRawData = file_get_contents(database_path('/foods.json'));
        $foods = json_decode($foodsRawData, true);

        return view('food.calc')->with([
            'foods' => $foods,
            'quantity' => $request -> session() -> get('quantity', ''),
            'unit' => $request -> session() -> get('unit', ''),
            'inputFood' => $request -> session() -> get('inputFood', ''),
            'nutrFacts' => $request -> session() -> get('nutrFacts', [])
        ]);
    }

}
