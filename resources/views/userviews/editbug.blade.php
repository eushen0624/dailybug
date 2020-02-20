@extends('layouts.app')
@section('content')

<h1 class="text-center py-5">Edit</h1>
<div class="col-lg-6 offset-lg-3">
<form action="/editbug/{{$bug->id}}" method="POST">
@csrf
@method('PATCH')
<div class="form-group">
<label for="title">Bug Title:</label>
<input type="text" name="title" class="form-control" value="{{$bug->title}}">
</div>
<div class="form-group">
<label for="body">Bug Body:</label>
<input type="text" name="body" class="form-control" value="{{$bug->body}}">
</div>
<div class="form-group">
<label for="category_id">Category:</label>
<select name="category_id" class="form-control">
@foreach($categories as $indiv_category)
<option value="{{$indiv_category->id}}"
{{$bug->category_id == $indiv_category->id ? "selected" : ""}}
>{{$indiv_category->name}}</option>
@endforeach
</select>
</div>
<button class="btn btn-primary" type="submit">Edit</button>
</form>
</div>

@endsection
