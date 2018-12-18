@extends('layout.master')
@section('title')
    Calorie Calculator
@endsection
@push('morecss')
    <link href='/css/calc/calc-form.css' rel='stylesheet'>
@endpush


@section('content')
    <h2 class='form-title'>Now do the math</h2>
    <form class='calc-container' method='GET' action='/calc-process'>
        <div class='amount'>
        <label>Qty:<input type="number"
                          name="quantity"
                          placeholder= {{ (!$inputFood) ? old('quantity') : "Amount?" }} ></label>
        <label><input type='radio' name="unit" id="lb" value="lb" {{ ($unit == "lb" ? 'checked' : '') }}> lb</label>
        <label><input type="radio" name="unit" id='kg' value="kg" {{ ($unit == "kg" ? 'checked' : '') }}> kg</label>
        </div>
        @if($errors->get('quantity'))
            <div class='error'>{{ $errors->first('quantity') }}</div>
        @endif
        @if($errors->get('unit'))
            <div class='error'>{{ $errors->first('unit') }}</div>
        @endif
        <label>Food name:
            <select name='food' id='food'>
                {{--<option value='name'>food name</option>--}}
                @foreach($foods as $food)
                    <option value='{{ $food["name"] }}' {{($food["name"] == $inputFood ) ? 'selected' : '' }}> {{ $food["name"] }} </option>
                @endforeach
            </select>
        </label>
        <input type='submit' value='submit'><br>

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