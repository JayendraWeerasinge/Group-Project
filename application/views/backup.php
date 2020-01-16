<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Backup</title>
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

			if($this->session->flashdata('msg')){
				?>
			<div class="alert alert-danger">
				<span class="text-danger"> <?php echo $this->session->flashdata('msg'); ?></span>
			</div>
			<?php
			}elseif ($this->session->flashdata('msgx')){
			?>
			<div class="alert alert-info">
				<span class="text-info"> <?php echo $this->session->flashdata('msgx'); ?></span>
			</div>
			<?php
			}elseif($this->session->flashdata('msg1')){
			?>
			<div class="alert alert-success">
				<span class="text-success"> <?php echo $this->session->flashdata('msg1'); ?></span>
			</div>
			<?php
			}
			?><br/>
			<font style="color: whitesmoke; font-size: 20px;"><b>Auto Backup : </b></font>


			<?php
			if($_SESSION['action'] == 'true'){
				$checked='checked';
			}elseif($_SESSION['action'] == 'false'){
				$checked='';
			}else{
				$checked='';
			}
			?>
				<label class="switch">
					<input type="checkbox" id="togBtn" name="action" <?php echo $checked;?>>
					<span class="slider round"></span>
				</label>

			<br/>
			<br/>

		<form method="post" action="<?php echo base_url().'login_controller/db_backup';?>">
			<font style="color: whitesmoke; font-size: 20px;"><b>Manual Backup : </b></font>
			<button class="btn btn-primary" name="submit" value="Submit">backup</button>
		</form>


			<div class="container ">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon" style="height: 50px;">Search</span>
						<input type="text" name="search_text" id="search_text" placeholder="Search..." class="form-control" style="width: 350px;" />
					</div>
				</div>
				<br/>
				<div style="width: 37%; font-size: 13px;" id="result"></div>
			</div>
			<div style="clear:both"></div>




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
                url:"<?php echo base_url(); ?>live_search/Fetch_backup",
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

        // var switchStatus = false;
        $("#togBtn").on('change', function() {
            if ($(this).is(':checked')) {
                switchStatus = $(this).is(':checked');
                var action='true';
                alert('Auto update activate ');
                $.ajax({
                    url:"<?php echo base_url(); ?>login_controller/check_action",
                    method:"POST",
                    data:{action:action},
                });
            }
            else {
                switchStatus = $(this).is(':checked');
                var action='false';
                alert('Auto update deactivate');
                $.ajax({
                    url:"<?php echo base_url(); ?>login_controller/check_action",
                    method:"POST",
                    data:{action:action},
                });
            }
        });

    });
</script>
