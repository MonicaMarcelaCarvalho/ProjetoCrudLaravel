<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Animal;
use App\Especie;
use Storage;

class AnimalController extends Controller
{
    function index (Request $request){
    	if($request->get('id')==null){
    		$animal = new Animal(); 

    	}else{
    		$animal = Animal::Where('id',$request->get('id'))->first();
    	}
    	return view ('animal.cadastro',array('animal'=>$animal,'especie' => Especie::All())); 
    }

    function salvar (Request $request){
			$validatedData = $request->validate([
			"nomeAnimal" => "required|max:15",
			"nomeDono" => "required|max:15",
			"dataNascimento" => 'required|date|date_format:Y-m-d|before:yesterday',
			"raca" => "required"
			]);
		

    	if($request->get('id')==null){
    		$animal = new Animal();
    	}else{
    		$animal = Animal::Where('id',$request->get('id'))->first();
    	}

    	$animal->nomeAnimal = $request->get('nomeAnimal');
    	$animal->nomeDono = $request->get('nomeDono');
    	$animal->dataNascimento = $request->get('dataNascimento');
		$animal->especie = $request->get('nomeEspecie');
    	$animal->raca = $request->get('raca');

    	
			if ($request->hasFile('arquivo')) {
			$animal->arquivo = $request->file('arquivo')->getClientOriginalName();
			$request->file('arquivo')->storeAs($animal->arquivo, null, 'public');
		} else {
			$animal->arquivo = null;
		}
		
		$animal->save();
		return redirect()->action('AnimalController@listar');

    }

    function listar (){
				$animal1 =  DB::table("animal")
					->join("especie", "animal.especie", "=","especie.id")
					->select("animal.*", "especie.nomeEspecie AS nomeEspecie")
					->get();


    	 		return view ('animal.visualizar',array('animal'=> $animal1));

    }
	function excluir(Request $request) {
		if ($request->get('id') != null) {
			$animal = Animal::Where('id', $request->get('id'))->first();
			$animal->delete();
			return $this->listar();
		}
	}
	function download(Request $request) {
		return Storage::Disk('public')->download($request->get('arquivo'));
	}

}
