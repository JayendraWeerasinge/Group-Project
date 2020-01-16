<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contacts</title>
	<?php include 'header.php';
	include 'autologout.php';?>
</head>
<body>

<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-2 ">
			<?php
			if ($this->session->userdata('username') != ''){
				include 'sidenav.php';
			}else{ ?>
				<?php
			}?>
		</div>
		<div class="col-sm-10">

			<!--- type heare---------->

			Contacts
			<br/><?php
			echo  $_SESSION['Rpin'];
			?>
<br>

















		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>
