



@extends('layouts.app')
  @section('content')

<div class="container">
	<h2> Visualizar Atendimento </h2>
	<br/>
	<br/>
	<table class="table table-striped table-borderedy" id="example" name ="tabela">
    	<thead>
    			
    			<th> Nome Veterinario </th>
				<th> Nome Animal </th>
    			<th> Descricao </th>
          <th> Data Atendimento</th>
				<th> Editar </th>
				<th> Excluir</th>
    	</thead>
    	<tbody>
    	  @foreach($atendimento as $row)

          <tr>
            <td> {{$row->nomeVeterinario}}</td>
			<td> {{$row->nomeAnimal}}</td>
            <td> {{$row->detalhes}}</td>
            <td> {{$row->dataAtendimento}}</td>
  
           
            <td>
               <a href="/atendimento?id={{$row->id}}">Editar</a>
            </td>
            <td>
			  <a onclick ="return confirm('Deseja realmente excluir ? ');" href ="/atendimento/excluir?id={{$row->id}}">Excluir</a>
				
            </td>
        </tr>
        @endforeach


    	</tbody>

  </table>
</div>

@stop