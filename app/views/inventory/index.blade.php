@extends('layouts.master')

@section('content')

   <!-- <div class="clearfix"></div> -->
   <h1>Inventory Management</h1><hr/>
  
	   	<div class="pull-right">
				<ul class="breadcrumb">
		    <li><a href="/">Home</a></li>
		    <li class="active">Inventory</li>
		 </ul>
		</div>
   	
	
	<div class="row">
	    <div class="col-md-3">
		   	<h5 style="text-transform: uppercase;" class="text-muted">Quick Links</h5>
		      <div class="list-group">
		      	 <a href="/shipments/create" class="list-group-item ">
		        	Record New Shipment
		        </a>
		        <a href="/products/create" class="list-group-item ">
		        	Add new product
		        </a>
		         <a href="#modal-newcategory" data-toggle="modal" class="list-group-item ">
		        	Add new category
		        </a>
		      </div>
	    </div>

	    <div class="col-md-9">

	    	<h3>Product List</h3><hr/>
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

	<div class="row">

		<div class="col-md-3">
			<h5 style="text-transform: uppercase;" class="text-muted">Out of stocks</h5>
	      	<div class="list-group">
		      	@foreach($products_low_stocks as $product)
		         <a style="font-size: 18px;" href="#modal-newcategory" data-toggle="modal" class="list-group-item ">
		        	<i style="color:red;" class="fa fa-arrow-circle-down"></i>
		        	{{ $product->product_name }}
		        	<span style="color:red;" class="pull-right">
		        		{{ $product->stocks }}
		        	</span> 
		        </a>
		        @endforeach
	      	</div>
	    </div><!-- /col-md-3 -->

	    <div class="col-md-9">
	    	<h3>Shipment History</h3><hr/>
	    	<table class="table table-hover">
	    		<thead>
	    			<tr>
	    				<th>Shipment Timestamp</th>
	    				<th>Product</th>
	    				<th>Source / Supplier /  Branch </th>
	    				
	    				<th>Action</th>
	    				
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@foreach ($shipments as $shipment) 
		    			<tr>
		    				<td> {{ $shipment->created_at }} </td>
		    				<td>{{ Product::find($shipment->product_id)->product_name }} </td>
		    				<td>{{ Supplier::find($shipment->supplier_id)->name }} </td>
		    				<td> </td>
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