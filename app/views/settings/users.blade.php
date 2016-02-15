@extends('layouts.master')

@section('content')

   <!-- <div class="clearfix"></div> -->
   <h1>System Users </h1><hr/>
  
	   	<div class="pull-right">
				<ul class="breadcrumb">
		    <li><a href="/">Home</a></li>
		    <li>Settings</li>
		    <li class="active">System Users</li>
		 </ul>
		</div>
   	
	
	<div class="row">
	    <div class="col-md-3">
	   	<h5 style="text-transform: uppercase;" class="text-muted">Quick Links</h5>
	      <div class="list-group">
	        <a href="#modal-new-user" data-toggle="modal" class="list-group-item ">
	        	Add new user
	        </a>
	        
	        <a href="/settings/users/my-account" class="list-group-item">Go to my account</a>
	      </div>
	    </div>
	    <div class="col-md-9">

	    	<table class="table table-hover">
	    		<thead>
	    			<tr>
	    				<th>User Username</th>
	    				<th>User Role</th>
	    				<th>Last Login</th>
	    				<th>Action</th>
	    				
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@foreach ($users as $user) 
		    			<tr>
		    				<td> {{ $user->user_username }} </td>
		    				<td>{{ $user->user_role }} </td>
		    				<td>{{ $user->updated_at }} </td>
		    				<td>change password | remove </td>
		    			</tr>
		    		@endforeach
	    		</tbody>
	    	</table>
	     	
	    </div><!-- /col-md-9 --> 
  </div><!-- /row -->
  <div id="modal-new-user" class="modal fade">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">New System User</h4>
            </div>
            <div class="modal-body">
             	{{ Form::open(array('route' => 'users.store')) }}
             		<div class="form-group">
		              <label>User Role</label>
		              {{ Form::select('user_role', ['admin' => 'Administrator','cashier' => 'Cashier'],null,array('class' => 'form-control')) }}
		            </div>
             		<div class="form-group">
		              <label>User Username</label>
		              {{ Form::text('user_username' ,null, array('class' => 'form-control')) }}
		            </div>
		            <div class="form-group">
		              <label>User Password</label>
		              {{ Form::text('user_password_md5' ,null, array('class' => 'form-control')) }}
		            </div>
		            <div class="form-group">
		              <label>User Repeat Password</label>
		              {{ Form::text('user_password2' ,null, array('class' => 'form-control')) }}
		            </div>

		            {{ Form::submit('Save new user', array('class' => 'btn btn-primary'))}}
		           
             	{{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
		


@stop