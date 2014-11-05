<?php
class Venta extends Eloquent {
	protected $table = 'venta';

	static public function Ventas()
	{
		return DB::select("select ve.nombre, sum(veh.precio_base) as numero
from vendedor ve, venta v, vehiculo veh
where v.vehiculo_id = veh.id 
and  v.vendedor_id = ve.id
group by ve.nombre");
	}
}