@extends('layouts.master')

@section('title', 'User Profile')


@section('content')
<h1>{{ $user->name }}</h1>
<p>
	{{ $user->profile->bio }}
</p>
<p>
	pucture to be added soon ...
</p>
<!-- var 1 Using Eloquent -->
{{ var_dump($user->user_lecture_homework) }}
<!-- var2 -->
@foreach($user_homeworks as $homework)
{{ $homework->homework_path }}
@endforeach

@endsection

<!-- Many-to-many - courses/students
	- db tables - pivot table, pivot property
	- relations in models - belongsToMany do not confuse it with hasMany 
https://laravel.com/docs/5.4/eloquent-relationships#many-to-many
	-->