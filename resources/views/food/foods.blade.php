@extends('layout.master')
@section('title')
    Calorie Calculator
@endsection
@push('morecss')
    <link href='/css/food/food-table.css' rel='stylesheet'>
@endpush


@section('content')

    <h2 class='form-title'>Here's common foods list</h2>
    <table class='food-table'>
        <caption> The number in this table is based on 100g food</caption>
        <tr>
            <th>Food</th>
            <th>Calories</th>
            <th>fat(g)</th>
            <th>carbohydrate(g)</th>
            <th>protein(g)</th>
            <th></th>
        </tr>
        @foreach($foods as $food)
        <tr>
            @include('food._food')

        </tr>
        @endforeach
    </table>


@endsection