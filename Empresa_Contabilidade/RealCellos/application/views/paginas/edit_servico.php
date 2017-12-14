<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

      <div class="content">
      <header>
<h2>Serviços </h2>
</header>
<form action="<?php echo site_url('editor/create_action1'); ?>" method="post">
  <div class="12u$">
    <label for="varchar">Titulo </label>
    <input type="text" class="" name="titulo_servico" id="titulo_servico" placeholder="" value="<?php echo $titulo_servico; ?>" />
  </div>
  <div class="12u$">
    <label for="longtext">Descricao Serviço</label>
    <input type="text" class="" name="descricao_servico" id="descricao_servico" placeholder="" value="<?php echo $descricao_servico; ?>" />
  </div>
    <ul class="actions">
              <li>
  <button type="submit" class="button default">Salvar</button>
  <a href="<?php echo site_url('editor/servicos') ?>" class="button alt">Cancelar</a>
   </li>
          </ul>
</form>
</div>

