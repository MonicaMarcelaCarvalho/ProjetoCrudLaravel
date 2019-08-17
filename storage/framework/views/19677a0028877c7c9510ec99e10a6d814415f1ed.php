  <?php $__env->startSection('content'); ?>


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
    	  <?php $__currentLoopData = $especie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <tr>
            <td> <?php echo e($row->nomeEspecie); ?></td>

            <td>
               <a href="/especie?id=<?php echo e($row->id); ?>">Editar</a>
            </td>
            <td>
			  <a onclick ="return confirm('Deseja realmente excluir ? ');" href ="/especie/excluir?id=<?php echo e($row->id); ?>">Excluir</a>
				
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




    	</tbody>

  </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>