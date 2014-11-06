<?php

class DashController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			return View::make('dash');
	}

	public function datos()
	{
		$velocidad = Velocidad::Veloz();
		return Response::Json($velocidad);
	}


}
