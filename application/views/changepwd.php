<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Change passward</title>
    <?php include 'header.php';
    include 'autologout.php';?>
</head>
<body>

<div class="container" style="margin-left:auto; width: 500px ">

	<div class="row">
		<div class="col-4 ">
        <div class="modal-body">
						 <form method="post" action="<?php echo base_url();?>login_controller/change_pwd">
			<div class ="form">
			<hr>
					<span style="color: midnightblue;" >
						<center><h1>Change Passward</h1></center>
					</span>
					<br/>

        </div> 
					<div class="form-group">
						<label>User Name</label>
						<input type="text" class="form-control" name='username' placeholder="Enter User Name"/>
						
					</div>
					<div class="form-group">
						<label>New Passward</label>
						<input type="text" class="form-control" name='npassward' placeholder="Enter New Passward"/>
						
					</div>
					<div class="form-group">
						<label>Confirm Passward</label>
						<input type="text" class="form-control" name='cpassward' placeholder="Re-Enter Passward"/>
                        <br>
                        <br>

                        <div class="form-group form-check">
						<button type="submit" class="btn btn-primary" name="submit" value="submit">Confirm</button>
					</div> 
                    </form>
					</hr>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
						
					</div> 







</div>
</div>
</div>
		
	</div>

<?php include 'footer.php';?>
</body>