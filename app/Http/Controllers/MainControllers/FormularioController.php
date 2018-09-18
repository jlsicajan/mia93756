<?php namespace App\Http\Controllers\MainControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Formulario;
use Image;

class FormularioController extends Controller
{

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
			//Imagen
			$registro = Formulario::where('correo_electronico',$request->email)->first();

			if ($registro) {
					return "Usted ya llenó el formulario una vez con este correo.";
			} else {
					if ($request->hasFile('foto')) {
							$foto = $request->file('foto');
							$random = str_random(10);
							$filename = $random .".". $foto->getClientOriginalExtension();
							$image = Image::make($foto->getRealPath());

							$urlimagen = $filename;

							$image->save(public_path('uploads/bodasmia/'.$filename));

					} else {
							$foto = '';
							$urlimagen = '';
					}

					//Si viene vacía la historia
					if ($request->historia == '') {
						$mihistoria = '';
					} else {
						$mihistoria = $request->historia;
					}


					DB::table('formulario')->insert([
							'categoria_id' => $category,
							'tipo' => 'BodaMIa',
							'ano' => date("Y"),
							'nombre_completo' => $request->nombre_completo,
							'nombre_secundario' => $request->nombre_secundario,
							'telefono' => $request->telefono,
							'correo_electronico' => $request->email,
							'historia' => $mihistoria,
							'url_foto' => $urlimagen,
							'fecha_creacion' => date("Y-m-d H:i:s"),
							'empresa_id' => env("RADIO_ID"),
					]);

					Redirect::route('home');
			}
	}
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, $category)
    {
        $registro = Formulario::where('correo_electronico', $request->email)->first();
        if ($registro) {
            return redirect('/response/'.$category.'/0/1');
        } else {
            if ($request->hasFile('foto')) {
                $filenombre = str_random(30);
                $target = public_path('uploads/bodasmia/');

                $filename = $_FILES['foto']['name'];
                $filetmpname = $_FILES['foto']['tmp_name'];

                move_uploaded_file($filetmpname, $target.$filename);

                $data = $filetmpname;
            } else {
                $filename = '';
            }

            DB::table('formulario')->insert([
                'categoria_id' => $category,
                'tipo' => 'BodaMIa',
                'ano' => date("Y"),
                'nombre_completo' => $request->nombre_completo,
                'nombre_secundario' => $request->nombre_secundario,
                'telefono' => $request->telefono,
                'correo_electronico' => $request->email,
                'historia' => $request->historia,
                'url_foto' => $filename,
                'fecha_creacion' => date("Y-m-d H:i:s"),
                'empresa_id' => env("RADIO_ID"),
            ]);

						return redirect('/response/'.$category.'/0/2');
        }
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
