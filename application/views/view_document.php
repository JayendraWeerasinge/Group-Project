<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>View Document</title>
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
	<div class="col-sm-10 text-left">
		<!-- content -->

        <br/>
		<?php
		if($this->session->flashdata('delete_massage')){
			?>
			<div class="alert alert-danger">
				<span class="text-danger"> <?php echo $this->session->flashdata('delete_massage'); ?></span>
			</div>
			<?php
		}
		?>
        <div class="container ">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" style="height: 50px;">Search</span>
                    <input type="text" name="search_text" id="search_text" placeholder="Search..." class="form-control" style="width: 350px;" />
                </div>
            </div>
			<br/>
            <div style="width: 100%; font-size: 13px;" id="result"></div>
        </div>
        <div style="clear:both"></div>
	</div>
	</div>
</div>

</body>
<?php include 'footer.php';?>
</html>

<script>
    $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"<?php echo base_url(); ?>live_search/fetchDoc",
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
    });
</script>


