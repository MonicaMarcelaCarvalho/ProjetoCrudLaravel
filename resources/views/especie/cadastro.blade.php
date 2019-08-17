




@extends('layouts.app')
  @section('content')
		
		<div class="container">
 		
   				<h2 class="navbar-brand"> Cadastrar Especie</h2>
			    <br />
		



 
 		 <form action="/especie/salvar" method="POST" id="form " enctype="multipart/form-data">
		   <input type="hidden" name="_token" value ="{{csrf_token()}}" />
		 
		   	<div class = "row">
		   		<div class="col-md-6">
		   		 	<div class = "form-group">
						<label for="nomeEspecie">Nome Especie</label>
							<input type="text" class="form-control" id="nomeEspecie" name="nomeEspecie" value ="{{$especie->nomeEspecie}}"/>
						<br/>
					</div>
				</div>


		           		<input type="hidden" name="id" value ="{{ $especie ->id }}"/>

		           		<br/>
		           		<br/>
		           
</div>
						 <a href="/"> <button onclick="return validar();" type = "submit" class ="btn btn-primary btn-md glyphicon glyphicon-floppy-save"> SALVAR </button></a>
						
				

				
						
		                 <a href="/"> <button type = "button" class = "btn btn-danger btn-md glyphicon glyphicon-arrow-left">  VOLTAR</button></a>
		              </div>
		
	</form>
	
	<script>
		
		function validar() {
			
			var sucesso = true;
			
			$(".required").each(function() {
				if ($(this).val() == "") {
					var nome_campo = $(this).data("nome");
					alert("Campo " + nome_campo + " obrigatório!");
					sucesso = false;
				}
			});
			
			/*if ($("#descricao").val() == "") {
				alert("Digite uma descrição");
				return false;
			}*/
			return sucesso;
		}
		
	</script>	
	
@stop
