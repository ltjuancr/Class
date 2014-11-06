<?php
class Velocidad extends Eloquent {
	protected $table = 'velocidad';

	static public function Veloz()
	{
		return DB::select("SELECT * FROM speed ORDER BY id DESC LIMIT 1;");
	}
}