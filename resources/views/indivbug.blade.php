@extends('layouts.app')
@section('content')
	<h1 class="text-center py-5">
		Bug Details
	</h1>

	<div class="col-lg-6 offset-lg-3">
		<div class="bg-dark p-2">
			<h1 class="text-light">
				{{$bug->title}}
			</h1>
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
				Requested By: {{$bug->user->name}}
			</h6>
			@auth
				@if(Auth::user()->id== $bug->user_id)
					<form action="/accept/{{$bug->id}}" method="POST">
						@csrf
						@method('PATCH')
						<button class="btn btn-warning" type="submit" {{count($solutions)==0 || $bug->status_id ==4 ? "disabled": ""}}>
							Accept
						</button>
					</form>
				@endif
			@endauth
		</div>
		<hr>

		<h1 class="text-center">
			Solutions: 
		</h1>
		@foreach($solutions as $indiv_solution)
		<div class="border py-2">
			<h3>
				{{$indiv_solution->title}}
			</h3>
			<p>
				{{$indiv_solution->body}}
			</p>
			<p>
				Status: {{$indiv_solution->status_id}}
			</p>
			@auth
			@if(Auth::user()->role_id==1)
			
			<form action="/deletesolution/{{$indiv_solution->id}}" method="POST">
				@csrf
				@method('DELETE')					
					<button class="btn btn-danger" type="submit">Delete</button>
			</form>
			@endif
			@endauth
		</div>
		@endforeach
	</div>
@endsection