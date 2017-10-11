@extends('layouts.master')

@section('title', 'Users')

@section('style')

<link rel="stylesheet" type="text/css" href="">

@endsection

@section('content')
<h1>Users</h1>
<table border="1">
	<tr>
		<td>
			User Name
		</td>
		<td>
			User Role
		</td>
	</tr>
	@foreach($users as $user)
	<tr>
		<td>
			<a href="{{ route('user.show', $user->id)}}">
				{{ $user->name }}				
			</a>			
		</td>
		<td>
			{{ $user->role }}
		</td>
	</tr>
@endforeach
</table>
@endsection