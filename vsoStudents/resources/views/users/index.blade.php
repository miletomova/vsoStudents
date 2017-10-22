@extends('layouts.master')

@section('title', 'Users')

@section('style')

<link rel="stylesheet" type="text/css" href="">

@endsection

@section('content')
<div class="container">
<div class="row">
	<div class="col-md-6">
		<h1>Users</h1>
	</div>	
</div>
@if(Session::has('success'))
<div class="alert alert-success">
	<strong>
		<i class="fa fa-check-circle fa-lg fa-fw"></i>Success. &nbsp;
	</strong>
	{{ Session::get('success') }}
</div>
@endif
<div class="row">
Времето сега е {{ $time }}
<table class="table">
	<tr>
		<td>
			User Name
		</td>
		<td>
			User Role
		</td>
		<td>
			Edit Student
		</td>
		<td>
			Delete Student
		</td>
	</tr>
	@foreach($users as $user)
	<tr>
		<td>
			<a href="{{ route('user_info', $user->id)}}">
				{{ $user->name }}				
			</a>			
		</td>
		<td>
			{{ $user->role }}
		</td>
		<td>
			<a href="{{ route('edit_user_info', $user->id) }}" class="btn btn-info">Edit</a>
		</td>
		<td>
			{{ Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) }}
    		{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
			{{ Form::close() }}
		</td>
	</tr>
@endforeach
</table>
<div class="row">
	<div class="col-md-6">
		<a href="{{ route('add_new_user') }}" class="btn btn-info">Add New User</a>
	</div>
</div>
</div>
</div>
@endsection