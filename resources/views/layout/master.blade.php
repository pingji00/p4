<!DOCTYPE html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    {{-- Globe CSS goes here --}}
    <link href='/css/app.css' rel='stylesheet'>
    <link href='/css/food/main.css' rel='stylesheet'>
    {{-- Specific CSS goes here --}}
    @stack('morecss')
</head>
<body>

<header>
    <h1 class='name'><a href='/'>Calorie Calculator</a></h1>
    <p class='des'>This food Calorie Calculator below allows you to choose from dozens of foods, and see nutrition facts such as calories, fat, protein, etc.</p>
    @include('modules.nav')
</header>

<section>
    @yield('content')
</section>

<footer>
    &copy;{{ date('y') }}
</footer>

{{-- JS global to every page can be loaded here; jQuery included just as an example --}}
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>

{{-- JS specific to a given page/child view can be included via a stack --}}
@stack('body')

</body>
</html>