<?php

class UsersController extends \BaseController {

	private $user;

	public function __construct( User $user)
	{
		$this->user = $user;
		
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();
		//show the index page
		return View::make('settings.users')
				->with('users',$users);
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
		// save the new user
		// TODO : limit the admin to 3 accounts only
		$this->user->create(array(
									'user_username' =>	Input::get('user_username'),
									'user_password_md5' => 	md5(Input::get('user_password')),
									'password' => 	Hash::make(Input::get('user_password')),
									'user_role' 	=>	Input::get('user_role')
							));

		$users = $this->user->all();
		return Redirect::to('settings/system-users')
						->with('users',$users)
						->with('flash_msg','User has been successfully created !');
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
