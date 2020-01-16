
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Settings</title>
	<?php
	include 'autologout.php';
	include 'header.php';
	if($this->session->userdata('username') == ''){
		include 'index.php';
	}
	?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
			if($this->session->flashdata('msg')){
				?>
				<div class="alert alert-success">
					<span class="text-success"> <?php echo $this->session->flashdata('msg'); ?></span>
				</div>
				<?php
			}
			?>
			<div class="container" style="margin-left:auto; width: 500px ">
				<div class="row">
					<div class="col-4">
			<form method="post" action="<?php echo base_url(); ?>login_controller/user_account_update_validation">

				<div class="form">
					<hr/>
					<span class="form container" style="color: midnightblue;"><h1><center>Change User Name and Password</center></h1></span>
					<?php
					if (isset($user_data)){
					foreach ($user_data->result() as $row){ ?>

					<div class="form-group">
						<label for="type">Type</label>
						<input style="color: #0f18d1;"  type="text" class="form-control" name="type" id="type" value="<?php echo strtoupper(str_ireplace('_',' ',$row->type));?>" readonly>
					</div>
					<div class="form-group">
						<label for="post">Post</label>
						<input style="color: #0f18d1;"  type="text" class="form-control" name="post" id="post" value="<?php echo strtoupper(str_ireplace('_',' ',$row->post));?>" readonly>
					</div>
					<?php
					if($_SESSION['post']=="course_coordinator"){
						?>
						<div class="form-group">
							<label for="post">Course</label>
							<input style="color: #0f18d1;"  type="text" class="form-control" name="post" id="post" value="<?php echo strtoupper(str_ireplace('_',' ',$row->course_name));?>" readonly>
						</div>
					<?php
					}
					?>
					<div class="form-group">
						<label for="username">Username</label>
						<input style="color: #0f18d1;" type="text" class="form-control" id="username" name="username" value="<?php echo $row->username;?>" readonly/>
						<span class="text-danger"><?php echo form_error('username') ?></span>
					</div>
<!--					<div class="form-group">-->
<!--						<label for="text">Current Password</label>-->
						<input style="color: #0f18d1;" class="hide" type="password" class="form-control" name="cpassword" id="password3" placeholder="Enter password" value="<?php echo $row->password;?>">
<!--						<span toggle="#password3" class="fa fa-fw fa-eye field-icon toggle-password"></span>-->
<!--					</div>-->
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Enter E-mail" value="<?php echo $row->email;?>" />
						<span class="text-danger"><?php echo form_error('email') ?></span>
					</div>
					<div class="form-group">
						<label for="password">New Password / Current Password</label>
						<input type="password" class="form-control" name="password" id="password2" placeholder="Enter password"/>
						<span toggle="#password2" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						<span class="text-danger"><?php echo form_error('password') ?></span>
					</div>

					<div class="form-group">
						<label for="password">Confirm Password</label>
						<input type="password" class="form-control" name="conpass" id="password1" placeholder="Re-enter password"/>
						<span toggle="#password1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						<span class="text-danger"><?php echo form_error('conpass') ?></span>
					</div>


					<center><button type="submit" class="btn btn-primary" name="update" value="Update">Update</button><center>
							<hr/>
							<span class="text-danger"> <?php echo $this->session->flashdata("error") ?></span>
				</div>
				<?php
				}
				}
				?>
			</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>
<script>
    $(document).ready(function(){

        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>
