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
                <input type="number" name="quantity" placeholder= {{ (!$inputFood) ? old('quantity_1') : "" }} > oz
            </label>
        </div>
        @if($errors->get('quantity'))
            <div class='error'>{{ $errors->first('quantity') }}</div>
        @endif
        <label>
            <select name='food' id='food'>
                {{--<option value='name'>food name</option>--}}
                @foreach($foods as $food)
                    <option value='{{ $food["name"] }}' {{($food["name"] == $inputFood ) ? 'selected' : '' }}> {{ $food["name"] }} </option>
                @endforeach
            </select>
        </label>

        <input type='submit' value='submit' class='btn'><br>
    </form>
    @if($quantity)
        <div id='result'>
            <p class='alert' role='alert'>{{ $quantity }} {{ $unit }} {{ $inputFood }} contains</p>
            <dl>
                <?php foreach ($nutrFacts as $nutr => $nutrAmout): ?>
                <dt><?= $nutr ?></dt>
                <dd><?= $nutrAmout ?></dd>
                <?php endforeach; ?>
            </dl>
        </div>
    @endif
@endsection