<td><a href="/foods/{{ $food->id }}">{{$food->name}}</a>
{{--@if ( Carbon\Carbon::now() - $food->created_at < 50 )--}}
{{--<div class='new'>new</div>--}}
{{--@endif--}}
</td>
<td>{{$food->calorie}}</td>
<td>{{$food->fat}}</td>
<td>{{$food->carb}}</td>
<td>{{$food->protein}}</td>