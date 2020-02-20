@extends('layouts.app')
@section('content')

<h1 class="text-center py-5">ALL BUGS</h1>

<div class="container">
<div class="row">
@foreach($bugs as $indiv_bug)
<div class="col-lg-4 my-2">
<div class="card">
<div class="card-body">
<h4 class="card-title">{{$indiv_bug->title}}</h4>
<p class="card-text">{{$indiv_bug->body}}</p>
<p class="card-text">{{$indiv_bug->category->name}}</p>
<p class="card-text">{{$indiv_bug->status->name}}</p>
<p class="card-text">{{$indiv_bug->user->name}}</p>
</div>
<div class="card-footer">
	<a href="/indivbug/{{$indiv_bug->id}}" class="btn btn-primary">
		Show Details
	</a>
</div>
@auth
@if(Auth::user()->role_id==1)
<div class="card-footer">
<a href="/solve/{{$indiv_bug->id}}" class="btn btn-primary">Solve</a>
</div>
@endif
@endauth
</div>
</div>
@endforeach
</div>
</div>

@endsection