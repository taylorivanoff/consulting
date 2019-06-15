<?php

namespace App\MultiStep;

use Illuminate\Http\Request;

class Steps
{
	protected $name;

	protected $step;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function step($name, $step)
	{
		$this->name = $name;
		$this->step = $step;

		return $this;
	}

	public function store($data)
	{
		$this->request->session()->put("multistep.{$this->name}.{$this->step}.data", $data);

		return $this;
	}

	public function complete()
	{
		$this->request->session()->put("multistep.{$this->name}.{$this->step}.complete", true);

		return $this;
	}

	public function __get($property)
	{
		return $this->request->session()->get("multistep.{$this->name}.{$this->step}.data.{$property}");
	}
}