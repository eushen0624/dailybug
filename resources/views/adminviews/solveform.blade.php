@extends('layouts.app')
@section('content')
	
	<h1 class="text-center py-5">
		Bug Fix: {{$bug->title}}
	</h1>
	<div class="row">
		<div class="col-lg-4 offset-lg-1 bg-dark">
			
			<p class="text-light">
				{{$bug->body}}
			</p>
			<h6 class="text-light">
				Category: {{$bug->category->name}}
			</h6>
			<h6 class="text-light">
				Status: {{$bug->status->name}}
			</h6>

			<h6 class="text-light">
				Requester By: {{$bug->user->name}}
			</h6>
		</div>
	
		<div class="col-lg-4 offset-lg-1">
			<h1 class="text-center">Solution: </h1>
			<form action="/solve" method="POST">
				@csrf
				<div class="form-group">
					<label for="title">
						Title:
					</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
					<label for="title">
						Body:
					</label>
					<input type="text" name="body" class="form-control">
				</div>
				<input type="hidden" name="bug_id" value="{{$bug->id}}">
				<button class="btn btn-warning {{$bug->status_id==4 ? "disabled" : ""}}" >Solve</button>
			</form>
		</div>
	</div>
@endsection