<?php

class AuthController extends \BaseController {

	/**
	 * Show the form for user authentication
	 *
	 * @return Response
	 */
	public function get_login()
	{
		return View::make('auth/login')
				->with('title','User Login');
	}


	/**
	 * Validate the user credentials.
	 *
	 * @return Response
	 */
	public function post_login()
	{
		$validator = Validator::make(Input::all(),User::$rules);
		$attempt = Auth::attempt([

					'user_username' => 	Input::get('user_username'),
					'password' 		=>	Input::get('user_password')
		]);

		if($attempt){
			
			//valid login
			Session::put('sessions.session_auth_token',Str::random(35));
			Session::put('sessions.session_username', Input::get('user_username'));
			return Redirect::to('/auth/token/'.Str::random(55));
		}

		return Redirect::back()->withInput();

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		//logout the user
		Session::clear();
		return Redirect::to('auth/login');
	}


}
