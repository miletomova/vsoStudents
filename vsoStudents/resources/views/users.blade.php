@extends('layouts.master')

@section('title', 'Home')

@section('style')

<link rel="stylesheet" type="text/css" href="">

@endsection

@section('content')
<h1>Test</h1>
<ul>
@foreach($users as $user)
{{ $user->email }}
{{ var_dump($user->profile->bio) }}
@endforeach
</ul>
@endsection