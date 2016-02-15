@extends('layouts.master')

@section('content')

	 <h3>Cash Register</h3><hr/>
	<div class="row">
	
		@if (Session::has('transaction'))
			Trans id : {{ Session::get('transaction') }}
		@endif
			
		<div class="col-md-8">

			{{ Form::open(array('id' => 'frmPOS')) }}
  			
				
				<div class="form-group">
					<label for="">Find / Scan Barcode</label>
					{{ Form::number('barcode',null,
						array('class' => 'form-control','placeholder' => 'Enter barcode')) }}
				</div><!-- /form-group -->
	
			{{ Form::close() }}

			<div class="well">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Barcode</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Qty</th>
						</tr>
					</thead>
					<tbody id="posBody">

						
					</tbody>
				</table>
			</div>
  		</div><!-- /col-md-8 -->


		
	</div><!-- /row -->
   
@stop

@section('external-scripts')

	<script type="text/javascript">

		$(document).ready(function(){

			var tr;

			getCartItems();

			$('input[name="barcode"]').keyup(function(){

				$barcode = $(this).val();


				// check if the barcode length is equal to 12
				if ( $barcode.length  == 12 ){

					$(this).val('');
					// submit it to the server and look for the product
					 $.getJSON('/products/search/'+$barcode,function(data){

					 	 if ( data.response == 200 ){

					 	 	
					 	 		getCartItems();

					 	 		
					 	 
					 	 	//success

					 	 }else{

					 	 	console.log('Product not found.');
					 	 }

					 	
					 });
				}

			});

		});

		function display(val){

			tr += '<td>'+ val.barcode + '</td>';
			tr += '<td>'+ val.product_name + '</td>';
			tr += '<td>'+ val.price + '</td>';
			tr += '<td>'+ val.qty +'</td>';
			tr += 	'</tr>';

		}


		function getCartItems(){

			$.getJSON('cart/items',function(data){

				tr = '<tr>';

				$.each(data,function(key,val){

					display(val);

					$('#posBody').html(tr);

				});
			});

		}

		
	</script>

@stop