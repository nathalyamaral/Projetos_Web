<div class="content">
  <header>
    <h2>Noticia <?php echo $id ?></h2>
  </header>
  <div class="table-wrapper">
    <table class="table">
      <tr>
        <td>Titulo </td>
        <td><?php echo $titulo_noticia; ?></td>
      </tr>
      <tr>
        <td>Descricao </td>
        <td><?php echo $descricao_noticia; ?></td>
      </tr>
      <tr>
        <td>Autor </td>
        <td><?php echo $autor_noticia; ?></td>
      </tr>
      <tr>
        <td>Data </td>
        <td><?php echo $data_noticia; ?></td>
      </tr>
      <tr>
        <td></td>
        <td><a href="<?php echo site_url('editor/noticias') ?>" class="button alt">Voltar</a></td>
      </tr>
    </table>
  </div>
</div>
