<?php

class PeopleController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Controller to manage people
	|--------------------------------------------------------------------------
	|
	|
	*/

	public function getPeople()
	{
		$paging = 10;
		if(Input::get('s')) {
			$people = People::where('name', 'like', '%'.Input::get('s').'%')
							->orWhere('email', 'like', '%'.Input::get('s').'%')
							->paginate($paging);
		} else {
			$people = People::paginate($paging);
		}

		return View::make('people.manage')
			->with('people', $people);
	}

	public function getAddPeople()
	{
		return View::make("people.add");
	}

	public function postAddPeople()
	{
		$validator = Validator::make(Input::all(), array(
            "name"              	=> "required",
            "email"                 => "required|email|unique:people,email",
            "address"              	=> "required",
        ));
        if($validator->passes())
        {
			$people = new People;
			$people->name = Input::get('name');
			$people->email = Input::get('email');
			$people->address = Input::get('address');
			$people->hobby = Input::get('hobby');
			if(!$people->save()) {
				return Redirect::route('peopleAdd')
                ->with('flash_error', 'Failed to create new people!')
                ->withInput();
       		}
			return Redirect::route('people')
                ->with('flash_success', 'New people created')
                ->withInput();
        } else {
            return Redirect::route('peopleAdd')
                ->withErrors($validator)
                ->withInput();
        }
	}

	public function getEditPeople($id)
	{
		$people = People::find($id);
		if($people)
			return View::make("people.edit")->with('people', $people);
		else
			return Redirect::route('people')
				->with('flash_error', "people doesn't exist");
	}

	public function postEditPeople($id)
	{
        $validator = Validator::make(Input::all(), array(
            "name"              	=> "required",
            "email"                 => "required|email|unique:people,email, $id",
            "address"              	=> "required",
        ));
        if($validator->passes())
        {
			$people = People::find($id);
			$people->name = Input::get('name');
			$people->email = Input::get('email');
			$people->address = Input::get('address');
			$people->hobby = Input::get('hobby');
			if(!$people->save()) {
				return Redirect::route('peopleEdit', $id)
                ->with('flash_error', 'Failed to update people!')
                ->withInput();
       		}

            return Redirect::route('people')
                ->with('flash_success', 'People updated.');
        }
        else
        {
            return Redirect::route('peopleEdit', $id)
                ->withErrors($validator)
                ->withInput();
        }
	}

	public function getDeletePeople($id)
	{
			$people = People::find($id);
			if(!$people->delete()) {
				return Redirect::route('people')
				->with('flash_error', 'Failed to delete people!')
				->withInput();
			}

		return Redirect::route('people')
			->with('flash_success', 'People deleted.')
			->withInput();
	}

}
