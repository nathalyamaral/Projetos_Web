
<div class="content">
  <header>
    <h2>Admin</h2>
  </header>
  <form action="<?php echo site_url('admin/create_action'); ?>" method="post">
    <div class="form-group">
      <label for="varchar">Username <?php echo form_error('username') ?></label>
      <input type="text" class=" " name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
    </div>
    <div class="form-group">
      <label for="varchar">Name <?php echo form_error('name') ?></label>
      <input type="text" class=" " name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
    </div>
    <div class="form-group">
      <label for="varchar">Password <?php echo form_error('password') ?></label>
      <input type="password" class=" " name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
    </div>
    <div class="form-group">
      <label for="varchar">Email <?php echo form_error('email') ?></label>
      <input type="email" class=" " name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
    </div>
    <button type="submit" class="button special">Salvar</button>
    <a href="<?php echo site_url('admin') ?>" class="button alt">Cancelar</a>
  </form>
</div>
