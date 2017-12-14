<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

      <div class="content">
      <header>
<h2>Noticias</h2>
</header>
<form action="<?php echo site_url('editor/update_action'); ?>" method="post">
  <div class="12u$">
    <label for="varchar">Titulo</label>
    <input type="text" class="" name="titulo_noticia" id="titulo_noticia" placeholder="" value="<?php echo $titulo_noticia; ?>" />
  </div>
  <div class="12u$">
    <label for="longtext">Descricao  </label>
    <textarea class="" name="descricao_noticia" id="descricao_noticia" placeholder="" ><?php echo $descricao_noticia; ?></textarea>
  </div>
  <div class="12u$">
    <label for="varchar"> Autor </label>
    <input type="text" class="" name="autor_noticia" id="autor_noticia" placeholder=" " value="<?php echo $autor_noticia; ?>">
  </div>
  <ul class="actions">
              <li>
  <button type="submit" class="button default">Salvar</button></li>
<li>  <a href="<?php echo site_url('editor/noticias') ?>" class="button alt">Cancelar</a></li>
</ul>
</form>
</div>

