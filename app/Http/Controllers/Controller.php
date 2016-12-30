<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	protected $breadcrums;

	public function __construct()
	{
		$this->breadcrums = explode('/', request()->path());
		array_shift($this->breadcrums);
		view()->share(['breadcrums' => $this->breadcrums]);
	}


}
