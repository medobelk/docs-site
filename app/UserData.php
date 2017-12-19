<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

class UserData{

	protected $user;
	
	public function __construct(Builder $user){
		$this->user = $user;
	}

	public function reviews()
	{	
		$reviews = $this->user->get()[0]->reviews;
		return $reviews;
	}

	public function visits()
	{
		$visits = $this->user->get()[0]->visits;
		return $visits;
	}

	public function analyzes()
	{
		$analyzes = $this->user->get()[0]->reviews;
		return $analyzes;
	}
}