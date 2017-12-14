<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->input->post()){
	$site_logo 		= set_value('site_logo');
	$email_contato  	= set_value('email_contato');
	$link_twitter 		= set_value('caption');
	$link_instagram   	= set_value('link_instagram');
	$link_facebook  = set_value('link_facebook');
} else {
	$site_logo 		= $config->site_logo;
	$email_contato  	= $config->email_contato;
	$link_twitter 		= $config->link_twitter;
	$link_instagram  	= $config->link_instagram;
	$link_facebook 		= $config->link_facebook;    
	
}
?>

<section id="two" class="wrapper style2">
  <div class="inner">
    <div class="box">
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
        <header>        
          <h2>Site Logo</h2>
          <label for="userfile">Logo atual</label>
          <div class="image fit small"><img src="<?php echo base_url($site_logo); ?>" class=""> </div>
        </header>
        <?=form_open_multipart('config/edit/'.$config->id)?>
        <label for="userfile">Alterar logo</label>
        <div class="12u$">
          <input type="file" class="" name="userfile" id="site_logo">
        </div>
        <div class="12u$">
          <label for="varchar">Email Contato</label>
          <input type="text" class="" name="email_contato" id="email_contato" placeholder="Email Contato" value="<?php echo $email_contato; ?>" />
        </div>
        <div class="12u$">
          <label for="varchar">Link Twitter </label>
          <input type="text" class="" name="link_twitter" id="link_twitter" placeholder="Link Twitter" value="<?php echo $link_twitter; ?>" />
        </div>
        <div class="12u$">
          <label for="varchar">Link Instagram </label>
          <input type="text" class="" name="link_instagram" id="link_instagram" placeholder="Link Instagram" value="<?php echo $link_instagram; ?>" />
        </div>
     
        <div class="12u$">
          <label for="varchar">Link Facebook</label>
          <input type="text" class="" name="link_facebook" id="link_facebook" placeholder="Link Facebook" value="<?php echo $link_facebook; ?>" />
        </div>
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
    </div>
  </div>
</section>
