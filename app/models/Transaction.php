<?php


class Transaction extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'transactions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable  = array('status');

	public static function generate()
	{
		$transaction = static::max('id')+1; // transaction id
		static::create(array('status'	=> 	'1'));
		return  $transaction;
		
	}

	public function getCode()
	{
		
		return  Session::get('transaction');

		// return Response::json(array('response' => '300','msg' => 'Transaction code has not been set.'));

	}
						

}
