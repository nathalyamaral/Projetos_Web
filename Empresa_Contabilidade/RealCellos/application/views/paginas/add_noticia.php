<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

      <div class="content">
        <h2>Adicionar Noticia</h2>
        <form action="<?php echo site_url('editor/create_action'); ?>" method="post">
          <div class="">
            <label for="varchar">Titulo</label>
            <input type="text" class="" name="titulo_noticia" id="titulo_noticia" placeholder="" value="<?php echo $titulo_noticia; ?>" />
          </div>
          <div class="">
            <label for="longtext">Descricao Artigo </label>
            <textarea class="" name="descricao_noticia" id="descricao_noticia" placeholder="" ><?php echo $descricao_noticia; ?></textarea>
          </div>
          <div class="">
            <label for="varchar"> Autor Artigo</label>
            <input type="text" class="" name="autor_noticia" id="autor_noticia" placeholder=" " value="<?php echo $autor_noticia; ?>">
          </div>
            <ul class="actions">
              <li>
          <button type="submit" class="button default">Salvar</button>
          <a href="<?php echo site_url('editor/noticias') ?>" class="button alt">Cancelar</a>
          </li>
          </ul>
        </form>
      </div>
 
