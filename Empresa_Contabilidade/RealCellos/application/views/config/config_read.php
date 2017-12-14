<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Config Read</h2>
        <table class="table">
	    <tr><td>Site Logo</td><td><?php echo $site_logo; ?></td></tr>
	    <tr><td>Email Contato</td><td><?php echo $email_contato; ?></td></tr>
	    <tr><td>Link Twitter</td><td><?php echo $link_twitter; ?></td></tr>
	    <tr><td>Link Instagram</td><td><?php echo $link_instagram; ?></td></tr>
	    <tr><td>Link Facebook</td><td><?php echo $link_facebook; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('config') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>