<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Report</title>
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

			<h1 style="color: midnightblue;">......... Summary .........</h1>
			<?php
			if($this->session->flashdata('msg1')){
				?>
				<div class="alert alert-success">
					<span class="text-success"> <?php echo $this->session->flashdata('msg1'); ?></span>
				</div>
				<?php
			}
			?>
			<div class="col-sm-9">
			<div class="container ">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon" style="height: 50px;">Search</span>
						<input type="text" name="search_text" id="search_text" placeholder="Search by User name or Post" class="form-control" style="width: 450px;" />
					</div>
					<br/>
				</div>
				<div style="width: 75%;">
					<div id="result"></div>
				</div>

			</div>
			<div style="clear:both"></div>
			</div>
			<div class="col-sm-3">
				<?php

				$count_qac=0;
				$count_lec_ug=0;
				$count_ug=0;
				$count_lec_pg=0;
				$count_pg=0;
				$count_lec_eg=0;
				$count_eg=0;
				$count_files=0;
				$count_cat_un=0;
				$count_cat_ex=0;
				$count_cat_pg=0;
				$count=0;
					foreach ($count_file->result() as $row) {
						$count_files=$count_files+1;
					}

					foreach ($fetch_data_un->result() as $row) {
						$count_cat_un=$count_cat_un+1;
					}

					foreach ($fetch_data_pg->result() as $row) {
						$count_cat_pg=$count_cat_pg+1;
					}

					foreach ($fetch_data_ex->result() as $row) {
						$count_cat_ex=$count_cat_ex+1;
					}

					foreach ($count_data->result() as $row) {
						$count=$count+1;
						if(($row->type)=='qac'){
							$count_qac=$count_qac+1;
						}elseif ((($row->post)=='lecturer')&&(($row->type)=='under_graduate')){
							$count_lec_ug=$count_lec_ug+1;
						}elseif ((($row->post)=='lecturer')&&(($row->type)=='post_graduate')){
							$count_lec_pg=$count_lec_pg+1;
						}elseif ((($row->post)=='lecturer')&&(($row->type)=='external')){
							$count_lec_eg=$count_lec_eg+1;
						}if(($row->type)=='under_graduate'){
							$count_ug=$count_ug+1;
						}elseif (($row->type)=='post_graduate'){
							$count_pg=$count_pg+1;
						}elseif (($row->type)=='external'){
							$count_eg=$count_eg+1;
						}


				}
				?>
				<br/>
				<br/>
				<br/>
				<div class="panel panel-default">
					<div class="panel-heading"><b>Number of Accounts</b></div>
						<div class="panel-body">
							<br/>
							<b>
							<span style="color: #3f53c3;" >==============================</span><br/>
							QAC Accounts -	<?php echo $count_qac;?>	 <br/>
							Undergraduate Accounts -	<?php echo $count_ug;?>	 <br/>
							Postgraduate Accounts -	<?php echo $count_pg;?>	 <br/>
							External Accounts -	<?php echo $count_eg;?>	 <br/>
							<span style="color: #3f53c3;" >==============================</span><br/>
							Under Graduate lecturers -	<?php echo $count_lec_ug;?> <br/>
							Post Graduate lecturers -	<?php echo $count_lec_pg;?><br/>
							External lecturers -		<?php echo $count_lec_eg;?> <br/>
							<span style="color: #3f53c3;" >==============================</span><br/>
							Undergraduate courses -		<?php echo $count_cat_un;?> <br/>
							Postgraduate courses -		<?php echo $count_cat_pg;?> <br/>
							External courses -		<?php echo $count_cat_ex;?> <br/>
							<span style="color: #3f53c3;" >==============================</span><br/>
							Total files uploaded -		<?php echo $count_files;?> <br/>
							Total user accounts -		<?php echo $count;?> <br/>
							<span style="color: #3f53c3;" >==============================</span><br/>
							<br/></b>
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

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"<?php echo base_url(); ?>live_search/makereport",
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
