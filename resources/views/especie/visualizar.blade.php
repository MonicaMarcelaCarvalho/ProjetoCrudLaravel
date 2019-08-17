



@extends('layouts.app')
  @section('content')


<script type="text/javascript">
  $(document).ready( function () {
    $('#example').DataTable();
} );
</script>

	
<div class="container">
	<h2> Visualizar chamados </h2>
	<br/>
	<br/>
	<table class="table table-striped table-borderedy" id="example" name ="tabela">
    	<thead>
    			
    			<th> Nome Especie </th>

          <th> Editar </th>
          <th> Excluir</th>
    	</thead>
    	<tbody>
    	  @foreach($especie as $row)

          <tr>
            <td> {{$row->nomeEspecie}}</td>

            <td>
               <a href="/especie?id={{$row->id}}">Editar</a>
            </td>
            <td>
			  <a onclick ="return confirm('Deseja realmente excluir ? ');" href ="/especie/excluir?id={{$row->id}}">Excluir</a>
				
            </td>
        </tr>
        @endforeach




    	</tbody>

  </table>
</div>

@stop