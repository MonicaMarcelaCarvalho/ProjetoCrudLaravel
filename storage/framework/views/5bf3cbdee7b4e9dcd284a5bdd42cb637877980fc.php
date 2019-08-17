  <?php $__env->startSection('content'); ?>

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
    	  <?php $__currentLoopData = $atendimento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <tr>
            <td> <?php echo e($row->nomeVeterinario); ?></td>
			<td> <?php echo e($row->nomeAnimal); ?></td>
            <td> <?php echo e($row->detalhes); ?></td>
            <td> <?php echo e($row->dataAtendimento); ?></td>
  
           
            <td>
               <a href="/atendimento?id=<?php echo e($row->id); ?>">Editar</a>
            </td>
            <td>
			  <a onclick ="return confirm('Deseja realmente excluir ? ');" href ="/atendimento/excluir?id=<?php echo e($row->id); ?>">Excluir</a>
				
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    	</tbody>

  </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>