@extends('layout.master')
@section('title')
    Confirm deletion: {{ $food->name }}
@endsection
@push('morecss')
    <link href='/css/food/delete.css' rel='stylesheet'>
@endpush


@section('content')

    <h2>Are you really DON'T like <strong>{{ $food->name }}</strong>?</h2>

    <form method='POST' action='/foods/{{ $food->id }}' class='delete-food'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, throw it out!' class='btn btn-danger btn-small'>
    </form>

    <p class='cancel'>
        <a href='/foods/{{ $food->id }}'>Maybe later</a>
    </p>

@endsection