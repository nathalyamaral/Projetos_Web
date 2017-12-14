
<div class="content">
  <h2>Adminstradores</h2>
  <div class="col-md-4"> <?php echo anchor(site_url('admin/create'),'Adicionar admin', 'class="button default"'); ?> </div>
  <div class="col-md-4 text-center">
    <div style="margin-top: 8px" id="message"> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> </div>
  </div>
  <div class="col-md-1 text-right"> </div>
  <div class="col-md-3 text-right">
    <form action="<?php echo site_url('admin/index'); ?>" class="form-inline" method="get">
      <div class="input-group">
        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
        <span class="input-group-btn">
        <?php 
                                if ($q <> '')
                                {
                                    ?>
        <a href="<?php echo site_url('admin'); ?>" class="button default">Limpar</a>
        <?php
                                }
                            ?>
        <button class="button alt" type="submit">Buscar</button>
        </span> </div>
    </form>
  </div>
  <div class="table-wrapper">
    <table class="table table-bordered">
      <tr>
    
        <td>Username</td>
        <td>Name</td>
        <td>Email</td>
        <td>Data</td>
        <td>Action</td>
      </tr>
      <?php
            foreach ($admin_data as $admin)
            {
                ?>
      <tr>
    
        <td><?php echo $admin->username ?></td>
        <td><?php echo $admin->name ?></td>
        <td><?php echo $admin->email ?></td>
        <td><?php echo $admin->data ?></td>
        <td><?php 
				echo anchor(site_url('admin/read/'.$admin->id), 'Ver', ['class'=>'button special', 'role'=>'button']); 
				echo ' | '; 
				//echo anchor(site_url('admin/update/'.$admin->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('admin/delete/'.$admin->id),'Deletar', ['class'=>'button special', 'role'=>'button'], 'onclick="javasciprt: return confirm(\'Voce tem certeza ?\')"'); 
				?></td>
      </tr>
      <?php
            }
            ?>
    </table>
    <div class="row">
      <div class="col-md-6"> <a href="#" class="button alt">Total: <?php echo $total_rows ?></a> </div>
      <div class="col-md-6 text-right"> <?php echo $pagination ?> </div>
    </div>
  </div>
</div>
