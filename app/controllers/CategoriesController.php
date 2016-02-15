<?php

class CategoriesController extends Controller {

	private $category;
	private $product;

	function __construct(Category $category,Product $product){

		$this->category = $category;
		$this->product = $product;
	}

	/**
	 * Store the newly created category.
	 *
	 * @return Response
	 */
	protected function store()
	{
		$this->category->create(Input::all());
		$products = $this->product->all();
		return Redirect::to('products')
				->with('flash_msg','Category has been created!')
				->with('products',$products);
	}

}
