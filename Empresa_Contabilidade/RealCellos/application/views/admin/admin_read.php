
<div class="content">
  <header>
    <h2>Admin Read</h2>
  </header>
  <div class="table-wrapper">
    <table class="table">
      <tr>
        <td>Status</td>
        <td><?php echo $status; ?></td>
      </tr>
      <tr>
        <td>Username</td>
        <td><?php echo $username; ?></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><?php echo $name; ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $email; ?></td>
      </tr>
      <tr>
        <td>Data</td>
        <td><?php echo $data; ?></td>
      </tr>
      <tr>
        <td></td>
        <td><a href="<?php echo site_url('admin') ?>" class="button alt">Voltar</a></td>
      </tr>
    </table>
  </div>
</div>
