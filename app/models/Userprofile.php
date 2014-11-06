<?php

#use Illuminate\Auth\UserInterface;
#use Illuminate\Auth\Reminders\RemindableInterface;

class Userprofile extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_profiles';

	public $timestamps = false;
	public $incrementing = false;

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

}
