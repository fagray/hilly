@extends('layouts.master')

@section('content')
	
   <h2>New Product</h2><hr/>
   
	{{ Form::open(array('route' => 'products.store')) }}

		<div class="row">
		    <div class="col-md-6">

		            <div class="form-group">
		              <label>Product Barcode</label>
		              {{ Form::text('barcode' ,null, array('class' => 'form-control')) }}
		            </div>
		             <div class="form-group">
		              <label>Product Image</label>
		              {{ Form::text('product_image' ,null, array('class' => 'form-control')) }}
		            </div>
		            <div class="form-group">
		              <label>Product Name</label>
		              {{ Form::text('product_name' ,null, array('class' => 'form-control')) }}
		            </div>
		    </div>
		    <div class="col-md-6">
		    	   <div class="form-group">
		              <label>Product Price</label>
		              {{ Form::number('product_price' ,null, array('class' => 'form-control')) }}
		            </div>

		            <div class="form-group">
		              <label>Description</label>
		              {{ Form::text('product_description' ,null, array('class' => 'form-control')) }}
		            </div>

		            <div class="form-group">
		              <label>Category</label>
		           
		              {{ Form::select('category_id', $categories,null, array('class' => 'form-control')) }}

		            </div>
		    </div><!-- /col-md-6 -->
		    {{ Form::submit('Save Product',array('class' => 'pull-right btn btn-primary ')) }}
	    </div><!-- /row -->
    {{ Form::close() }}


@stop