@extends('layouts.master')

@section('title', 'User Profile')


@section('content')

<h1>{{ $user->name }}</h1>
<p>
	{{ $user_profile->photo_path }}
	<img src="{{asset('temp')}}/{{ $user_profile->photo_path }}" alt="{{ $user_profile->photo_path }}">
</p>
<p>
	{{ $user->profile->bio }}
</p>


@endsection

<!-- Many-to-many - courses/students
	- db tables - pivot table, pivot property
	- relations in models - belongsToMany do not confuse it with hasMany 
https://laravel.com/docs/5.4/eloquent-relationships#many-to-many
	-->