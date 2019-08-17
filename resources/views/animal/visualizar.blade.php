



@extends('layouts.app')
  @section('content')


<script type="text/javascript">
  $(document).ready( function () {
    $('#example').DataTable();
} );
</script>

	
<div class="container">
	<h2> Visualizar Animal </h2>
	<br/>
	<br/>
	<table class="table table-striped table-borderedy" id="example" name ="tabela">
    	<thead>
    			
    			<th> Nome Animal </th>
    			<th> Nome Dono </th>
          <th> Raca</th>
		  <th> Especie</th>
		  <th> Data Nasciento</th>
		  <th>Arquivo</th>
			<th> Editar </th>
			<th> Excluir</th>
    	</thead>
    	<tbody>
    	  @foreach($animal as $row)
				
          <tr>
            <td> {{$row->nomeAnimal}}</td>
            <td> {{$row->nomeDono}}</td>
            <td> {{$row->raca}}</td>
			 <td> {{$row->nomeEspecie}}</td>
            <td> {{$row->dataNascimento}}</td>
			
			<td>
				<img width="100"src="{{Storage::url($row->arquivo)}}"/>
			</td>
           
           
            <td>
               <a href="/animal?id={{$row->id}}">Editar</a>
            </td>
            <td>
			  <a onclick ="return confirm('Deseja realmente excluir ? ');" href ="animal/excluir?id={{$row->id}}">Excluir</a>
				
            </td>
        </tr>
        @endforeach




    	</tbody>

  </table>
</div>

@stop