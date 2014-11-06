<?php

class CredentialController extends BaseController {

	public function getLogin()
	{
        return View::make("credential.login");
	}

    public function postLogin()
    {
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
        if (Auth::attempt($user, Input::get('remember'))) {
			$user = User::find(Auth::user()->id);
			$user->last_login = new DateTime;
			$user->save();
            return Redirect::route('people')
                ->with('flash_notice', 'You are successfully logged in.');
        }

        return Redirect::route('login')
            ->with('flash_error', 'Your username/password combination was incorrect.')
            ->withInput();
    }

	public function getRegister()
	{
		return View::make("credential.register");
	}

    public function postRegister()
    {
        $validator = Validator::make(Input::all(), array(
            "username"              => "required|alpha_dash|unique:users,username",
            "first_name"              => "required|alpha",
            "email"                 => "required|email|unique:users,email",
            "password"              => "required|min:6",
            "password_confirmation" => "same:password",
        ));
        if($validator->passes())
        {
			try{
				DB::connection()->getPdo()->beginTransaction();
				$user = new User;
				$user->username = Input::get('username');
				$user->email = Input::get('email');
				$user->password = Hash::make(Input::get('password'));
				$user->display_name = Input::get('first_name').' '.Input::get('last_name');
				$user->save();
				$userprofile = new Userprofile;
				$userprofile->user_id = $user->id;
				$userprofile->first_name = Input::get('first_name');
				$userprofile->last_name = Input::get('last_name');
				$userprofile->save();
				DB::connection()->getPdo()->commit();
			} catch (\PDOException $e) {
				DB::connection()->getPdo()->rollBack();
				return Redirect::route('register')
                ->with('flash_error', 'Failed to create new user!')
                ->withInput();
			}
			return Redirect::route('login')
				->with('flash_notice', 'Register success.');
        }
        else
        {
            return Redirect::route('register')
                ->withErrors($validator)
                ->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('login')
            ->with('flash_notice', 'You are successfully logged out.');
    }
}
