@extends('layout.master')
@section('title')
    Calorie Calculator
@endsection
@push('morecss')
    <link href='/css/food/calc-form.css' rel='stylesheet'>
@endpush


@section('content')

    <h2 class='form-title'>Pick the food you like, see the nutrition facts. </h2>
    <form class='calc-container' method='GET' action='/calc-process'>
        <div class='amount'>
            <label>
                <input type="number" name="quantity" placeholder= {{ (!$quantity) ? old('quantity') : "" }} > oz
            </label>
        </div>
        @if($errors->get('quantity'))
            <div class='error'>{{ $errors->first('quantity') }}</div>
        @endif
        {{--<label>--}}
            {{--<select name='food'>--}}
                {{--@foreach($foods as $food)--}}
                    {{--<option value='{{ $food["name"] }}' {{ ($food["name"] == old('food') ) ? 'selected' : '' }}> {{ $food["name"] }} </option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
        {{--</label>--}}
        <label for='food_id'></label>
        <select name='food_id'>
            <option value=''>Choose food</option>
            @foreach($foods as $food)
                <option value='{{ $food->id }}' {{ (old('food_id') == $food->id) ? 'selected' : '' }}>{{ $food->name }}</option>
            @endforeach
        </select>
        @if($errors->get('food_id'))
            <div class='error'>{{ $errors->first('food_id') }}</div>
        @endif


        <input type='submit' value='submit' class='btn'><br>
    </form>
    @if($quantity)
        <div id='result'>
            {{--<p class='des'>{{ $quantity }} oz {{ $inputFood }}  provides <span>{{ $foods->calorie }}calories</span>, it contains <span>{{ $unitFat }}g fat</span>, <span>{{ $foods->carb }}g carbohydrate</span> and <span>{{ $foods->protein }}g protein</span>. </p>--}}
            <p class='des'>{{ $food }}g fat</p>
        </div>
    @endif
@endsection