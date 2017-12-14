
<div class="content">
  <header>
    <h2>Servico ID <?php echo $titulo_servico; ?> </h2>
  </header>
  <div class="table-wrapper">
    <table class="table">
      <tr>
        <td>Titulo </td>
        <td><?php echo $titulo_servico; ?></td>
      </tr>
      <tr>
        <td>Descricao </td>
        <td><?php echo $descricao_servico; ?></td>
      </tr>
      <tr>
        <td>Data </td>
        <td><?php echo $data_servico; ?></td>
      </tr>
      <tr>
        <td></td>
        <td><a href="<?php echo site_url('editor/servicos') ?>" class="button alt">Voltar</a></td>
      </tr>
    </table>
  </div>
</div>
