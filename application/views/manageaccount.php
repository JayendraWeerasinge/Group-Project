<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Account</title>
	<?php include 'header.php';
	include 'autologout.php';?>

</head>
<body>
<div class="container-fluid ">
	<div class="row content">
		<div class="col-sm-2 ">
			<!-- content -->
			<nav>
				<div class="row content">
					<div class="sidenav hidden-xs">
                        <h2 style="color: mediumturquoise;"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</h2>
						<ul class="nav nav-pills nav-stacked">
							<li><a href="<?php echo base_url('Home/index')?>"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span> Home</a></li>
							<li><a href="<?php echo base_url('Home/viewDocument')?>">View Document <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search"></span></a></li>
							<?php
							if(($this->session->userdata('type')!='head_of_institute')){
								?>
								<li><a href="<?php echo base_url();?>login_controller/uploadFile"> Upload Document<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-upload"></span></a></li>
								<?php
							}
							?>

							<li class="active"><a href="<?php echo base_url();?>login_controller/manageAccount">Manage Accounts<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
								<?php
								if(($this->session->userdata('type')!='head_of_institute')){
								?>
							<li><a href="<?php echo base_url()?>login_controller/Document_Settings"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span> Document Settings</a></li>
						<?php
						}
							if(($this->session->userdata('type')=='head_of_institute')||($this->session->userdata('type')=='qac_head')||($this->session->userdata('type')=='qac')){
								?>
								<li><a href="<?php echo base_url()?>login_controller/Report"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-folder-open"></span> Report (Posts)</a></li>
								<?php
							}
							?>
							<li class="<?php if($url == "useraccountupdate"){echo 'active';} ?>"><a href="<?php echo base_url();?>login_controller/useraccountupdate"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-wrench"></span>My profile</a></li>
							<li><a href="<?php echo base_url();?>login_controller/send_message"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-comment"></span>Message</a></li>
							<?php
							if($this->session->userdata('post')=='qac_head') {
								?>
								<li><a href="<?php echo base_url(); ?>Home/BackUp"><span style="font-size:16px;"
																						 class="pull-right hidden-xs showopacity glyphicon glyphicon-cloud-upload"></span>Backup</a>
								</li>
								<?php
							}
							?>
						</ul><br>
					</div>
				</div>
			</nav>
		</div>
		<div class="col-sm-10 text-left">
			<!-- content -->
			<br/>


            <div class="row">
            <center>
			<div class="btn-group btn-group-justified" style="width: 95%;">

				<?php
				if($_SESSION['type']=='head_of_institute'){
					?>
					<?php
				}else{
					?>
					<a class="btn btn-primary">Admin Settings</a>
					<a href="<?php echo base_url('login_controller/userForm'); ?>" class="btn btn-info">Create User Accounts</a>
				<?php
				}
				?>
			</div>
            </center>
            </div>
			<br/>
			<?php
			if($this->session->flashdata('msg')){
				?>
				<div class="alert alert-danger">
					<span class="text-danger"> <?php echo $this->session->flashdata('msg'); ?></span>
				</div>
				<?php
			}if($this->session->flashdata('msg1')){
				?>
				<div class="alert alert-success">
					<span class="text-success"> <?php echo $this->session->flashdata('msg1'); ?></span>
				</div>
				<?php
			}
			?>

			<?php
			if($_SESSION['type']=='head_of_institute'){
				?>
				<h1>User Accounts</h1>
				<?php
			}else{
				?>
				<h1>User Accounts and Passwords</h1>
				<?php
			}
			?>
			<br>
			<?php
			$count=0;
			if ($fetch_data->num_rows() > 0) {
				foreach ($fetch_data->result() as $row) {
					$count=$count+1;
				}
			}
			?>
			<span align="right"><b>Total number of Accounts - <?php echo $count;?></b></span>

			<!-- search -->

			<span class="text-danger"> <?php echo $this->session->flashdata("check_availability");?></span>
            <div class="container ">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" style="height: 50px;">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Search by User Name, Email, Type or Post" class="form-control" style="width: 450px;" />
                    </div>
                </div>
				<br/>
				<div id="result"></div>
            </div>
            <div style="clear:both"></div>
		</div>
	</div>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>


<script>

    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"<?php echo base_url(); ?>live_search/manageAccount",
                method:"POST",
                data:{query:query},
                success:function(data){

                    $('#result').html(data);

                }
            })
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });

    });
</script>


