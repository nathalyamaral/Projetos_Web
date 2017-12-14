
<div class="content">
<header>
  <h2>Todas as Noticias</h2>
  </header>
  <div class="row">
    <div class="col-md-4"> <?php echo anchor(site_url('editor/create_noticia'),'Adicionar serviço', 'class="button default"'); ?> </div>
    </div>
    <div class="table-wrapper">
      <table class="table table-bordered">
        <tr>
          <td>Id</td>
          <td>Titulo Noticia</td>
          <td>Descricao Noticia</td>
          <td>Data Artigo</td>
          <td>Action</td>
        </tr>
        <?php    foreach ($noticias_data as $servicos)            {        ?>
        <tr>
          <td><?php echo $servicos->id ?></td>
          <td><?php echo $servicos->titulo_noticia ?></td>
          <td><?php echo substr($servicos->descricao_noticia, 0,100) ?></td>
          <td><?php echo $servicos->data_noticia ?></td>
       <td><?php 
				echo anchor(site_url('editor/read_noticia/' . $servicos->id),'Ver', ['class'=>'button special fit']); 
				
				echo anchor(site_url('editor/update_noticia/' . $servicos->id),'Editar', ['class'=>'button special fit']); 
				
				echo anchor(site_url('editor/delete_noticia/' . $servicos->id),'Deletar', ['class'=>'button special fit'], 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?></td>
        </tr>
        <?php            }            ?>
      </table>
    </div>
  </div>
  