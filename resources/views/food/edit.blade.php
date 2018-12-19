@extends('layout.master')
@section('title')
    Calorie Calculator
@endsection
@push('morecss')
    <link href='/css/food/food-table.css' rel='stylesheet'>
@endpush


@section('content')

    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

    <h2 class='form-title'>Edit {{ $food->name  }}'s data</h2>
    <form method='POST' action='/foods/{{ $food->id }}' >
    <table class='food-table'>
        <caption> Notice, the data you input should be based on 100g food</caption>
        {{ method_field('put') }}
        {{ csrf_field() }}
        <tr>
            <th>{{ $food->name  }}</th>
        </tr>
        <tr>
            <td>
                <label for='foodCalorie'>Energy (per 100g)</label>
                <input type='text' name='foodCalorie' id='foodCalorie' value='{{ old('foodCalorie', $food->calorie) }}'> calorie
                @if($errors->get('foodCalorie'))
                    <div class='error'>{{ $errors->first('foodCalorie') }}</div>
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <label for='foodFat'>Fat(per 100g)</label>
                <input type='text' name='foodFat' id='foodFat' value='{{ old('foodFat', $food->fat) }}'> g
                @if($errors->get('foodFat'))
                    <div class='error'>{{ $errors->first('foodFat') }}</div>
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <label for='foodCarb'>Carbohydrate(per 100g)</label>
                <input type='text' name='foodCarb' id='foodCarb' value='{{ old('foodCarb', $food->carb) }}'> g
                @if($errors->get('foodCarb'))
                    <div class='error'>{{ $errors->first('foodCarb') }}</div>
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <label for='foodProtein'>Protein(per 100g)</label>
                <input type='text' name='foodProtein' id='foodProtein' value='{{ old('foodProtein', $food->protein) }}'> g
                @if($errors->get('foodProtein'))
                    <div class='error'>{{ $errors->first('foodProtein') }}</div>
                @endif
            </td>
        </tr>
        <tr>
            <td>
                <label for='categories'>Categories</label>
                <ul class='food-checkboxes'>
                    @foreach($categories as $categoryId => $categoryName)
                        <li>
                            <label>
                                <input {{ (in_array($categoryId, $categoriesForThisFood)) ? 'checked' : '' }}
                                          type='checkbox'
                                          name='categories[]'
                                          value='{{ $categoryId }}'> {{ $categoryName }}
                            </label>
                        </li>
                    @endforeach
                </ul>
            </td>
        </tr>

        <tr>
            <td>
                <input type='submit' value='Update' class='btn'>
            </td>
        </tr>
    </table>
    </form>

@endsection