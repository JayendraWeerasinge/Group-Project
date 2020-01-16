<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
	<link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
	<link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="public/css/style.css" rel="stylesheet" type="text/css">
	<link href="public/css/all.min.css" rel="stylesheet" type="text/css">
	<script src="public/js/jquery-3.4.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<link rel="icon" href="public/img/MR2.png" type="image/gif" sizes="16x16">
</head>

<body>
	<?php

	if(isset($_POST['submit'])){

		$adminname=$_POST['adminname'];
		$adminpassword=md5($_POST['adminpassword']);
		echo $adminname;
		$email=$_POST['email'];

		if($adminname==""||$adminpassword==""||$email==""){
			?>
			<script>
		  			alert('All fields are required.');
		  			window.location.href='config.php';
		        </script>
			<?php
		}else{


		$conn=mysqli_connect("localhost","root","");
		if (!$conn) {
			?>
			<script>
  				alert('Could not connect');
        	</script>
        	<?php
		}

		$sql="create database mrdoc121";

		if (mysqli_query($conn,$sql)) {


			$link=mysqli_connect("localhost","root","","mrdoc121");

			$sql2 = "CREATE TABLE user(
		    username VARCHAR(20) NOT NULL ,
		    password VARCHAR(50) NOT NULL,
		    type VARCHAR(20) NOT NULL,
		    email VARCHAR(100) NOT NULL,
		    post VARCHAR(100) NOT NULL,
		    course_name VARCHAR(100) NOT NULL,
		    PRIMARY KEY (username)
			)";

			mysqli_query($link,$sql2);

			$pin = "CREATE TABLE pin(
		    id INT NOT NULL AUTO_INCREMENT ,
		    filename VARCHAR(250) NOT NULL,
		    actiontype VARCHAR(250) NOT NULL,
		    code VARCHAR(5) NOT NULL,
		    msg VARCHAR(500) NOT NULL,
		    PRIMARY KEY (id)
			)";

			mysqli_query($link,$pin);

			$sql1 = "CREATE TABLE fileupload(
		    file_name VARCHAR(250) NOT NULL PRIMARY KEY,
		    date_created VARCHAR(30) NOT NULL,
		    category VARCHAR(100) NOT NULL,
		    year INT NOT NULL,
		    semester VARCHAR(30) NOT NULL,
		    academic_year VARCHAR(70) NOT NULL,
		    subject_code VARCHAR(70) NOT NULL,
		    author VARCHAR(10) NOT NULL,
		    comment VARCHAR(250) NOT NULL,
		    lecturer VARCHAR(250) NOT NULL,
		    doc_type VARCHAR(250) NOT NULL
			)";

			mysqli_query($link,$sql1);

			$sql11 = "CREATE TABLE category_data(
		    id INT NOT NULL AUTO_INCREMENT ,
		    category VARCHAR(100) NOT NULL ,
		    PRIMARY KEY (id)
			)";

			mysqli_query($link,$sql11);

			$sqlpg = "CREATE TABLE postgraduate(
		    id INT NOT NULL AUTO_INCREMENT ,
		    category VARCHAR(100) NOT NULL ,
		    PRIMARY KEY (id)
			)";
			mysqli_query($link,$sqlpg);

			$sqlex = "CREATE TABLE external(
		    id INT NOT NULL AUTO_INCREMENT ,
		    category VARCHAR(100) NOT NULL ,
		    PRIMARY KEY (id)
			)";
			mysqli_query($link,$sqlex);


			$table_msg="CREATE TABLE messages (
    						id int NOT NULL AUTO_INCREMENT,
							sender varchar(255) NOT NULL,
							receiver varchar(255),
							msg varchar(1000),
							date varchar (50),
							time varchar(50),
							PRIMARY KEY (id)
							);";

			mysqli_query($link,$table_msg);

			$table_backup="CREATE TABLE backup (
    						id int NOT NULL AUTO_INCREMENT,
							date varchar (50),
							backup_name_file varchar(50),
							PRIMARY KEY (id)
				);";

			mysqli_query($link,$table_backup);

			$table_backup_auto="CREATE TABLE autobackup (
    						id varchar(1),
							action varchar (5),
							PRIMARY KEY (id)
				);";

			mysqli_query($link,$table_backup_auto);

			$insertvalue = "INSERT INTO autobackup (id,action) VALUES ('1','false')";

			mysqli_query($link,$insertvalue);



			$sql3 = "INSERT INTO user (username,password,type,email,post,course_name) VALUES ('$adminname', '$adminpassword','qac','$email','qac_head','')";

			if(mysqli_query($link,$sql3)){
				//echo "inserted !!";  	
			}else{
				?>
				<script>
		  			alert('Someting went wrong');
		        </script>
		        <?php
			}

			?>
			<script>
				window.location.href='index.php';
  				alert('Database is created');
        	</script>
			<?php


		}else{
			?>
			<script>
  				alert('Error creating Database ');
        	</script>
			<?php
		}
	}
	}

	?>

	<br>
	<div class="col-sm-12">
		<table border="0" width="100%">
			<tr>
				<th align="center" width="50%">
					<img src="public/img/MR2.png">
				</th>
				<th align="center" width="50%">
					<form method="POST">
						<table border="0" align="center" width="100%">
							<tr height="100">
								<th colspan="2"><h3><center>Database Settings</center></h3></th>
							</tr>
							<tr>
								<td>Database Name</td>
								<td valign="50">
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="mrdoc121" name="dbname" readonly >
									</div>
								</td>
							</tr>
							<tr>
								<td>Server Name</td>
								<td valign="50">
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="localhost" name="servername" readonly>
									</div>
								</td>
							</tr>
							<tr>
								<td>User Name</td>
								<td valign="50">
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="root" name="username" readonly>
									</div>
								</td>
							</tr>
							<tr>
								<td>Password</td>
								<td valign="50">
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="password" readonly>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2" height="100"><center><h3> Create Admin Account</h3></center></td>
							</tr>
							<tr>
								<td>User name</td>
								<td valign="50">
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="Enter username" name="adminname">
									</div>
								</td>
							</tr>
							<tr>
								<td>Password</td>
								<td valign="50">
									<div class="col-sm-8">
										<input type="password" class="form-control" placeholder="Enter Password" name="adminpassword">
									</div>
								</td>
							</tr>
							<tr>
								<td>E-mail</td>
								<td valign="50">
									<div class="col-sm-8">
										<input type="email" class="form-control" placeholder="Enter E-mail" name="email">
									</div>
								</td>
							</tr>

							<tr>
								<td colspan="2" height="100"><center><button type="submit" class="btn btn-primary" name="submit" value="Submit">Create</button></center></td>
							</tr>
						</table>
					</form>

				</th>

			</tr>
		</table>
	</div>




</body>
</html>
