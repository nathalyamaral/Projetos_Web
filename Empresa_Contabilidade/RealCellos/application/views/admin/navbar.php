<header id="header">
  <div class="logo"> <a href="<?php echo site_url('editor') ?>">Gerenciamento de conteudo Real <span>Céllos</span></a></div>
  <a href="#menu">Menu</a>
  <?= anchor('admin/logout/', 'Sair', ['role' => 'button', 'onclick' => 'return confirm(\'Voce vai sair, tem certeza ?\')']) ?>
</header>
<!-- Nav -->

<nav id="menu">
  <ul class="links">
    <li><a href="<?php echo site_url('editor') ?>">Home</a></li>
    <li><a href="<?php echo site_url('config/edit/0') ?>">Config Site</a></li>
    <li><a href="<?php echo site_url('editor/servicos') ?>">Serviços</a></li>
    <li><a href="<?php echo site_url('editor/noticias') ?>">Noticias</a></li>
    <li><a href="<?php echo site_url('editor/banners') ?>">Banners</a></li>
    <li><a href="<?php echo site_url('editor/images') ?>">Images</a></li>
  </ul>
</nav>
<section id="two" class="wrapper style2">
<div class="inner">
<div class="box">
