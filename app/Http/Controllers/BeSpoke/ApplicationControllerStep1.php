<?php

namespace App\Http\Controllers\BeSpoke;

use App\Http\Controllers\Controller;
use App\MultiStep\Steps;
use Illuminate\Http\Request;

class ApplicationControllerStep1 extends Controller
{
	public function index(Steps $steps)
	{
		$step = $steps->step('bespoke.application', 1);

		return view('welcome', compact('step'));
	}

	public function store(Steps $steps, Request $request) 
	{
		// validate

		$steps->step('bespoke.application', 1)
			->store($request->only('email'))
			->complete();

		return redirect()->route('bespoke.application.2.index');
	}
	
}