  <div class="content">
    <h2>Todos os Servicos</h2>
    <div class="12u$"> <?php echo anchor(site_url('editor/create_servico'),'Adicionar serviço', 'class="button default"'); ?>
      <div id="message"> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> </div>
      <form action="<?php echo site_url('editor/servicos'); ?>" class="form-inline" method="get">
        <div class="input-group">
          <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
          <span class="input-group-btn">
          <?php    if ($q <> '')          {              ?>
          <a href="<?php echo site_url('editor/servicos'); ?>" class="button alt">Limpar</a>
          <?php                  }            ?>
          <button class="button special icon fa-search" type="submit">Buscar</button>
          </span> </div>
      </form>
    </div>
    <div class="table-wrapper">
      <table class="table table-bordered">
        <tr>
          <td>No</td>
          <td>Titulo</td>
          <td>Descricao</td>
          <td>Data</td>
          <td>Action</td>
        </tr>
        <?php    foreach ($servicos_data as $servicos)            {        ?>
        <tr>
          <td><?php echo $servicos->id ?></td>
          <td><?php echo $servicos->titulo_servico ?></td>
          <td><?php echo $servicos->descricao_servico ?></td>
          <td><?php echo $servicos->data_servico ?></td>
          <td><?php 
				echo anchor(site_url('editor/read_servico/'.$servicos->id),'Ver', ['class'=>'button special small']); 
				echo ' | '; 
				echo anchor(site_url('editor/update_servico/'.$servicos->id),'Editar', ['class'=>'button special small']); 
				echo ' | '; 
				echo anchor(site_url('editor/delete_servico/'.$servicos->id),'Deletar' ,  ['class'=>'button special small'],'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?></td>
        </tr>
        <?php            }            ?>
      </table>
      <div class="row">
        <div class="col-md-6"> <a href="#" class="button alt fit">Total: <?php echo $total_rows ?></a> </div>
        <div class="col-md-6 text-right"> <?php echo $pagination ?> </div>
      </div>
    </div>
  </div>

