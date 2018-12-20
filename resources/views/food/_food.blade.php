<td><a href="/foods/{{ $food->id }}">{{$food->name}}</a>
@if ( strtotime(Carbon\Carbon::now()) - strtotime($food->created_at) < 600 )
<div class='new'>new</div>
@endif
</td>
<td>{{$food->calorie}}</td>
<td>{{$food->fat}}</td>
<td>{{$food->carb}}</td>
<td>{{$food->protein}}</td>