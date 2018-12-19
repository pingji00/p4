@extends('layout.master')
@section('title')
    Calorie Calculator
@endsection
@push('morecss')
    <link href='/css/food/detail.css' rel='stylesheet'>
@endpush


@section('content')

    <h2 class='form-title'>{{ $foods->name }}</h2>
    <div class='cat-container'>
        @foreach( $foods->categories as $category)
            <div class='category'>{{$category->name}}</div>
        @endforeach
    </div>
    <p class='des'>100g <strong>{{ $foods->name }}</strong> provides <span>{{ $foods->calorie }}calories</span>, it contains <span>{{ $foods->fat }}g fat</span>, <span>{{ $foods->carb }}g carbohydrate</span> and <span>{{ $foods->protein }}g protein</span>. </p>

    <a href='/foods/{{$foods->id}}/edit' class='opration'>Found wrong data? Update it.</a>
    <a href='/foods/{{$foods->id}}/delete' class='opration'>Don't like this food? Delete it</a>

@endsection