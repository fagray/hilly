<?php


class Product extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable  = array(
									'barcode', 'product_name','product_price',
									'product_image','product_description','category_id','stocks','status'
								);

	/**
	 * Update the product stocks.
	 * @param  int $prod_id 
	 * @param  int $qty     
	 * @return boolean          
	 */
	public function updateStocks($prod_id,$qty)
	{	
		$product = static::find($prod_id);
		$current_stocks = $product->stocks;
		$product->stocks = $current_stocks + $qty;
		$product->save();
		return true;
	}

	/**
	 * Grab product stocks below 20
	 * @return Response 
	 */
	public function getOutOfStocks()
	{
		return static::where('stocks','<',20)->get();
	}

	/**
	 * Retrieve product based on its barcode.
	 * @param  int $barcode 
	 * @return Response
	 */	
	public function getProduct($barcode)
	{
		$product =  static::where('barcode',$barcode)->first();
		return $product;
	}

	public function getStocks($barcode)
	{
		return static::where('barcode',$barcode)->count();
	}


	public function category()
	{
		return $this->belongsTo('category');
	}


}
