@extends('layouts.master')

@section('title', 'Courses')

@section('content')
<h1>Courses</h1>

@foreach($courses as $course)
	{{ $course->name }}
	<ol>course lectures

	@foreach($course->lectures as $lecture)
		<li>{{ $lecture->name }}</li>
	@endforeach
	</ol>
@endforeach

@endsection
