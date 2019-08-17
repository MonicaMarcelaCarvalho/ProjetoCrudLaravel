




@extends('layouts.app')
  @section('content')
		
		<div class="container">
 		
   				<h2 class="navbar-brand"> Cadastrar Animal</h2>
			    <br />
		



 
 		 <form action="/animal/salvar" method="POST" id="form " enctype="multipart/form-data">
		   <input type="hidden" name="_token" value ="{{csrf_token()}}" />
		 
		   	<div class = "row">
		   		<div class="col-md-6">
		   		 	<div class = "form-group">
						<label for="nomeAnimal">Nome Animal</label>
							<input type="text" class="form-control" id="nomeAnimal" name="nomeAnimal" value ="{{$animal->nomeAnimal}}"/>
						<br/>
					</div>
				</DIV>
				
			
		   		<div class="col-md-6">
		   		 	<div class = "form-group">
						<label for="nomeDono">Nome Dono</label>
							<input type="text" class="form-control" id="nomeDono" name="nomeDono" value ="{{$animal->nomeDono}}"/>
						<br/>
					</div>
				</div>
			<div class="col-md-6">
			  <div class = "form-group">
				<label for="nomeEspecie">Nome Especie:</label>
					<select id="nomeEspecie" name="nomeEspecie" class="form-control">
						<option></option>
						@foreach ($especie as $row)
							@if ($row->id == $animal->especie)
								<option value="{{ $row->id }}" selected="selected">{{ $row->nomeEspecie }}</option>
							@else
								<option value="{{ $row->id }}">{{ $row->nomeEspecie }}</option>
							@endif
						@endforeach
					</select>
				</div>
			  </div>	
			
				<div class="col-md-7">
		   		 	<div class = "form-group">
						<label for="raca">Raca</label>
							<input type="text" class="form-control" id="raca" name="raca" value ="{{$animal->raca}}"/>
						<br/>
					</div>
				</div>
				   	
		   		<div class="col-md-5">
		   		 	<div class = "form-group">
						<label for="dataNascimento">Data Nascimento</label>
							<input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value ="{{$animal->dataNascimento}}" onkeyup="carregarNascimento();" />
						<br/>
					</div>
				</div><br/><br/>
						<div class="form-group">
							<label for="arquivo">Arquivo:</label>
							<input type="file" id="arquivo" name="arquivo"/>
						</div>
						 </div>

		           		<input type="hidden" name="id" value ="{{ $animal ->id }}"/>
				
		           		
						 <a href="/"> <button onclick="return validar();" type = "submit" class ="btn btn-primary btn-md glyphicon glyphicon-floppy-save"> SALVAR </button></a>

		
		      
		
			               

	 </form>							
  </div>

  

  	<script>
		
		function validar() {
			
			var sucesso = true;
			
			$(".required").each(function() {
				if ($(this).val() == "") {
					var nome_campo = $(this).data("nomeEspecie");
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