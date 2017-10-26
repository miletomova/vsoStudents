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
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
					    @foreach ($errors->all() as $error)
					    <li>{{ $error }}</li>
					     @endforeach       
					    </ul>
					</div>
				@endif
				<div class="panel-body">	
					{!! Form::open(['route' => 'store_new_user', 'files' => true]) !!}
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<div class="row">
										{!! Form::label('name', 'Name', ['class'=>"col-md-2 control-label"] ) !!}				
										@if($errors->has('name'))
											{{ $errors->first('name') }}
										@endif
										<div class="col-md-10">
											{!! Form::text('name', old('name'), ['class'=>'form-control', 'id'=>'name'])!!}
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										{!! Form::label('email', 'Email', ['class'=>"col-md-2 control-label"] ) !!}	
										<div class="col-md-10">
											{!! Form::text('email', old('email'), ['class'=>'form-control', 'id'=>'email'])!!}
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										{!! Form::label('password', 'Password', ['class'=>"col-md-2 control-label"] ) !!}	
										<div class="col-md-10">										
											{!! Form::password('password', old('password'), ['class'=>'form-control', 'id'=>'password'])!!}
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										{!! Form::label('bio', 'Bio', ['class'=>"col-md-2 control-label"] ) !!}	
										<div class="col-md-10">
											{!! Form::textarea('bio', old('bio'), ['size' => '95x5'])!!}
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										{!! Form::label('my_photo', 'Add photo', ['class'=>"col-md-2 control-label"] ) !!}	
										<div class="col-md-10">
											{!! Form::file('my_photo', array('class'=>'file', 'id'=>'my_photo', 'id'=>"my_photo")) !!}	
										</div>
									</div>
								</div>
								<div class="col-md-8">									
									<div class="col-md-10 col-md-offset-2">
										{!! Form::submit('Save Student Info', ['class'=>'btn btn-info'])!!}
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

