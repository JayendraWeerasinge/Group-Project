<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Account</title>
    <?php include 'header.php';
    include 'autologout.php';
	if($this->session->userdata('username') == ''){
		include 'index.php';
	}?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

<div class="container-fluid">
    <div class="row content">
        <br/>
        <br/>

        <div class="col-sm-1">
			<?php
			if($_SESSION['report']=="report"){
				?>
				<h4><a href="<?php echo base_url()?>login_controller/Report"><span style="color: white";> Go Back </span><span style="color: white;" class="glyphicon glyphicon-triangle-left"></span></a></h4>
				<?php
			}else{
				?>
				<h4><a href="<?php echo base_url()?>login_controller/manageAccount"><span style="color: white";> Go Back </span><span style="color: white;" class="glyphicon glyphicon-triangle-left"></span></a></h4>
				<?php
			}
			?>
           </div>
        <div class="col-sm-10">


			<?php
			if(form_error('Message')||form_error('subject')){
				?>
				<div class="alert alert-danger">
					<span class="text-danger"><?php echo form_error('Message');?></span>
					<span class="text-danger"><?php echo form_error('subject');?></span>
				</div>
				<?php
			}
			if(form_error('pw')){
				?>
				<div class="alert alert-danger">
					<span class="text-danger"> <?php echo form_error('pw');?> </span>
				</div>
				<?php
			}elseif (form_error('confirm_pw')){
				?>
				<div class="alert alert-danger">
					<span class="text-danger"> <?php echo form_error('confirm_pw'); ?></span>
				</div>
				<?php
			}
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
            <hr>
            <h2 style="color: midnightblue;" ><center>Edit</center></h2>

            <div class="container" style="margin-left:auto; width: 500px ">

                <div class="row">
                    <div class="col-4 ">
                        <form method="post" action="<?php echo base_url();?>login_controller/update_and_delete_user_accounts">

                                <br/>
							<?php
							if(($_SESSION['post']=='qac')){
							?>
								<div class="form-group">
									<label for="type">Type</label>
									<input style="color: black;" type="text" class="form-control" name="type" id="type" value="<?php echo strtoupper(str_replace('_', ' ', $_SESSION['account_type']));?>" readonly>
								</div>
								<div class="form-group">
									<label for="type">Post</label>
									<?php
									if(($_SESSION['account_post']=='head_of_institute')||($_SESSION['account_post']=='qac_head')){
										?>
										<input style="color: black;" type="text" class="form-control" name="post" id="post" value="<?php echo strtoupper(str_replace('_', ' ', $_SESSION['account_post']));?>" readonly>
										<?php
									}else{
										?>
										<table>
											<tr>
												<td width="390px">
													<input style="color: black;" type="text" class="form-control" name="post" id="post" value="<?php echo strtoupper(str_replace('_', ' ', $_SESSION['account_post']));?>" readonly>

												</td>
												<td width="110px" align="right">
													<?php
													if(($_SESSION['account_post']=='qac_head')||($_SESSION['account_post']=='qac')){
														?>
														<button type="button" style="width: 105px;" class="btn btn-success disabled" data-toggle="modal" data-target="#update_post">change post</button>
														<?php
													}else{
														?>
														<button type="button" style="width: 105px;" class="btn btn-success" data-toggle="modal" data-target="#update_post">change post</button>
														<?php
													}
													?>
												</td>
											</tr>
										</table>

										<?php
									}
									?>

								</div>
								<?php
								if( $_SESSION['account_post']=='course_coordinator'){
									?>
									<div class="form-group">
										<label for="username">Course</label>

										<table>
											<tr>
												<td width="390px">
													<input type="text" style="color: black;" class="form-control " id="course_name" name="course_name" value="<?php echo strtoupper($_SESSION['course_name']);?>" readonly >
												</td>
												<td width="110px" align="right">
													<?php
													if($_SESSION['account_post']!='qac_head'){
														if($_SESSION['course_name']!=''){
															?>
															<button type="button" style="width: 105px;" class="btn btn-success" data-toggle="modal" data-target="#edit_course">Edit Course</button>
															<?php
														}else{
															?>
															<button type="button" style="width: 105px;" class="btn btn-warning" data-toggle="modal" data-target="#edit_course">Add Course</button>
															<?php
														}
														?>
														<?php
													}
													?>
												</td>
											</tr>
										</table>
										<span class="text-danger"><?php echo form_error('')?></span>
									</div>
									<?php
								}
								?>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['account_username'];?>" >
                                    <span class="text-danger"><?php echo form_error('username')?></span>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['account_email'];?>" >
                                    <span class="text-danger"><?php echo form_error('email')?></span>
                                </div>
							<?php
							if ((( $_SESSION['account_type']!='qac')&&($_SESSION['account_type']!='head_of_institute'))){
							?>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" >
									<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<span class="text-danger"><?php echo form_error('password')?></span>
								</div>
								<div class="form-group">
									<label for="con_password">Confirm Password</label>
									<input type="password" class="form-control" name="con_password" id="con_password" >
									<span toggle="#con_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<span class="text-danger"><?php echo form_error('con_password')?></span>
								</div>

							<?php
							}elseif ((( $_SESSION['account_type']!='qac')&&($this->session->userdata('username')!=$_SESSION['account_username']))){
								?>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" >
									<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<span class="text-danger"><?php echo form_error('password')?></span>
								</div>
								<div class="form-group">
									<label for="con_password">Confirm Password</label>
									<input type="password" class="form-control" name="con_password" id="con_password" >
									<span toggle="#con_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<span class="text-danger"><?php echo form_error('con_password')?></span>
								</div>
								<?php
							}elseif (($this->session->userdata('username')==$_SESSION['account_username'])){
								?>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" >
									<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<span class="text-danger"><?php echo form_error('password')?></span>
								</div>
								<div class="form-group">
									<label for="con_password">Confirm Password</label>
									<input type="password" class="form-control" name="con_password" id="con_password" >
									<span toggle="#con_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<span class="text-danger"><?php echo form_error('con_password')?></span>
								</div>
								<?php
							}else{
								?>
								<br/>
								<center>
									<h4 class="text-danger">You cant edit or delete this profile. Contact <?php if($_SESSION['account_post']=='qac_head'){

										}else{
											echo ' <a data-toggle="modal" data-target="#send_massage" id="1">'. $_SESSION['account_username'] .'</a> or ';
										}
										?><a data-toggle="modal" data-target="#send_massage_qac" id="2">QAC Head</a></h4>
								</center>
							<?php
							}
							}elseif ($_SESSION['post']=='qac_head'){
								?>
								<div class="form-group">
									<label for="type">Current Type</label>
									<input style="color: black;" type="text" class="form-control" name="type" id="type" value="<?php echo strtoupper(str_replace('_', ' ', $_SESSION['account_type']));?>" readonly>
								</div>
								<div class="form-group">
									<label for="type">Current Post</label>
								<table>
									<tr>
										<td width="390px">
												<input style="color: black;" type="text" class="form-control" name="post" id="post" value="<?php echo strtoupper(str_replace('_', ' ', $_SESSION['account_post']));?>" readonly>

										</td>
										<td width="110px" align="right">
											<?php
											if($_SESSION['account_post']!='qac_head'){
												?>
												<button type="button" style="width: 105px;" class="btn btn-success " data-toggle="modal" data-target="#update_post">change post</button>
												<?php
											}elseif ($_SESSION['account_post']=='qac_head'){
												?>
												<button type="button" style="width: 105px;" class="btn btn-success disabled" data-toggle="modal" data-target="#update_post">change post</button>
											<?php
											}
											?>
										</td>
									</tr>
								</table>
								</div>
								<?php
								if( $_SESSION['account_post']=='course_coordinator'){
									?>
									<div class="form-group">
										<label for="username">Course</label>

									<table>
										<tr>
											<td width="390px">
												<input type="text" style="color: black;" class="form-control " id="course_name" name="course_name" value="<?php echo strtoupper($_SESSION['course_name']);?>" readonly >
											</td>
											<td width="110px" align="right">
												<?php
												if($_SESSION['account_post']!='qac_head'){
													if($_SESSION['course_name']!=''){
														?>
														<button type="button" style="width: 105px;" class="btn btn-success" data-toggle="modal" data-target="#edit_course">Edit Course</button>
														<?php
													}else{
														?>
														<button type="button" style="width: 105px;" class="btn btn-warning" data-toggle="modal" data-target="#edit_course">Add Course</button>
														<?php
													}
													?>
													<?php
												}
												?>
											</td>
										</tr>
									</table>
										<span class="text-danger"><?php echo form_error('')?></span>
									</div>
									<?php
								}
								?>
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['account_username'];?>" >
									<span class="text-danger"><?php echo form_error('username')?></span>
								</div>
								<div class="form-group">
									<label for="email">E-mail</label>
									<input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['account_email'];?>" >
									<span class="text-danger"><?php echo form_error('email')?></span>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" >
									<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<span class="text-danger"><?php echo form_error('password')?></span>
								</div>
								<div class="form-group">
									<label for="con_password">Confirm Password</label>
									<input type="password" class="form-control" name="con_password" id="con_password" >
									<span toggle="#con_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
									<span class="text-danger"><?php echo form_error('con_password')?></span>
								</div>
							<?php
							}
							?>
                                <br/>
							<?php

							//----------------------------------------update button-----------------------------------------------------------------------------

							if ((( $_SESSION['account_type']!='qac')&&($_SESSION['account_type']!='head_of_institute'))){
								?>
								<center>
									<button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button>
								</center>
								<?php
							}elseif ((( $_SESSION['account_type']!='qac')&&($this->session->userdata('username')!=$_SESSION['account_username']))){
								?>
								<center>
									<button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button>
								</center>
								<?php
							}elseif (($this->session->userdata('username')==$_SESSION['account_username'])){
								?>
								<center>
									<button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button>
								</center>
								<?php
							}elseif(( $_SESSION['type']=='qac')&&($_SESSION['post']=='qac_head')){
								?>
								<center>
									<button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button>
								</center>
								<?php
							}
							?>
                            </div>
                            <br/>
                        </form>
                    </div>
                </div>
            <hr>
			<div class="container">
				<div align="right">
					<?php
					//---------------------------------------- delete button-----------------------------------------------------------------------------
					if( $_SESSION['account_post']!='qac_head'){
						if(( $_SESSION['type']=='qac')&&($_SESSION['post']=='qac_head')){
							?>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete Account</button>
							<?php
						}elseif (($_SESSION['account_username'])==($this->session->userdata('username'))){
							?>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete Account</button>
							<?php
						}elseif ((( $_SESSION['account_type']!='qac')&&($this->session->userdata('username')!=$_SESSION['account_username']))){
							?>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete Account</button>
							<?php
						}
					}elseif(($_SESSION['post']=='qac_head')&&($_SESSION['account_post']=='qac_head')){
						?>
						<button type="button" class="btn btn-danger disabled" data-toggle="modal" data-target="#delete">Delete Account</button>
						<?php
					}elseif($_SESSION['account_post']=='head_of_institute'){

					}
					?>
				</div>

				<!---------------------------------------------------------delete pop uo-------------------------->
				<div class="modal fade" id="delete" role="dialog">
					<div class="modal-dialog">

						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Delete</h4>
							</div>
							<div class="modal-body">

								<form method="post" action="<?php echo base_url();?>login_controller/delete_conform_account">
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" id="pw" name="pw" placeholder="Enter admin password">
										<span toggle="#pw" class="fa fa-fw fa-eye field-icon toggle-password"></span>
										<span class="text-danger"><?php echo form_error('pw')?></span>
									</div>
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" class="form-control" id="confirm_pw" name="confirm_pw" placeholder="Re-enter admin password"/>
										<span toggle="#confirm_pw" class="fa fa-fw fa-eye field-icon toggle-password"></span>
										<span class="text-danger"><?php echo form_error('confirm_pw')?></span>
									</div>
									<input type="text" class="hide" name="admin_password" value="<?php echo $this->session->userdata('password');?>" readonly>

									<center>
										<button type="submit" class="btn btn-danger" name="delete" value="Delete">Delete</button>
									</center>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>

				<!-------------------------------------------------------- change post popup------------------------------------------------->
				<div class="modal fade" id="update_post" role="dialog">
					<div class="modal-dialog">

						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Update post</h4>
							</div>
							<div class="modal-body">

								<form method="post" action="<?php echo base_url();?>login_controller/update_post">

									<div class="form-group">
										<label for="username">Select Type</label>
									<?php
									if($_SESSION['account_type']=="under_graduate"){
										?>
									<select class="form-control" name="type" id="a_type">
										<option class="text-muted"></option>
										<option name="type" value="under_graduate">Under Graduate</option>
									</select>
									<?php
									}elseif($_SESSION['account_type']=="post_graduate"){
										?>
										<select class="form-control" name="type" id="a_type">
											<option class="text-muted"></option>
											<option name="type" value="post_graduate">Post Graduate</option>
										</select>
									<?php
									}elseif($_SESSION['account_type']=="external"){
										?>
										<select class="form-control" name="type" id="a_type">
											<option class="text-muted"></option>
											<option name="type" value="external">External</option>
										</select>
										<?php
									}elseif($_SESSION['account_type']=="qac"){
										?>
										<select class="form-control" name="type" id="a_type">
											<option class="text-muted"></option>
											<option name="type" value="qac">QAC</option>
										</select>
										<?php
									}elseif($_SESSION['account_type']=="head_of_institute"){
										?>
										<select class="form-control" name="type" id="a_type">
											<option class="text-muted"></option>
											<option name="type" value="head_of_institute">Head of institute</option>
										</select>
										<?php
									}else{
										?>
										<select class="form-control" name="type" id="a_type">
											<option class="text-muted"></option>
										</select>
										<?php
									}
									?>
										<span class="text-danger"><?php echo form_error('type');?></span>
									</div>

									<div class="form-group">
										<label for="username">New Post</label>
										<select class="form-control" name="post" id="a_post">
											<option class="text-muted"></option>
										</select>
										<span class="text-danger"><?php echo form_error('post');?></span>
									</div>

									<input type="text" class="hide" id="username" name="username" value="<?php echo $_SESSION['account_username'];?>">
									<input type="text" class="hide" id="email" name="email" value="<?php echo $_SESSION['account_email'];?>">
									<input type="text" class="hide" name="type" value="<?php echo strtoupper(str_replace('_', ' ', $_SESSION['account_type']));?>">
									<center>
										<button type="submit" class="btn btn-primary" name="submit" value="Submit">Update</button>
									</center>
								</form>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>

				<!---------------------------------------------------------add or change course pop up-------------------------->
				<div class="modal fade" id="edit_course" role="dialog">
					<div class="modal-dialog">

						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Change or add Course</h4>
							</div>
							<div class="modal-body">

								<form method="post" action="<?php echo base_url();?>login_controller/update_course">
									<div class="form-group">
									<label for="username">Select Type</label>
									<?php
									if($_SESSION['account_type']=="under_graduate"){
										?>
										<select class="form-control" name="type" id="a_type1">
											<option class="text-muted"></option>
											<option name="type" value="under_graduate">Under Graduate</option>
										</select>
										<?php
									}elseif($_SESSION['account_type']=="post_graduate"){
										?>
										<select class="form-control" name="type" id="a_type1">
											<option class="text-muted"></option>
											<option name="type" value="post_graduate">Post Graduate</option>
										</select>
										<?php
									}elseif($_SESSION['account_type']=="external"){
										?>
										<select class="form-control" name="type" id="a_type1">
											<option class="text-muted"></option>
											<option name="type" value="external">External</option>
										</select>
										<?php
									}elseif($_SESSION['account_type']=="qac"){
										?>
										<select class="form-control" name="type" id="a_type1">
											<option class="text-muted"></option>
											<option name="type" value="qac">QAC</option>
										</select>
										<?php
									}elseif($_SESSION['account_type']=="head_of_institute"){
										?>
										<select class="form-control" name="type" id="a_type1">
											<option class="text-muted"></option>
											<option name="type" value="head_of_institute">Head of institute</option>
										</select>
										<?php
									}else{
										?>
										<select class="form-control" name="type" id="a_type1">
											<option class="text-muted"></option>
										</select>
										<?php
									}
									?>
									<span class="text-danger"><?php echo form_error('type');?></span>
									</div>
									<div class="form-group">
										<label >Course</label>
										<select class="form-control" name="course_name" id="cat4dropdown1">
										</select>
										<span class="text-danger"><?php echo form_error('course_name');?></span>
									</div>

									<input type="text" class="hide" id="username" name="username" value="<?php echo $_SESSION['account_username'];?>">
									<input type="text" class="hide" id="email" name="email" value="<?php echo $_SESSION['account_email'];?>">
									<input type="text" class="hide" name="type" value="<?php echo strtoupper(str_replace('_', ' ', $_SESSION['account_type']));?>">
									<input type="text" class="hide" name="post" value="<?php echo strtoupper(str_replace('_', ' ', $_SESSION['account_post']));?>">

									<center>
										<button type="submit" class="btn btn-primary" name="submit" value="Submit">Update</button>
									</center>
								</form>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
				<!-------------------------------------------- add or change course pop up end------------------------------------------------->

				<!-------------------------------------------- send massage pop up ------------------------------------------------->


				<div class="modal fade" id="send_massage" role="dialog">
					<div class="modal-dialog">

						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Message form</h4>
							</div>
							<div class="modal-body">

								<form method="post" action="<?php echo base_url();?>login_controller/contact_user">
									<table width="100%">
										<tr>
											<td width="100px">
												From
											</td>
											<td>
												<div class="form-group">
													<input type="text" style="color: midnightblue;" class="form-control" id="from_email" name="from_email" value="<?php echo $_SESSION['myemail'];?>" readonly >
												</div>
											</td>
										</tr>
										<tr>
											<td width="100px">
												To
											</td>
											<td>
												<div class="form-group">
													<input type="text" style="color: midnightblue;" class="form-control" id="to_email" name="to_email" value="<?php echo $_SESSION['account_email'];?>" readonly>
												</div>
											</td>
										</tr>
										<tr>
											<td width="100px">
												Subject
											</td>
											<td>
												<div class="form-group">
													<input type="text" style="color: midnightblue;" class="form-control" id="subject" name="subject"  >
													<span class="text-danger"><?php echo form_error('subject')?></span>
												</div>
											</td>
										</tr>
										<tr>
											<td width="100px">
												Message
											</td>
											<td>
												<div class="form-group">
													<textarea rows="5" style="color: midnightblue;" cols="50" class="form-control" id="Message" name="Message"> </textarea>
													<span class="text-danger"><?php echo form_error('Message')?></span>
												</div>
											</td>
										</tr>
									</table>
									<input type="text" name="account_username" class="hide" value="<?php echo $_SESSION['account_username'] ;?>">
									<input type="text" name="account_email" class="hide" value="<?php echo $_SESSION['account_email'] ;?>">

									<center>
										<button type="submit" class="btn btn-primary" name="submit" value="Submit">Send Massage</button>
									</center>
								</form>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>

