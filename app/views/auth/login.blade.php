@extends('layouts.master')

@section('content')


	<div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- h1>Angerity</h1>
            <p class="lead">Where here for you, we are here to your refuge !</p> -->
          </div>
         
        </div>
    </div><!-- /page-header -->
     

	<div class="row">
		<div class="col-md-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
		 <h2 align="center"> Management Panel </h2><hr/>
			<div class="panel panel-default">
				<div class="panel-heading">
					Authorized Login
					<!-- {{ Hash::make('12345') }} -->
				</div>
				<div class="panel-body">
					{{ Form::open(array('route' => 'auth.store')) }}

						<div class="form-group">
					   		<label for="">Username</label>
							{{ 
					   		Form::input('text', 'user_username', null, ['class' => 'form-control']) 
					   		}}				   		</div>
				   		<div class="form-group">
					   		<label for="">Password</label>
					   		{{ 
					   		Form::input('password', 'user_password', null, ['class' => 'form-control'])	 
					   		}}
				   		</div>

				   		{{ Form::submit('Login',array('class' => 'btn-block btn btn-primary')) }}

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	
	
@stop