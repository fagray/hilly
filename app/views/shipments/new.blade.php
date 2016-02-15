@extends('layouts.master')

@section('content')
	
   <h2>New Product Shipment</h2><hr/>
   
	{{ Form::open(array('route' => 'shipments.store')) }}

		<div class="row">
		    <div class="col-md-6">

		            <div class="form-group">
		              <label> Quantity </label>
		              {{ Form::number('quantity' ,null, array('class' => 'form-control')) }}
		            </div>
		            
		            <div class="form-group">
		              <label>Delivered by </label>
		              {{ Form::text('delivered_by' ,null, array('class' => 'form-control')) }}
		            </div>
		    </div>
		    <div class="col-md-6">

		            <div class="form-group">
		              <label>Product Name</label>
		           
		              {{ Form::select('product_id', $products,null, array('class' => 'form-control')) }}

		            </div>

		            <div class="form-group">
		              <label>Supplier / Branch / Source </label>
		           
		              {{ Form::select('supplier_id', $suppliers,null, array('class' => 'form-control')) }}

		            </div>
		    </div><!-- /col-md-6 -->
		    <div class="form-group">
		              <label>Remarks</label>
		              {{ Form::text('remarks' ,null, array('class' => 'form-control')) }}
		            </div>

		    {{ Form::submit('Save Shipment',array('class' => 'pull-right btn btn-primary ')) }}
	    </div><!-- /row -->
    {{ Form::close() }}


@stop