<?php

class CartController extends \BaseController {

	private $product;
	private $cart;
	private $transaction;

	public function __construct(Product $product,Cart $cart, Transaction $transaction)
	{

		$this->product = $product;
		$this->cart = $cart;
		$this->transaction = $transaction;
	}

	/**
	 * Show the index page for register.
	 * @return Response      
	 */
	public function index()
	{

		// return Session::flush();
		$this->cart->init();	
		return View::make('cart.index')
				->with('title','Cash Register');
	}

	public function getAll()
	{
		return $this->cart->getItems();
	}

	public function searchProduct($barcode)
	{

		// return print $this->transaction->getCode();
		$product = $this->product->getProduct($barcode);
		// return dd($product);
		
		if ( count($product) > 0) {

		 	// Response::json(array('product' => $product,'response' => 200,'msg' => 'Product searched successful.'));
			//check its stocks
			if ($product->stocks > 0 ){

					// check if exist on the cart
					if ($this->exists($barcode)){

						// update it's qty instead
						$cart_product = $this->cart->getProduct($barcode);
						// return dd($cart_product);
						// return print (int)$cart_product->qty;
						$new_qty = $cart_product->qty+ 1;
						// return print $new_qty;
						$total = $new_qty * $product->product_price;
						// return print $product->product_price;
						if ($product->stocks >= $new_qty ){
 
							$this->cart->updateQty($new_qty,$total,$barcode);
							
							return Response::json(array('product' => $product,'qty' => $new_qty,'response' => 200,'msg' => 'Product qty has been updated.'));
						
						}else{

							return Response::json(array('response' => 500,'msg' => 'Product has not enough stocks.'));

						}

						// return print "hey";

					
				}else {

						// okay insert it
						$data = array(

							'trans_id'	=> $this->transaction->getCode(),
							'barcode'	=> $barcode,
							'prod_id'	=> $product->id,
							'qty'		=> 1, 
							'total'		=> 1 * $product->product_price,
							'price'		=> $product->product_price,
							'status'	=> 1
						);

						$this->cart->add($data);
						return Response::json(array('product' => $product,'qty' => 1,'response' => 200,'msg' => 'Product has been added to cart.'));
					}

			}else{

				// no stocks
				return Response::json(array('response' => 500,'msg' => 'Product has no stocks.'));
			}


		}

		return Response::json(array('response' => 500,'msg' => 'Product not found.'));

			


	}

	/**
	 * Determine if the product already exist on the cart.
	 * @param  int $barcode 
	 * @return Response          
	 */
	public function exists($barcode)
	{
		$product_count =  $this->cart->where('barcode',$barcode)->count();
		if ( $product_count > 0 ){

			return true;
		}

		return false;
	}

	/**
	 * Add items to cart.
	 * @param array $params
	 */
	public function add($params)
	{
		return $this->cart->add($params);
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
