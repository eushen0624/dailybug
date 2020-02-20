@extends('layouts.app')
@section('content')

<h1 class="text-center py-5">MY BUGS</h1>

<div class="container">
<div class="row">
@foreach($bugs as $indiv_bug)
<div class="col-lg-4 my-2">
<div class="card">
<div class="card-body">
<h4 class="card-title">{{$indiv_bug->title}}</h4>
<p class="card-text">{{$indiv_bug->body}}</p>
<p class="card-text">{{$indiv_bug->category_id}}</p>
<p class="card-text">{{$indiv_bug->status_id}}</p>
<p class="card-text">{{$indiv_bug->user_id}}</p>
</div>
<div class="card-footer">
<form action="/deletebug/{{$indiv_bug->id}}" method="POST">
@csrf
@method('DELETE')
<button class="btn btn-danger" type="submit">Delete</button>
</form>
<a href="/editbug/{{$indiv_bug->id}}" class="btn btn-success">Edit</a>
<a href="/indivbug/{{$indiv_bug->id}}" class="btn btn-success">View Details</a>
</div>
</div>
</div>
@endforeach
</div>
</div>

@endsection