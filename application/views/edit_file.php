<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Document</title>
	<?php include 'header.php';
	include 'autologout.php';
	if($this->session->userdata('username') == ''){
		include 'index.php';
	}?>
</head>
<body>

<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-12">

			<br/>
			<div style="color: wheat;">
				You are here : <a style="color: wheat;" data-toggle="tooltip" title="Go back" href="<?php echo base_url('Home/viewDocument')?>"> View Document </a>  >
				<a style="color: wheat;" data-toggle="tooltip" title="Go back" href="<?php echo base_url('login_controller/reopen_editFile')?>"> Details </a> > Edit
			</div>
			<br/>
			<h4><a href="<?php echo base_url()?>login_controller/reopen_editFile"><span style="color: white";> Go Back </span><span style="color: white;" class="glyphicon glyphicon-triangle-left"></span></a></h4>

			<br/>
			<center>
				<h2><?php echo $_SESSION['file_name']?></h2>
			</center>

			<br/>



			<div class="container" style="margin-left:auto; width: 600px ">
				<div class="form">
			<form method="post" action="<?php echo base_url();?>login_controller/#">
				<?php

				foreach ($fetch_data->result() as $row) {
					if($row->file_name==$_SESSION['file_name']){
					?>
					<div class="form-group">
						<label>Course Type</label>
						<input type="text" name="doc_type" class="form-control" style="color: midnightblue;" value="<?php echo str_replace('_',' ',strtoupper($row->doc_type));?>" readonly>
					</div>
					<div class="form-group">
						<label>Category</label>
						<input type="text" name="category" class="form-control" style="color: midnightblue;" value="<?php echo  str_replace('_',' ',strtoupper($row->category));?>" readonly>
					</div>
					<div class="form-group">
						<label>Year</label>
						<input type="text" name="year" class="form-control" style="color: midnightblue;" value="<?php echo $row->year;?>" readonly>
					</div>
					<div class="form-group">
						<label>Semester</label>
						<input type="text" name="semester" class="form-control" style="color: midnightblue;" value="<?php echo$row->semester;?>" readonly>
					</div>
						<div class="form-group">
						<label>Subject Code</label>
						<input type="text" name="subject_code" class="form-control" value="<?php echo$row->subject_code;?>">
					</div>
					<div class="form-group">
						<label>Academic Year</label>
						<input type="text" name="academic_year" class="form-control" value="<?php echo $row->academic_year;?>">
					</div>
					<div class="form-group">
						<label>Lecturer</label>
						<input type="text" name="lecturer" class="form-control" value="<?php echo $row->lecturer;?>">
					</div>
					<div class="form-group">
						<label for="username">Comment</label>
						<textarea rows="5" cols="50" class="form-control" id="comment" name="comment"><?php echo $row->comment;?></textarea>
					</div>
					<?php
				}

				}

				?>


				<br/>
				<center><input type="submit" class="btn btn-primary" value="Update" /></center>

				</form>
					</div>
			</div>



		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>


