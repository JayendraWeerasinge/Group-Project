<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'header.php';
    include 'autologout.php';?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

<div class="container" style="margin-left:auto; width: 500px ">

	<div class="row">
		<div class="col-4 ">

        <?php
						$alphabet = '1234567890';
						$pass = array();
						$alphaLength = strlen($alphabet) - 1;
						for ($i = 0; $i < 4; $i++) {
							$n = rand(0, $alphaLength);
							$pass[] = $alphabet[$n];
						}
							 $pin=implode($pass);

?>

        <form method="post" action="<?php echo base_url();?>login_controller/login_pin">

        <div class="form-group">
        <span style="color: midnightblue;" >
						<center><h1>Forgot Password</h1></center>
						<hr>
					</span>
					
					<br>
					<br>
					<br/>
					<?php
			echo  $_SESSION['Rpin'];
			?>
                   <center> <button type="submit" class="btn btn-success btn-lg" name="submit" value="pinsubmit" style="width:300px;">Request PIN</button>
                    <br>
                    <br>
                    <input type="text" class="form-control" name='pin' placeholder="Enter Pin" style="width:300px;"/>
					 <input type="text" class="hidden" name='Rpin' value="<?php echo $pin;?>">
                     <br/>
					

					
					<!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Confirm</button></a> -->
					 <div class="form-group form-check">
					<button type="submit" class="btn btn-primary" name="submit" value="submitc">Confirm</button>
					</div> 
					</hr>

						</center>
						</form>

<?php 
for($i=0;$i<22;$i++){
    echo '<br/>';
}
?>


</div>
		</div>
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>
