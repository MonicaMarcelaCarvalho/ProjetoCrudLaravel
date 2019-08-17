<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especie;

class EspecieController extends Controller
{
    function index (Request $request){
    	if($request->get('id')==null){
    		$especie = new Especie(); 
    	}else{
    		$especie = Especie::Where('id',$request->get('id'))->first();
    	}
    	return view ('especie.cadastro',array('especie'=>$especie)); 
    }

    function salvar (Request $request){
			$validatedData = $request->validate([
			"nomeEspecie" => "required|max:15",
		
		]);

    	if($request->get('id')==null){
    		$especie = new Especie();
    	}else{
    		$especie = Especie::Where('id',$request->get('id'))->first();
    	}

    	$especie->nomeEspecie = $request->get('nomeEspecie');


    	$especie->save();

    	return redirect()->action('EspecieController@listar');

    }

    function listar (){

    	 		return view ('especie.visualizar',array('especie'=>Especie::All()));

    }

   	function excluir(Request $request) {
		if ($request->get('id') != null) {
			$especie = Especie::Where('id', $request->get('id'))->first();
			$especie->delete();
			return $this->listar();
		}
	}


}
