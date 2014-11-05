<?php

class VentasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('ventas');
	}

	public function datos()
	{
		$ventas = Venta::Ventas();
		return Response::Json($ventas);
	}

}
