<?php

$actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$url= basename($actual_link);

?>

<nav>

	<div class="row content">
		<div class="sidenav hidden-xs">
			<h2 style="color: mediumturquoise;"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</h2>
			<ul class="nav nav-pills nav-stacked">
				<li class="<?php if($url == "index"){echo 'active';} ?>"><a href="<?php echo base_url('Home/index')?>"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span> Home</a></li>
				<li class="<?php if($url == "viewDocument" || $url =='view_edit_file'|| $url =='delete_confirm'){echo 'active';} ?>"><a href="<?php echo base_url('Home/viewDocument')?>">View Document <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-search"></span></a></li>

				<?php
				if(($this->session->userdata('type')=='qac')) {
					?>
					<li class="<?php if ($url == "uploadFile" || $url == "do_upload" || $url == "Bulkupload") {
						echo 'active';
					} ?>"><a href="<?php echo base_url(); ?>login_controller/uploadFile"> Upload Document<span
								style="font-size:16px;"
								class="pull-right hidden-xs showopacity glyphicon glyphicon-upload"></span></a></li>
					<?php
				}
				?>

				<?php
				if(($this->session->userdata('type')=='qac')||($this->session->userdata('type')=='head_of_institute')){
				?>
					<li class="<?php if($url == "manageAccount" ||$url == "user_Create_validation"){
						echo 'active';
					}elseif ($url == "userForm"){
						echo 'active';
					}
					?>"><a href="<?php echo base_url();?>login_controller/manageAccount">Manage Accounts<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
					</li>
					<?php
					if($this->session->userdata('type')!='head_of_institute'){
						?>
						<li class="<?php if($url == "reopen_View_cat_details_post_graduate" ||
							$url == "View_cat_details_post_graduate" ||
							$url == "reopen_View_cat_details_external" ||
							$url == "View_cat_details_External" ||
							$url == "Document_Settings" ||
							$url == "add_subject"||
							$url == "add_subjects_cat_post_graduate"||
							$url == "add_subjects_cat_external"||
							$url == "View_cat_details" ||
							$url == "insertCat" ||
							$url == 'reopen_View_cat_details'||
							$url == 'Post_Graduate'||
							$url == 'external_deg'||
							$url == 'add_subjects_cat'||
							$url == 'External_Deg'){echo 'active';} ?>"><a href="<?php echo base_url()?>login_controller/Document_Settings"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-book"></span> Document Settings</a></li>
						<?php
					}
					?>
					<li class="<?php if($url == "Report" || $url == "report"){echo 'active';} ?>"><a href="<?php echo base_url();?>login_controller/Report"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-folder-open"></span>Report (Posts) </a></li>
					<?php
				}
				?>

				<li class="<?php if($url == "useraccountupdate" || $url == "user_account_update_validation"){echo 'active';} ?>"><a href="<?php echo base_url();?>login_controller/useraccountupdate"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-wrench"></span>My profile</a></li>

				<li class="<?php if($url == "send_message" || $url == "send_message_accounts"){echo 'active';} ?>"><a href="<?php echo base_url();?>login_controller/send_message"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-comment"></span>Message</a></li>
				<?php
				if($this->session->userdata('post')=='qac_head'){
					?>
					<li class="<?php if($url == "BackUp"){echo 'active';} ?>"><a href="<?php echo base_url();?>Home/BackUp"><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cloud-upload"></span>Backup</a></li>
					<?php
				}
				?>

			</ul><br>

		</div>
</div>

</nav>
