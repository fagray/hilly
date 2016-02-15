<?php

class ShipmentsController extends \BaseController {

	private $supplier;
	private $shipment;
	private $product;

	function __construct(Shipment $shipment, Supplier $supplier, Product $product){

		$this->supplier = $supplier;
		$this->shipment = $shipment;
		$this->product = $product;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//show the form
		
		$suppliers = $this->supplier->lists('name','id');
		$products = $this->product->lists('product_name','id');
		return View::make('shipments.new')
					->with('title','New Shipment')
					->with('products',$products)
					->with('suppliers',$suppliers);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//store the shipment
		$this->shipment->create(Input::all());
		// update the product stocks on the products table
		$this->product->updateStocks(Input::get('product_id'),Input::get('quantity'));
		$shipments = $this->shipment->all();
		$products = $this->product->all();
		return Redirect::to('inventory')
				->with('flash_msg','Shipment has been recorded.')
				->with('products',$products)
				->with('shipments',$shipments);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
