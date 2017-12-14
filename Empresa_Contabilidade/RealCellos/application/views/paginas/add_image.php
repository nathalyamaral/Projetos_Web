<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content">
<header>
  <h2>Adicionar Imagem</h2>
  </header>
  <?php if(validation_errors() || isset($error)) : ?>
  <div class="alert alert-danger" role="alert" align="center">
    <?=validation_errors()?>
    <?=(isset($error)?$error:'')?>
  </div>
  <?php endif; ?>
  <?=form_open_multipart('editor/add_image')?>
  <div class="">
    <label for="userfile">Image File</label>
    <input type="file" class="" name="userfile">
  </div>
  <div class="">
    <label for="caption">Caption</label>
    <input type="text" class="" name="caption" value="">
  </div>
  <div class="">
    <label for="description">Description</label>
    <textarea class="" name="description"></textarea>
  </div>
    <ul class="actions">
              <li>
  <button type="submit" class="button default">Enviar</button>
  <?=anchor('editor/images','Cancelar',['class'=>'button alt'])?>
  </li>
  </ul>
  </form>
</div>
