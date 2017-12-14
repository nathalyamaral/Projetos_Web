<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if($banners->num_rows() > 0) : ?>
<?php if($this->session->flashdata('message')) : ?>
<div class="alert alert-success" role="alert" align="center">
  <?=$this->session->flashdata('message')?>
</div>
<?php endif; ?>
<div align="center">
  <?=anchor('editor/add_banner','Adicionar banner',['class'=>'button default'])?>
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
    <?php foreach($banners->result() as $banner) : ?>
    <tr>
      <td><?=$banner->id ?></td>
      <td><?=$banner->file?></td>
      <td><?=$banner->caption?></td>
      <td><?=substr($banner->description, 0,100)?></td>
      <td><?=anchor('editor/edit_banner/'.$banner->id,'Editar',['class'=>'button special', 'role'=>'button'])?>
        <?=anchor('editor/delete_banner/'.$banner->id,'Deletar',['class'=>'button special', 'role'=>'button','onclick'=>'return confirm(\'Are you sure?\')'])?></td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
<?php else : ?>
<div align="center">Ainda não há nenhum banner clique
  <?=anchor('editor/add_banner','aqui')?>
  para adicionar
  .</div>
<?php endif; ?>
