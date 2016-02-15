<?php


class Supplier extends Eloquent  {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'suppliers';

	/**
	 * Turn off timestamps
	 */
	
	public $timestamps = false;
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable  = array('name','location','phone_number','email');

	
						

}
