<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model {

		/*
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'formulario';
		 
		protected $fillable = [
			'categoria_id', 'tipo', 'ano', 'nombre_completo', 'nombre_secundario', 'telefono', 'correo_electronico', 'historia', 'url_foto', 'fecha_creacion', 'empresa_id'
		];

	 	public function category(){
			 	return $this->belongsTo('App\Category');
	 	}
}
