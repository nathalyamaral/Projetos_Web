<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->input->post()){
   $caption       = set_value('caption');
   $description    = set_value('description');
} else {
   $caption       = $image->caption;
   $description    = $image->description;
}
?>

<div class="content">
  <header>
    <h2>Editar imagem</h2>
  </header>
  <?php if(validation_errors() || isset($error)) : ?>
  <div class="alert alert-danger" role="alert" align="center">
    <?=validation_errors()?>
    <?=(isset($error)?$error:'')?>
  </div>
  <?php endif; ?>
  <?=form_open_multipart('editor/edit_image/'.$image->id)?>
  <div class="12u$">
    <label for="userfile">Arquivo de imagem</label>
    <div>
      <div class="col-xs-12 col-sm-6 col-md-3"><?php echo site_url($image->file )?></div>
    </div>
    <input type="file" class="" name="userfile">
  </div>
  <div class="12u$">
    <label for="caption">Caption</label>
    <input type="text" class="" name="caption" value="<?=$caption?>">
  </div>
  <div class="12u$">
    <label for="description">Description</label>
    <textarea class="" name="description"><?=$description?>
</textarea>
  </div>
  <ul class="actions">
    <li>
      <button type="submit" class="button default">Salvar</button>
      <?=anchor('editor/images','Cancelar',['class'=>'button alt'])?>
    </li>
  </ul>
  </form>
</div>
