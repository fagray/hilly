@extends('layouts.master')

@section('content')

   <!-- <div class="clearfix"></div> -->
   <h1>Store Products</h1><hr/>
  
	   	<div class="pull-right">
				<ul class="breadcrumb">
		    <li><a href="/">Home</a></li>
		    <li class="active">Products</li>
		 </ul>
		</div>
   	
	
	<div class="row">
	    <div class="col-md-3">
	   	<h5 style="text-transform: uppercase;" class="text-muted">Quick Links</h5>
	      <div class="list-group">
	        <a href="/products/create" class="list-group-item ">
	        	Add new product
	        </a>
	         <a href="#modal-newcategory" data-toggle="modal" class="list-group-item ">
	        	Add new category
	        </a>
	        <a href="#" class="list-group-item">Check stocks</a>
	        <a href="#" class="list-group-item">Go to product sales</a>
	      </div>
	    </div>
	    <div class="col-md-9">

	    	<table class="table table-hover">
	    		<thead>
	    			<tr>
	    				<th>Product Barcode</th>
	    				<th>Product Name</th>
	    				<th>Product Price</th>
	    				<th>Product Description</th>
	    				<th>Action</th>
	    				
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@foreach ($products as $product) 
		    			<tr>
		    				<td> {{ $product->barcode }} </td>
		    				<td>{{ $product->product_name }} </td>
		    				<td>{{ $product->product_price }} </td>
		    				<td>{{ $product->product_description }} </td>
		    				<td>edit | remove</td>
		    			</tr>
		    		@endforeach
	    		</tbody>
	    	</table>
	     	
	    </div><!-- /col-md-9 --> 
  </div><!-- /row -->
  <div id="modal-newcategory" class="modal fade">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">New Product Category</h4>
            </div>
            <div class="modal-body">
             	{{ Form::open(array('route' => 'category.store')) }}
             		<div class="form-group">
		              <label>Category Name</label>
		              {{ Form::text('category_name' ,null, array('class' => 'form-control')) }}
		            </div>
             	{{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
		


@stop