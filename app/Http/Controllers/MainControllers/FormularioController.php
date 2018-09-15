<?php namespace App\Http\Controllers\MainControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Formulario;

class FormularioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $category)
	{
		DB::table('formulario')->insert([
			'categoria_id' => $category,
			'tipo' => 'BodaMIa',
			'ano' => date("Y"),
			'nombre_completo' => $request->nombre_completo,
			'nombre_secundario' => $request->nombre_secundario,
			'telefono' => $request->telefono,
			'correo_electronico' => $request->email,
			'historia' => $request->historia,
			'url_foto' => '',
			'fecha_creacion' => date("Y-m-d H:i:s"),
			'empresa_id' => env("RADIO_ID"),
		]);
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
