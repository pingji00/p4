@extends('layout.master')

@section('title')
    Add a food
@endsection

@push('morecss')
    <link href='/css/food/add.css' rel='stylesheet'>
@endpush

@section('content')
    @if(count($errors) > 0 )
    <div class='alert-top'>
        Please correct the error below.
    </div>
    @endif

    <h2 class='form-title'>Add your own food</h2>

    <form method='POST' action='/foods'>
        <table class='food-table'>
            {{ csrf_field() }}
            <caption> The number in this table is based on 100g food</caption>
            <tr>
                <td>
                    <label for='foodName'>Food Name</label>
                    <input type='text' name='foodName' id='foodName' value='{{ old('foodName') }}'>
                    @if($errors->get('foodName'))
                        <div class='error'>{{ $errors->first('foodName') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <label for='foodCalorie'>Energy (per 100g)</label>
                    <input type='text' name='foodCalorie' id='foodCalorie' value='{{ old('foodCalorie') }}'> calorie
                    @if($errors->get('foodCalorie'))
                        <div class='error'>{{ $errors->first('foodCalorie') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <label for='foodFat'>Fat(per 100g)</label>
                    <input type='text' name='foodFat' id='foodFat' value='{{ old('foodFat') }}'> g
                    @if($errors->get('foodFat'))
                        <div class='error'>{{ $errors->first('foodFat') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <label for='foodCarb'>Carbohydrate(per 100g)</label>
                    <input type='text' name='foodCarb' id='foodCarb' value='{{ old('foodCarb') }}'> g
                    @if($errors->get('foodCarb'))
                        <div class='error'>{{ $errors->first('foodCarb') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <label for='foodProtein'>Protein(per 100g)</label>
                    <input type='text' name='foodProtein' id='foodProtein' value='{{ old('foodProtein') }}'> g
                    @if($errors->get('foodProtein'))
                        <div class='error'>{{ $errors->first('foodProtein') }}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <label>Categories</label>
                    <ul class='food-checkboxes'>
                        @foreach($categories as $categoryId => $categoryName)
                            <li>
                                <label>
                                    <input
                                            {{ (in_array($categoryId, old('tags', []) )) ? 'checked' : '' }}
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
                    <input type='submit' value='add' class='btn'>
                </td>
            </tr>
        </table>
    </form>

@endsection