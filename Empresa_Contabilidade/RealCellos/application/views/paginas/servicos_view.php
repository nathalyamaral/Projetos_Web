
<div class="content">
<header>
  <h2>Todos os Servicos</h2>
  </header>
  <div class="row">
    <div class="col-md-4"> <?php echo anchor(site_url('editor/create_servico'),'Adicionar serviço', 'class="button default"'); ?> </div>
  </div>
  <div class="table-wrapper">
    <table class="table table-bordered">
      <tr>
        <td>Id</td>
        <td>Titulo</td>
        <td>Descricao Serviço</td>
        <td>Data</td>
        <td>Action</td>
      </tr>
      <?php  foreach ($servicos_data as $row)            {        ?>
      <tr>
        <td ><?php echo $row->id  ?></td>
        <td><?php echo $row->titulo_servico ?></td>
        <td><?php echo $row->descricao_servico ?></td>
        <td><?php echo $row->data_servico?></td>
          <td><?php 
				echo anchor(site_url('editor/read_servico/' . $row->id),'Ver', ['class'=>'button special small']); 
				echo ' | '; 
				echo anchor(site_url('editor/update_servico/' . $row->id),'Editar', ['class'=>'button special small']); 
				echo ' | '; 
				echo anchor(site_url('editor/delete_servico/' . $row->id),'Deletar' ,  ['class'=>'button special small'],'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?></td>
      </tr>
      <?php            }            ?>
    </table>
  </div>
</div>
