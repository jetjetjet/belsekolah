<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	function __construct()
	{
		$this->setTitle("Dashboard");
	}

	public function index()
	{
		return $this->render('dashboard.index');
	}
}
