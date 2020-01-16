<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bulk Upload</title>
	<?php include 'header.php';
	include 'autologout.php';?>
</head>
<body>

<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-2">
			<?php include 'sidenav.php';?>
		</div>
		<div class="col-sm-10">
		<br/>
			<div class="row">
				<center>
					<div class="btn-group btn-group-justified" style="width: 95%;">
						<a href="<?php echo base_url('login_controller/uploadFile'); ?>" class="btn btn-info">Single file upload</a>
						<a class="btn btn-primary" href="<?php echo base_url('login_controller/Bulkupload'); ?>" >Bulk upload</a>
					</div>
				</center>
			</div>








		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>