<!--				---------------------------------------------------------------------------------------------------->
				<div class="modal fade" id="send_massage_qac" role="dialog">
					<div class="modal-dialog">

						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Message form</h4>
							</div>
							<div class="modal-body">

								<form method="post" action="<?php echo base_url();?>login_controller/contact_user">
									<table width="100%">
										<tr>
											<td width="100px">
												From
											</td>
											<td>
												<div class="form-group">
													<input type="text" style="color: midnightblue;" class="form-control" id="from_email" name="from_email" value="<?php echo $_SESSION['myemail'];?>" readonly >
												</div>
											</td>
										</tr>
										<tr>
											<td width="100px">
												To
											</td>
											<td>
												<div class="form-group">
													<input type="text" style="color: midnightblue;" class="form-control" id="to_email" name="to_email" value="<?php echo $_SESSION['qac_head_email'];?>" readonly>
												</div>
											</td>
										</tr>
										<tr>
											<td width="100px">
												Subject
											</td>
											<td>
												<div class="form-group">
													<input type="text" style="color: midnightblue;" class="form-control" id="subject" name="subject"  >
												</div>
											</td>
										</tr>
										<tr>
											<td width="100px">
												Message
											</td>
											<td>
												<div class="form-group">
													<textarea rows="5" style="color: midnightblue;" cols="50" class="form-control" id="Message" name="Message"> </textarea>
												</div>
											</td>
										</tr>
									</table>
									<input type="text" name="account_username" class="hide" value="<?php echo $_SESSION['account_username'] ;?>">
									<input type="text" name="account_email" class="hide" value="<?php echo $_SESSION['account_email'] ;?>">

									<center>
										<button type="submit" class="btn btn-primary" name="submit" value="Submit">Send Massage</button>
									</center>
								</form>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>



				<!-------------------------------------------- send massage pop up end------------------------------------------------->














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
                        $('#a_post').html('<option name="post" value="head_of_institute">Head of institute</option>');
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
                        $('#a_post').html('<option name="post" value=""></option>' +
							'<option name="post" value="qac">QAC</option>'+
							'<option name="post" value="qac_head">QAC Head</option>');
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

        $('#a_type1').change(function(){
            var account_type = $('#a_type1').val();
            if(account_type != ' ')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>login_controller/fetch_category_TYPE",
                    method:"POST",
                    data:{account_type:account_type},
                    success:function(data)
                    {
                        $('#cat4dropdown1').html(data);
                    }
                });
            }
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
});
</script>

