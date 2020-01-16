<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Delete confirm</title>
	<?php include 'header.php';
	include 'autologout.php';
	if($this->session->userdata('username') == ''){
		include 'index.php';
	}?>
</head>
<body>

<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-2">
			<?php include 'sidenav.php';?>
		</div>
		<div class="col-sm-10">
			<br/>

			<?php
			if($this->session->flashdata("msg")) {
				?>
				<div class="alert alert-success">
					<span class="text-success"> <?php echo $this->session->flashdata("msg"); ?></span>
				</div>
				<?php
			}else{
				?>
				<div class="alert alert-info">
					<span class="text-primary">jkkkk</span>
				</div>
			<?php
			}
			?>
		</div>
			<div class="col-sm-7">
			<?php
			$alphabet = '1234567890';
			$pass = array();
			$alphaLength = strlen($alphabet) - 1;
			for ($i = 0; $i < 5; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
//			echo implode($pass);
			?>
			<center>
				<form method="post" action="<?php echo base_url().'login_controller/send_request';?>">
					<?php if($_SESSION['type']=='qac'){
						?>
						<button style="width: 200px;" class=" btn btn-success" name="action" value="request_pin"> Request PIN</button>
						<?php
					} else{
						?>
						<button style="width: 200px;" class=" btn btn-success" name="action" value="request_pin"> Send PIN</button>
					<?php
					};?>

					<br/>
					<br/>
					<button style="width: 200px;" class=" btn btn-success" name="action" value="request_to_delete"> Request to Delete</button>
					<input type="text" class="hide" name="file_name" value="<?php echo $_SESSION['file_name'];?>">
					<input type="text" class="hide" name="pin" value="<?php echo implode($pass);?>">
				</form>
				<br/>
				<br/>
				<label>
					Enter PIN :
				</label>
				<input style="width: 200px;" type="text" class="form-control">
			</center>
			<br/>
			<br/>
			<br/>
			<center>
				<button style="width: 100px;" class=" btn btn-danger delete_data"  id="<?php $_SESSION['file_name'];?>"><span class="glyphicon glyphicon-trash"></span> Delete</button>
			</center>
		</div>
		<div class="col-sm-3">

			<?php
			foreach ($fetch_msg->result() as $row2) {
				foreach ($fetch_data->result() as $row) {
					if($_SESSION['type']=='qac'){
						if (($row->filename==$_SESSION['file_name'])&&(($row2->receiver=='to_qac'))){
							?>
							<label>Received PIN :</label>
							<input type="text" value="<?php echo $row->code ;?>"  style="width: 200px; color: gray;" class="form-control" readonly>
							<?php
						}
					}

				}
			}
			?>


		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>

<script>
    $(document).ready(function(){
        $('.delete_data').click(function () {
            var id = $(this).attr("id");
            if (confirm("Are you sure, You want to delete this document ")) {
                window.location = "<?php echo base_url(); ?>login_controller/delete_uploaded_file";
            } else {
                return false;
            }
        });
    });
</script>
