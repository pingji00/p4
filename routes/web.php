<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','FoodController@index');
Route::get('/calc','FoodController@calc');
Route::get('/calc-process','FoodController@calcProcess');

//SHOW
//Route::get('/foods', 'FoodController@show');

//ADD
Route::get('/foods/create', 'FoodController@add');
Route::post('/foods', 'FoodController@store');

//SHOW
Route::get('/foods/{id}', 'FoodController@detail');
Route::get('/foods', 'FoodController@show');

//EDIT
Route::get('/foods/{id}/edit', 'FoodController@edit');
Route::put('/foods/{id}', 'FoodController@update');

# DELETE
Route::get('/foods/{id}/delete', 'FoodController@delete');
Route::delete('/foods/{id}', 'FoodController@destroy');






Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);

});