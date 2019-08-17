




@extends('layouts.app')
  @section('content')
		
		<div class="container">
 		
   				<h2 class="navbar-brand"> Cadastrar Atendimento</h2>
			    <br />
		



 
 		 <form action="/atendimento/salvar" method="POST" id="form " enctype="multipart/form-data">
		   <input type="hidden" name="_token" value ="{{csrf_token()}}" />
		 
		   	<div class = "row">
		   		<div class="col-md-6">
		   		 	<div class = "form-group">
						<label for="nomeVeterinario">Nome Veterinario</label>
							<input type="text" class="form-control" id="nomeVeterinario" name="nomeVeterinario" value ="{{$atendimento->nomeVeterinario}}"/>
						<br/>
					</div>
				 </div>
		   	<div class="col-md-6">
			  <div class = "form-group">
				<label for="nomeAnimal">Nome Animal:</label>
					<select id="nomeAnimal" name="nomeAnimal" class="form-control">
						<option></option>
						@foreach ($animal as $row)
							@if ($row->id == $atendimento->animal)
								<option value="{{ $row->id }}" selected="selected">{{ $row->nomeAnimal }}</option>
							@else
								<option value="{{ $row->id }}">{{ $row->nomeAnimal }}</option>
							@endif
						@endforeach
					</select>
				</div>
			  </div>	
			
				<div class="col-md-6">
		   		 	<div class = "form-group">
						<label for="dataAtendimento">Data Atendimento</label>
							<input type="date" class="form-control" id="dataAtendimento" name="dataAtendimento" value ="{{ $row->dataAtendimento }}" onkeyup="carregarNascimeto();" />

						<br/>
					</div>
				</div>
		
			
		   		<div class="col-md-6">
		   		 	<div class = "form-group">
						<label for="detalhes">Descricao</label>
						<textarea id="detalhes" name="detalhes" class="form-control" placeholder="Digite aqui detalhes do Atendimento">{{ $atendimento->detalhes }}</textarea>

						<br/>
					</div>
			
				</div>
		   	
			 </div>
		      
			
		           		<input type="hidden" name="id" value ="{{ $atendimento ->id }}"/>

		           		<br/>
		           		<br/>
		           

						 <a href="/"> <button onclick="return validar();" type = "submit" class ="btn btn-primary btn-md glyphicon glyphicon-floppy-save"> SALVAR </button></a>
						
				

				
						
		                 <a href="/"> <button type = "button" class = "btn btn-danger btn-md glyphicon glyphicon-arrow-left">  VOLTAR</button></a>
		             
		
 <script type="text/javascript">
  	$(document).ready(function(){
  		$("#dataAtendimento").mask("00-00-0000",{placeholder:"'##/##/####'"});


  	});
  </script>
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

	 
 
	
	 </form>							
  </div>

  </div>

 

@stop