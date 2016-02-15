<?php


class Cart extends Eloquent  {

	


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cart';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable  = array('barcode','prod_id','trans_id','qty','total','price','status');

	/**
	 * Initialize new transaction.
	 * @return Response 
	 */
	public function init()
	{

		if( ! Session::has('transaction')){

			return Session::put('transaction', Transaction::generate());

		}

		return false;
	}

	public function getItems()
	{
		return DB::table($this->table)
	        ->leftJoin('products', 'cart.barcode', '=', 'products.barcode')
	        ->get();
	}

	/**
	 * Add products to cart
	 * @param array $params 
	 */
	public function add($params)
	{
		return static::create($params);
	}

	public function getProduct($barcode)
	{
		$product =  static::where('barcode',$barcode)->first();
		return $product;
	}

	public function updateQty($qty,$total,$barcode)
	{
		return static::where('barcode',$barcode)
					->update(array('qty' => $qty,'total' => $total));
					
	}
						

}
