<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $_SESSION['pg']; ?> Details</title>
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

			<?php

			$count=0;
			if ($fetch_data->num_rows() > 0) {
				foreach ($fetch_data->result() as $row) {
					$count=$count+1;
				}
			}
			?>
			<br/>

			<div style="color: wheat;">
				You are here : Document Settings ><a style="color: wheat;" data-toggle="tooltip" title="Go back" href="<?php echo base_url('login_controller/Post_Graduate')?>"> Post Graduate </a> > View
			</div>



			<h1 style="color: midnightblue;"><?php
				$catName=str_replace('_', ' ', $_SESSION['pg']);
				echo strtoupper($catName); ?>
				(<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updatecat"><span class="glyphicon glyphicon-pencil"></span></button>)
			</h1>

			<div class="modal fade" id="updatecat" role="dialog">
				<div class="modal-dialog">

					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Update Category Name</h4>
						</div>
						<div class="modal-body">
							<form method="post" action="<?php echo base_url();?>login_controller/category_update_postgraduate">
								<div class="form-group">
									<input type="text" class="form-control" id="<?php echo $_SESSION['pg'];?>" name="category" value="<?php echo strtoupper($catName); ?>"/>
									<span class="text-danger"><?php echo form_error('category')?></span>
									<input type="text" class="hide" value="<?php echo strtoupper($catName); ?>" name="hide" id="<?php echo strtoupper($catName); ?>">
									<br/>
									<center>
										<button class="btn btn-primary" name="Submit" type="submit" value="submit">Update</button>
									</center>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>

				</div>
			</div>
			<h4><a href="<?php echo base_url()?>login_controller/Post_Graduate"><span style="color: white;"> Go Back </span><span style="color: white;" class="glyphicon glyphicon-triangle-left"></span></a></h4>

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

			<br/>
			<span align="right"><b>Total <u><?php echo strtoupper($catName)?></u> Subjects - <?php echo $count;?></b></span>

			<div class="container ">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon" style="height: 50px;">Search</span>
						<input type="text" name="search_text" id="search_text" placeholder="Search by Subject code or Subject Name" class="form-control" style="width: 450px;" />
					</div>
					<br/>
					<button type="button" class="btn btn-success " data-toggle="modal" data-target="#addSubjects">Add Subjects</button>
				</div>

				<div id="result"></div>
			</div>
			<div style="clear:both"></div>
			<?php
			for($i=0;$i<7;$i++){
				echo '<br/>';
			}
			?>



		</div>
		<div class="col-sm-10">
			<div class="container">
				<div align="right">
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete This Category</button>
				</div>
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">

						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Delete</h4>
							</div>
							<div class="modal-body">

								<p>
									click here to delete.
									<a href="#" class="delete_data " id="<?php $_SESSION['pg']; ?>">Delete</a></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!--Add Subject----------------------------------------------------------------------------------------------------------------------------------->
		<div class="container">

			<div class="modal fade" id="addSubjects" role="dialog">
				<div class="modal-dialog">

					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add Subject</h4>
						</div>
						<div class="modal-body">
							<form method="post" action="<?php echo base_url();?>login_controller/add_subjects_cat_post_graduate">

								<div class="form-group">
									<label for="username">Subject Name</label>
									<input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Enter Subject Name"/>
									<span class="text-danger"><?php echo form_error('subject_name')?></span>
								</div>
								<div class="form-group">
									<label for="username">Subject Code</label>
									<input type="text" class="form-control" id="subject_code" name="subject_code" placeholder="Enter Subject Code"/>
									<span class="text-danger"><?php echo form_error('subject_code')?></span>
								</div>
								<div class="form-group">
									<label for="username">Year</label>
									<select class="form-control" name="year">
										<option class="text-muted"></option>
										<option name="year" value="1">1st year</option>
										<option name="year" value="2">2nd year</option>
										<option name="year" value="3">3rd year</option>
										<option name="year" value="4">4th year</option>
									</select>
									<span class="text-danger"><?php echo form_error('year')?></span>
								</div>
								<div class="form-group">
									<label for="username">Semester</label>
									<select class="form-control" name="semester">
										<option class="text-muted"></option>
										<option name="semester" value="1sem">1st semester</option>
										<option name="semester" value="2sem">2nd semester</option>
									</select>
									<span class="text-danger"><?php echo form_error('semester')?></span>
								</div>

								<input type="text" class="hide" value="<?php echo $_SESSION['pg']; ?>" name="category" id="<?php echo $_SESSION['pg']; ?>">
								<center>
									<button style="width: 100px;" class="btn btn-primary" name="Submit" type="submit" value="submit">Add</button>
								</center>

							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!--Add Subject close----------------------------------------->
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
                url:"<?php echo base_url(); ?>live_search/fetchsubject_post_graduate",
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

        $('.delete_data').click(function () {
            var id = $(this).attr("id");
            if (confirm("Warning! \n If you delete this category your all data in this category will be lost. You can't undo \n \nAre you sure, You want to delete this Category ")) {
                window.location = "<?php echo base_url(); ?>login_controller/delete_cat_postgraduate/" + id;
            } else {
                return false;
            }

        })

    });
</script>


