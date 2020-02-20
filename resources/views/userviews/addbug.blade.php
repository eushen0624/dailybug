@extends('layouts.app')
@section('content')
<h1 class="text-center py-5">Report a Bug</h1>
<div class="col-lg-6 offset-lg-3">
<form action="/addbug" method="POST">
@csrf

<div class="form-group">
<label for="title">Bug Title:</label>
<input type="text" name="title" class="form-control">
</div>
<div class="form-group">
<label for="body">Bug Body:</label>
<input type="text" name="body" class="form-control">
</div>
<div class="form-group">
<label for="category_id">Category:</label>
<select name="category_id" class="form-control">
@foreach($categories as $indiv_category)
<option value="{{$indiv_category->id}}">
{{$indiv_category->name}}
</option>

@endforeach
</select>
</div>
<button class="btn btn-primary" type="submit">REPORT</button>
</form>
</div>
@endsection