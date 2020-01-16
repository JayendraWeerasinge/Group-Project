
<!DOCTYPE html>

<head>
	<?php
	include 'autologout.php';
	?>
<title>
Index
</title>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url();?>public/temp/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/temp/css/icomoon.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/temp/css/simple-line-icons.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/temp/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/temp/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/temp/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/temp/css/style.css">

	<style>
		.addnew{
			background-image: url("<?php echo base_url();?>public/temp/images/1.jpg");
		}
		.addnew2{
			background-image: url("<?php echo base_url();?>public/temp/images/2.jpg");
		}
		.addnew3{
			background-image: url("<?php echo base_url();?>public/temp/images/3.jpg");
		}
	</style>
	<script src="<?php echo base_url();?>public/temp/js/modernizr-2.6.2.min.js"></script>
	<script src="<?php echo base_url();?>public/temp/js/respond.min.js"></script>
	<?php
	include 'header.php';
	?>

</head>
<body>
<div class="container-fluid">
	<div class="row content">
	<?php
	if ($this->session->userdata('username') != ''){
		?>
		<div class="col-sm-2">
			<?php include 'sidenav.php';?>
		</div>
	<div class="col-sm-10">
	<?php
	}
		?>

		<?php
		if ($this->session->userdata('username') != '') {
			?>
			<br/>
			<?php
		}
		?>


	<div id="slider" data-section="home">
		<div class="owl-carousel owl-carousel-fullwidth">

			<div class="item addnew">
				<div class="container" style="position: relative;">
					<div class="row">
						<div class="col-md-7 col-sm-7">
							<div class="fh5co-owl-text-wrap">
								<div class="fh5co-owl-text">
									<p class=" to-animate" style="color: midnightblue; font-size: 1500%;">Mr.Doc</p>
									<!--								<h2 class="fh5co-sub-lead to-animate">100% Free Fully Responsive HTML5 Bootstrap Template. Crafted with love by the fine folks at <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a></h3>-->
<!--									<p class="to-animate-2"><a href="#" class="btn btn-primary btn-lg">View Case Study</a></p>-->
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-push-1 col-sm-4 col-sm-push-1 iphone-image">
							<div class="iphone to-animate-2"><img src="<?php echo base_url();?>public/img/MR2.png" alt="mrdoc logo"></div>
						</div>

					</div>
				</div>
			</div>
			<div class="item addnew2">
				<div class="container" style="position: relative;">
					<div class="row">
						<div class="col-md-7 col-md-push-1 col-md-push-5 col-sm-7 col-sm-push-1 col-sm-push-5">
							<div class="fh5co-owl-text-wrap">
								<div class="fh5co-owl-text">
									<h1 class="fh5co-lead to-animate" style="color: midnightblue;">Document Management System</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="item addnew3" >
				<div class="overlay"></div>
				<div class="container" style="position: relative;">
					<div class="row">
						<div class="col-md-7 col-md-push-1 col-md-push-5 col-sm-7 col-sm-push-1 col-sm-push-5">
							<div class="fh5co-owl-text-wrap">
								<div class="fh5co-owl-text">
									<h1 class="fh5co-lead to-animate" >Easy to manage your documents</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
			<?php
			if ($this->session->userdata('username') != ''){
			?>
		</div>

				<?php
				}else{
				?>

		<div id="fh5co-about-us" data-section="about">
			<div class="container">
				<div class="row row-bottom-padded-lg" id="about-us">
					<div class="col-md-12 section-heading text-center">
						<h2 class="to-animate">About MrDoc</h2>
						<div class="row">
							<div class="col-md-8 col-md-offset-2 to-animate">
								<h3>Store your documents secure and manage your all documents in one place </h3>
							</div>
						</div>
					</div>


				</div>
		<?php
				}
				?>
	</div>
</div>
		<?php include 'footer.php';?>
<script src="<?php echo base_url();?>public/temp/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>public/temp/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url();?>public/temp/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/temp/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>public/temp/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>public/temp/js/jquery.style.switcher.js"></script>

<script>
    $(function(){
        $('#colour-variations ul').styleSwitcher({
            defaultThemeId: 'theme-switch',
            hasPreview: false,
            cookie: {
                expires: 15,
                isManagingLoad: true
            }
        });
        $('.option-toggle').click(function() {
            $('#colour-variations').toggleClass('sleep');
        });
    });
</script>
<script src="<?php echo base_url();?>public/temp/js/main.js"></script>
</body>
</html>




































<!---->
<!--<!doctype html>-->
<!--<html>-->
<!--<head>-->
<!--<meta charset="utf-8">-->
<!--<title>Index</title>-->
<!--	--><?php //include 'header.php';
//    include 'autologout.php';?>
<!--	<style>-->
<!--		img{-->
<!--			padding-left: 1%;-->
<!--		}-->
<!--	</style>-->
<!--</head>-->
<!---->
<!--<body>-->
<!---->
<!--<div class="container-fluid">-->
<!--	<div class="row content">-->
<!---->
<!--			--><?php
//			if ($this->session->userdata('username') != ''){
//				?>
<!--				<div class="col-sm-2">-->
<!--				--><?php
//				include 'sidenav.php';
//				?>
<!--				</div>-->
<!--					--><?php
//			}else{ ?>
<!---->
<!--				--><?php
//			}?>
<!---->
<!--		<div class="col-sm-10">-->
<!---->
<!--			<center>-->
<!--			<img width="50%" src="--><?php //echo  base_url('public/img/MR2.png');?><!--">-->
<!--			</center>-->
<!--			<div class="col-sm-10 text-right">-->
<!--				<br/>-->
<!--				<br/>-->
<!--				<h1>Document Management System</h1>-->
<!--				MrDoc is an online document management platform that lets you create, edit, and manage documents online.-->
<!--				<br/><br/><br/>-->
<!--				<br/>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<?php //include 'footer.php';?>
<!--</body>-->
<!--</html>-->
<!---->
