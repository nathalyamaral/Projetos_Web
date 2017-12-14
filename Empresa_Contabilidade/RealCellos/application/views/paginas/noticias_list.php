<!-- Two -->

<section id="two" class="wrapper style2">
<div class="inner">
<div class="box">
  <div class="content">
    <h2> Todas as Noticias </h2>
    <div class="12u$"> <?php echo anchor(site_url('editor/create_noticia'),'Adicionar noticia', 'class="button default"'); ?>
      <div id="message"> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> </div>
      <form action="<?php echo site_url('editor/noticias'); ?>" class="form-inline" method="get">
        <div class="input-group">
          <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
          <span class="input-group-btn">
          <?php   if ($q <> '')      {      ?>
          <a href="<?php echo site_url('editor/noticias'); ?>" class="button alt">Limpar</a>
          <?php             }       ?>
          <button class="button special icon fa-search" type="submit">Buscar</button>
          </span> </div>
      </form>
    </div>
    <div class="table-wrapper">
      <table class="table table-bordered">
        <tr>
          <td>Id</td>
          <td>Titulo Noticia</td>
          <td>Descricao Noticia</td>
          <td>Autor Noticia</td>
          <td>Data Noticia</td>
          <td>Action</td>
        </tr>
        <?php       foreach ($noticias_data as $noticias)            {                ?>
        <tr>
          <td><?php echo $noticias->id ?></td>
          <td><?php echo $noticias->titulo_noticia ?></td>
          <td><?php echo substr($noticias->descricao_noticia, 0,100) ?></td>
          <td><?php echo $noticias->autor_noticia ?></td>
          <td><?php echo $noticias->data_noticia ?></td>
          <td><?php 
				echo anchor(site_url('editor/read_noticia/'.$noticias->id),'Ver', ['class'=>'button special fit']); 
				
				echo anchor(site_url('editor/update_noticia/'.$noticias->id),'Editar', ['class'=>'button special fit']); 
				
				echo anchor(site_url('editor/delete_noticia/'.$noticias->id),'Deletar', ['class'=>'button special fit'], 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?></td>
        </tr>
        <?php            }            ?>
      </table>
      <div class="row">
        <div class="col-md-6"> <a href="#" class="button alt fit">Total Record : <?php echo $total_rows ?></a> </div>
        <div class="col-md-6 text-right"> <?php echo $pagination ?> </div>
      </div>
    </div>
  </div>
</div>
</section>
