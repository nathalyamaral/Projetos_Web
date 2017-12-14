        <h2 style="margin-top:0px">Config List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('config/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('config/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('config'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
		<th>Site Logo</th>
		<th>Email Contato</th>
		<th>Link Twitter</th>
		<th>Link Instagram</th>
		<th>Link Facebook</th>
		<th>Action</th>
            </tr>
			
			<?php   foreach ($config_data as $config)   {   ?>
                <tr>
			<td ><?php echo ++$start ?></td>
			<td><?php echo $config->site_logo ?></td>
			<td><?php echo $config->email_contato ?></td>
			<td><?php echo $config->link_twitter ?></td>
			<td><?php echo $config->link_instagram ?></td>
			<td><?php echo $config->link_facebook ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('config/read/'.$config->),'Read'); 
				echo ' | '; 
				echo anchor(site_url('config/update/'.$config->),'Update'); 
				echo ' | '; 
				echo anchor(site_url('config/delete/'.$config->),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php     }     ?>
        </table>
