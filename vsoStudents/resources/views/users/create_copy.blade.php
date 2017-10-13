@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row page-title-row">
		<div class="col-md-12">
			<h3>
				User <small>&raquo; Add New Student</small>
			</h3>

		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Student Form
					</h3>
				</div>
				<div class="panel-body">					
					<form action="{{ route('user.store')}}" role="form" method="POST" class="form-horizontal">
					{!! Form::open( 'method'=>'POST', 'action' => 'AdminUsersController@store',['class'=>'form-horizontal'] ) !!}
						
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									{!! Form::label('name', 'User name')!!}
									<div class="col-md-10">
										{!!  Form::text('name', old('name'), ['id'=>'class']) !!}
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-md-2 control-label">
										Email
									</label>
									<div class="col-md-10">
										<input type="text" name="email"  class="form-control" id="email" value="{{ old('email') }}">
									</div>
								</div>
								<div class="form-group">
									<label for=password" class="col-md-2 control-label">
										Password
									</label>
									<div class="col-md-10">
										<input type="password" name="password"  class="form-control" id="email" value="">
									</div>
								</div>
								<div class="form-group">
									<label for="bio" class="col-md-2 control-label">
										Bio
									</label>
									<div class="col-md-10">
										<textarea name="bio" id="bio" value="{{ old('bio') }}"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="photo_path" class="col-md-2 control-label">
										Photo
									</label>
									<div class="col-md-10">
										<input type="text" name="photo_path"  class="form-control" id="photo_path" value="{{ old('photo_path') }}">
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<div class="col-md-10 col-md-offset-2">
											{!! Form::submit('Save!', ['class'=>'btn btn-info']) !!}
										</div>
									</div>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

