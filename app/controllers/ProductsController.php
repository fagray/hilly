<?php

class ProductsController extends \BaseController {


	private $product;
	private $category;

	function __construct(Product $product, Category $category){

		$this->product = $product;
		$this->category = $category;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//show the index view
		$products = $this->product->all();
		return View::make('products.index')
				->with('products',$products);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//show the form
		$categories = $this->category->lists('category_name','id');
		return View::make('products.new')
			->with('title','New Product ')
			->with('categories',$categories);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// return Input::all();
		//store new product
		$this->product->create(Input::all());
		$products = $this->product->all();
		return Redirect::to('products')
				->with('flash_msg','Product has been created')
				->with('products',$products);
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
