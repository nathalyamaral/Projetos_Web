
<div class="content">
  <header>
    <h2>Configurações</h2>
  </header>
  <?php if(validation_errors() || isset($error)) : ?>
  <div class="alert alert-danger" role="alert" align="center">
    <?=validation_errors()?>
    <?=(isset($error)?$error:'')?>
  </div>
  <?php endif; ?>
  <?php   foreach ($config as $row)   {   ?>
  <header>
    <h2>Site Logo</h2>
    <label for="userfile">Logo atual</label>
    <div class="image fit"><img src="<?php echo base_url($row->site_logo); ?>" class=""> </div>
  </header>
  <?=form_open_multipart('config/edit/0')?>
  <label for="userfile">Alterar logo</label>
  <div class="12u$">
    <input type="file" class="" name="userfile" id="site_logo">
  </div>
  <div class="12u$">
    <label for="varchar">Email Contato</label>
    <input type="text" class="" name="email_contato" id="email_contato" placeholder="Email Contato" value="<?php echo $row->email_contato; ?>" />
  </div>
  <div class="12u$">
    <label for="varchar">Link Twitter </label>
    <input type="text" class="" name="link_twitter" id="link_twitter" placeholder="Link Twitter" value="<?php echo $row->link_twitter; ?>" />
  </div>
  <div class="12u$">
    <label for="varchar">Link Instagram </label>
    <input type="text" class="" name="link_instagram" id="link_instagram" placeholder="Link Instagram" value="<?php echo $row->link_instagram; ?>" />
  </div>
  <div class="12u$">
    <label for="varchar">Link Facebook</label>
    <input type="text" class="" name="link_facebook" id="link_facebook" placeholder="Link Facebook" value="<?php echo $row->link_facebook; ?>" />
  </div>
  <?php     }     ?>
  <div class="12u$">
    <ul class="actions">
      <li>
        <button type="submit" class="button default">Salvar</button>
      </li>
      <li>
        <?=anchor('editor','Cancelar',['class'=>'button alt'])?>
      </li>
    </ul>
  </div>
  </form>
</div>
