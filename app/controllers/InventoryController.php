<?php

class InventoryController extends \BaseController {

	private $product;
	private $shipment;

	public function __construct(Product $product,Shipment $shipment)
	{
		$this->product = $product;
		$this->shipment = $shipment;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//show the inventory page
		$products = $this->product->all();
		$out_of_stocks = $this->product->getOutOfStocks();
		$shipments = $this->shipment->all();
		return View::make('inventory.index')
						->with('products',$products)	
						->with('shipments',$shipments)
						->with('products_low_stocks',$out_of_stocks);	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
