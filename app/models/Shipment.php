<?php


class Shipment extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shipments';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable  = array('supplier_id','product_id','quantity','remarks','delivered_by');

	
						

}
