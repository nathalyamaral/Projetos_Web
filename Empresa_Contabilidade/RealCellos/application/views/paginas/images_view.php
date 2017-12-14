<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
<header>
  <h2>Todos as imagens</h2>
</header>
<?php if($images->num_rows() > 0) : ?>
<?php if($this->session->flashdata('message')) : ?>
<div class="alert alert-success" role="alert" align="center">
  <?=$this->session->flashdata('message')?>
</div>
<?php endif; ?>
<div align="center">
  <?=anchor('editor/add_image','Adicionar imagem', ['class'=>'button default'])?>
</div>
<div class="table-wrapper">
  <table>
    <tr>
      <td>Id</td>
      <td>Link</td>
      <td>Caption</td>
      <td>Description</td>
      <td>Action</td>
    </tr>
    <?php foreach($images->result() as $img) : ?>
    <tr>
      <td><?=$img->id ?></td>
      <td><?=$img->file?></td>
      <td><?=$img->caption?></td>
      <td><?=substr($img->description, 0,100)?></td>
      <td><?=anchor('editor/edit_image/'.$img->id,'Editar',['class'=>'button special', 'role'=>'button'])?>
        <?=anchor('editor/delete_image/'.$img->id,'Deletar',['class'=>'button special', 'role'=>'button','onclick'=>'return confirm(\'Are you sure?\')'])?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<?php else : ?>
<div align="center">Ainda não há imagens, clique
  <?=anchor('editor/add_image','aqui')?>
  para adicionar uma.
  .</div>
<?php endif; ?>
</div>