<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Atendimento;
use App\Animal;
use Storage;

class AtendimentoController extends Controller
{
    function index (Request $request){
    	if($request->get('id')==null){
    		$atendimento = new Atendimento(); 
    	}else{
    		$atendimento = Atendimento::Where('id',$request->get('id'))->first();
    	}
    	return view ('atendimento.cadastro',array('atendimento'=>$atendimento,'animal' => Animal::All())); 
	
    }

    function salvar (Request $request){
		$validatedData = $request->validate([
			"nomeVeterinario" => "required|max:15",
			"detalhes" => "required",
			"dataNascimento" => 'nullable|date',
		]);

    	if($request->get('id')==null){
    		$atendimento = new Atendimento();
    	}else{
    		$atendimento = Atendimento::Where('id',$request->get('id'))->first();
    	}

    	$atendimento->nomeVeterinario = $request->get('nomeVeterinario');
		$atendimento->animal = $request->get('nomeAnimal');
    	$atendimento->detalhes = $request->get('detalhes');
		$atendimento->dataAtendimento = $request->get('dataAtendimento');


    	$atendimento->save();

    	return redirect()->action('AtendimentoController@listar');

    }

    function listar (){
		$atendimento1 =  DB::table("atendimento")
					->join("animal", "atendimento.animal", "=","animal.id")
					->select("atendimento.*", "animal.nomeAnimal AS nomeAnimal")
					->get();

    	 		return view ('atendimento.visualizar',array('atendimento'=>$atendimento1));

    }

	function excluir(Request $request) {
		if ($request->get('id') != null) {
			$atendimento = Atendimento::Where('id', $request->get('id'))->first();
			$atendimento->delete();
			return $this->listar();
		}
	}


}
