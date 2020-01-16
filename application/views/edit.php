<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit</title>
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

			function name: download_file
			<div style="color: wheat;">
			You are here : <a style="color: wheat;" data-toggle="tooltip" title="Go back" href="<?php echo base_url('Home/viewDocument')?>"> View Document </a>  > Details
			</div>
			<br/>
			<h4><a href="<?php echo base_url();?>Home/viewDocument"><span style="color: white";> Go Back </span><span style="color: white;" class="glyphicon glyphicon-triangle-left"></span></a></h4>
			<br/>
			<center>
			<h2><?php echo $_SESSION['file_name'];?></h2>
			</center>
			<br/>

		<table align="center" style="font-weight: bold;">

				<?php
			if (isset($user_data)) {
				foreach ($user_data->result() as $row) { ?>
			<tr height="30px">
				<td>Date Created</td>
				<td width="20px"> : </td>
				<td><?php echo $row->date_created;?></td>
				<td></td>
			</tr>
			<tr height="30px">
				<td>Category</td>
				<td> : </td>
				<td><?php echo $row->category;?></td>
			</tr>
			<tr height="30px">
				<td>Year</td>
				<td> : </td>
				<td><?php echo $row->year;?></td>
			</tr>
			<tr height="30px">
				<td>Semester</td>
				<td> : </td>
				<td><?php echo $row->semester;?></td>
			</tr>
			<tr height="30px">
				<td>Academic Year </td>
				<td> : </td>
				<td><?php echo $row->academic_year;?></td>
			</tr>
			<tr height="30px">
				<td>Subject Code</td>
				<td> : </td>
				<td><?php echo $row->subject_code;?></td>
			</tr>
			<tr height="30px">
				<td>Lecturer</td>
				<td> : </td>
				<td><?php echo $row->lecturer;?></td>
			</tr>
			<tr height="30px">
				<td>Document Type</td>
				<td> : </td>
				<td><?php echo str_replace('_',' ',$row->doc_type);?></td>
			</tr>
			<tr height="30px">
				<td>Author</td>
				<td> : </td>
				<td><?php echo $row->author;?></td>
			</tr>
			<tr height="30px">
				<td>Comment</td>
				<td> : </td>
				<td><?php echo $row->comment;?></td>
			</tr>

					<?php
				}
			}
				?>

		</table>

			<br/>

			<table align="center" width="400px">
				<tr>
					<td>
						<form method="post" action="<?php echo base_url();?>login_controller/download_file">
							<center>
								<button style="width: 100px;" class="btn btn-info" name="submit" value="<?php echo $_SESSION['file_name'];?>"><span class="glyphicon glyphicon-download-alt"></span> View</button>
							</center>
						</form>
					</td>
					<td>
						<?php
						if(($_SESSION['type']=='qac')||($_SESSION['type']=='head_of_institute')){
							?>
							<form method="post" action="<?php echo base_url();?>login_controller/download_file">
								<center>
									<button style="width: 100px;" class="btn btn-primary" name="edit" value="<?php echo $_SESSION['file_name'];?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
								</center>
							</form>
						<?php
						}else{
							?>
							<button style="width: 200px;" class="btn btn-primary" name="" value=""><span class="glyphicon glyphicon-edit"></span> Add Comment</button>
						<?php
						}
						?>

					</td>
					<td align="right">
						<?php
						if(($_SESSION['type']=='qac')||($_SESSION['type']=='head_of_institute')){
						?>
						<form method="post" action="<?php echo base_url();?>login_controller/download_file">
						<center>
							<button style="width: 100px;" class=" btn btn-danger"  name="delete" value="delete"><span class="glyphicon glyphicon-trash"></span> Delete</button>
						</center>
						</form>
							<?php
						}
						?>
					</td>
				</tr>
			</table>


		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>


