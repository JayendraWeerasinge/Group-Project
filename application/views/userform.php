<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Settings</title>
	<?php include 'header.php';
	include 'autologout.php';
	if($this->session->userdata('username') == ''){
		include 'index.php';
	}?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

<?php
$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = array();
$alphaLength = strlen($alphabet) - 1;
for ($i = 0; $i < 8; $i++) {
	$n = rand(0, $alphaLength);
	$pass[] = $alphabet[$n];
}
//echo implode($pass);
?>

<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-2">
			<?php include 'sidenav.php'; ?>
		</div>
		<div class="col-sm-10">
			<br/>
			<div class="row">
				<center>
					<div class="btn-group btn-group-justified " style="width: 95%;">
						<a href="<?php echo base_url('login_controller/manageAccount'); ?>" class="btn btn-info">Admin
							Settings</a>
						<span class="btn btn-primary">Create User Accounts</span>
					</div>
				</center>
			</div>
			<br/>
			commented on mail function
			<?php
			if($this->session->flashdata("msg")){
				?>
				<div class="alert alert-danger">
					<span class="text-danger"> <?php echo $this->session->flashdata("msg");?></span>
				</div>
			<?php
			}elseif ($this->session->flashdata("msg1")){
				?>
				<div class="alert alert-success">
					<span class="text-success"> <?php echo $this->session->flashdata("msg1");?></span>
				</div>
				<?php
			}
			?>

			<span style="size: 13px;" class="text-danger bg-danger"> <?php echo $this->session->flashdata("error");?></span>

			<div class="container" style="margin-left:auto; width: 500px ">
			<form method="post" action="<?php echo base_url(); ?>login_controller/user_Create_validation">
				<div class="form">
					<hr>
					<span class="form " style="color: midnightblue;"><h2><center>Create User Account</center></h2></span>
					<div class="form-group">
						<label for="username">Type</label>
						<select class="form-control" name="type" id="a_type">
							<option class="text-muted"></option>
							<option name="type" value="under_graduate">Under Graduate</option>
							<option name="type" value="post_graduate">Post Graduate</option>
							<option name="type" value="external">External</option>
							<option name="type" value="qac">QAC</option>
							<option name="type" value="head_of_institute">Head of institute</option>
						</select>
						<span class="text-danger"><?php echo form_error('type')?></span>
					</div>
					<div class="form-group">
						<label for="username">Post</label>
						<select class="form-control" name="post" id="a_post">
							<option class="text-muted"></option>
						</select>
						<span class="text-danger"><?php echo form_error('post')?></span>
					</div>
					<div class="form-group">
						<label >Course</label>
						<select class="form-control" name="course_name" id="cat4dropdown">
						</select>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username"
							   placeholder="Enter username"/>
						<span class="text-danger"><?php echo form_error('username') ?></span>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input style="color:midnightblue; " type="password" class="form-control" name="password" id="password" value="<?php echo implode($pass);?>" readonly >
						<span class="text-danger"><?php echo form_error('password') ?></span>
						<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style="color: midnightblue;"></span>
					</div>

					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" name="email" id="email"
							   placeholder="Enter E-mail"/>
						<span class="text-danger"><?php echo form_error('email') ?></span>
					</div>
					<br/>
					<center>
						<button type="submit" class="btn btn-primary" name="insert" value="Login">
							Create
						</button>
					</center>
					<hr>
					<span class="text-danger"> <?php echo $this->session->flashdata("error") ?></span>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>


<script>
    $(document).ready(function(){
         $('#a_type').change(function(){
			 var a_type = $('#a_type').val();
			if(a_type == 'head_of_institute')
			 {
				 $.ajax({
					 url:"",
					 method:"POST",
					 data:{a_type:a_type},
					 success:function(data)
					 {
						 $('#a_post').html('<option value="head_of_institute">Head of institute</option>');
					 }
				 });
			 }
			 if(a_type == 'qac')
			 {
				 $.ajax({
					 url:"",
					 method:"POST",
					 data:{a_type:a_type},
					 success:function(data)
					 {
						 $('#a_post').html('<option value="qac">QAC</option>');
					 }
				 });
			 }
			 if((a_type != 'qac') && (a_type != 'head_of_institute'))
			 {
				 $.ajax({
					 url:"",
					 method:"POST",
					 data:{a_type:a_type},
					 success:function(data)
					 {
						 $('#a_post').html('<option value=""></option>' +
							 '<option name="post" value="lecturer">lecturer</option>' +
							 '<option name="post" value="head_of_course">Head of Course</option>' +
							 '<option name="post" value="course_coordinator">Course Coordinator</option>');
					 }
				 });
			 }
		 });

        $('#a_type').change(function(){
            var account_type = $('#a_type').val();
            if((account_type == 'under_graduate')||(account_type == 'post_graduate')||(account_type == 'external'))
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>login_controller/fetch_category_TYPE",
                    method:"POST",
                    data:{account_type:account_type},
                    success:function(data)
                    {
                        $('#cat4dropdown').html(data);
                    }
                });
            }else {
                $('#cat4dropdown').html('<option value="">This is unnecessary for this post</option>');
			}
        });

        $('#a_post').change(function(){
            var a_post = $('#a_post').val();
            var account_type = $('#a_type').val();
            if((a_post == 'course_coordinator'))
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>login_controller/fetch_category_TYPE",
                    method:"POST",
                    data:{account_type:account_type},
                    success:function(data)
                    {
                        $('#cat4dropdown').html(data);
                    }
                });
            }else {
                $('#cat4dropdown').html('<option value="">This is unnecessary for this post</option>');

            }
        });

    });

    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

</script>
