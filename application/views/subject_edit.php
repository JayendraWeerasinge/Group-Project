<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit subjects</title>
    <?php include 'header.php';
    include 'autologout.php';
	if($this->session->userdata('username') == ''){
		include 'index.php';
	}?>
</head>
<body>

<div class="container-fluid">
    <div class="row content">
        <br/>
        <br/>
        <div class="col-sm-1">
            <h4><a href="<?php echo base_url()?>login_controller/reopen_View_cat_details"><span style="color: white";> Go Back </span><span style="color: white;" class="glyphicon glyphicon-triangle-left"></span></a></h4>
        </div>
        <div class="col-sm-10">
            <center>
                <h1 style="color: midnightblue;"><?php echo strtoupper(str_replace('_', ' ', $_SESSION['category']));?></h1>
            </center>
            <hr>
            <h2><center>Edit</center></h2>

            <div class="container" style="margin-left:auto; width: 500px ">

                <div class="row">
                    <div class="col-4 ">
            <form method="post" action="<?php echo base_url();?>login_controller/update_subjects_cat">

				<div class="form-group">
					<label for="username">Subject Code</label>
					<input type="text" style="color:midnightblue; " class="form-control" id="subject_code" name="subject_code" value="<?php echo $_SESSION['subject_code'];?>"readonly>
					<span class="text-danger"><?php echo form_error('subject_code')?></span>
				</div>
				<div class="form-group">
					<label for="username">Subject Name - <font color="gray" ><?php echo $_SESSION['subject_name'];?></font></label>
					<input type="text" class="form-control" id="subject_name" name="subject_name" value="<?php echo $_SESSION['subject_name'];?>" />
					<span class="text-danger"><?php echo form_error('subject_name')?></span>
				</div>
                <div class="form-group">
					<?php if($_SESSION['year']==1){
						$s1='selected';
						$s2='';$s3='';$s4='';
					}elseif($_SESSION['year']==2){
						$s2='selected';
						$s1='';$s3='';$s4='';
					}elseif($_SESSION['year']==3){
						$s3='selected';
						$s1='';$s2='';$s4='';
					}elseif($_SESSION['year']==4){
						$s4='selected';
						$s1='';$s2='';$s3='';
					}else{
						$s1='';$s2='';$s3='';$s4='';
					}?>
                    <label for="username">Year - <font color="gray" >year <?php echo $_SESSION['year'];?></font> </label>
                    <select class="form-control" name="year">
                        <option class="text-muted"></option>
                        <option name="year" value="1" <?php echo $s1;?>>1st year</option>
                        <option name="year" value="2" <?php echo $s2;?>>2nd year</option>
                        <option name="year" value="3" <?php echo $s3;?>>3rd year</option>
                        <option name="year" value="4" <?php echo $s4;?>>4th year</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('year')?></span>
                </div>
                <div class="form-group">
					<label for="username">Semester - <font color="gray" ><?php echo $_SESSION['semester'];?></font></label>
                    <?php if($_SESSION['semester']=='1sem'){
                        $s1='selected';
                        $s2='';
                    }elseif($_SESSION['semester']=='2sem'){
                        $s2='selected';
                        $s1='';
                    }else{
                        $s1='';$s2='';
                    }?>
                    <select class="form-control" name="semester">
                        <option class="text-muted"></option>
                        <option name="semester" value="1sem" <?php echo $s1;?> >1st semester</option>
                        <option name="semester" value="2sem" <?php echo $s2;?>>2nd semester</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('semester')?></span>
                </div>
                <input type="text" class="hide" value="<?php echo $_SESSION['subject_code'];?>" name="hide">

                <input type="text" class="hide" value="<?php echo $_SESSION['category']; ?>" name="category" id="<?php echo $_SESSION['category']; ?>">
                <center>
                    <button style="width: 100px;" class="btn btn-primary" name="Submit" type="submit" value="submit">Update</button>
                </center>

            </form>
                    </div>
                </div>
            </div>



            <hr>

        </div>
    </div>
</div>
<?php include 'footer.php';?>
</body>
</html>

