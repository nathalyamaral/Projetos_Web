
<footer id="footer">
  <div class="container">
    <ul class="icons">
     <?php  foreach ($config->result() as $row)   {   ?>
      <li><a href="<?php echo $row->link_twitter ?>" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
      <li><a href="<?php echo $row->link_facebook ?>" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
      <li><a href="<?php echo $row->link_instagram ?>" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
      <li><a href="mailto:<?php echo $row->email_contato ?>" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
      <?php     }     ?>
    </ul>
  </div>
  <div class="copyright"> &copy; Untitled. All rights reserved. </div>
</footer>

<!-- Scripts --> 

<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.scrollex.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/skel.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/util.js') ?>"></script> 
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>
</body></html>