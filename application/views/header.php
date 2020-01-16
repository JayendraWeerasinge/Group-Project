<?php

$actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$url= basename($actual_link);

?>
<link rel="icon" href="<?php echo base_url(); ?>/public/img/MR2.png" type="image/gif" sizes="16x16">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<link href="<?php echo base_url(); ?>/public/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>/public/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/mrdoc.css">
<style>

</style>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header" >
			<a class="navbar-brand" style="color: white;font-size: 30px;"><b>MrDoc</b></a>
		</div>
		<ul class="nav navbar-nav" >
			<li class="<?php if($url == "index"){echo 'active';} ?>"><a href="<?php echo site_url('Home/index');?>" style="color: white">Home</a></li>
			<li class="<?php if($url == "USG"){echo 'active';} ?>"><a href="<?php echo site_url('Home/USG');?>" style="color: white">User Guide</a></li>
			<li class="<?php if($url == "Contacts"){echo 'active';} ?>"><a href="<?php echo site_url('Home/Contacts');?>" style="color: white" >Contacts</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">



			<li>
				<?php
				if ($this->session->userdata('username') != ''){
					?>
					<a class="navbar-brand" style="color:#f8fff4; font-size:1.6rem;">
						<span class="glyphicon glyphicon-user"></span>
						<?php
						echo "<span style='color: #818182'>";
						//echo ' Logged as ';
						echo "</span>";
						// display user name on the header
						echo $this->session->userdata('username');
						?>
					</a>
					<?php
				}else{?>
				<a href="<?php echo site_url('login_controller/login');?>"name="submit" value="submit"  style="color:mediumturquoise;">
					<?php
					if(($this->session->userdata('username') == '')&&($url=="login")){
						echo '';
					}else{
						?>
						<span class="glyphicon glyphicon-log-in"></span>
					<?php
						echo ' Login ';
					}

					}?></a>
			</li>
			<li><a href="<?php echo site_url('login_controller/logout');?>"name="submit" value="submit"  style="color:mediumturquoise;">
					<?php

					if ($this->session->userdata('username') != ''){
						?><span class="glyphicon glyphicon-log-out" ></span><?php
						//display logout button after logging
						echo ' Log Out';
					}else{
						echo '';
					}?></a>
			</li>

		</ul>
	</div>

</nav>
