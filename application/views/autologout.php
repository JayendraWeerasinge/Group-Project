<?php
if ($this->session->userdata('username') != '') {
	?>
	<script>
        $(function () {
            function timeChecker() {
                setInterval(function () {
                    var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
                    timeCompare(storedTimeStamp);
                },900000);
            }

            function timeCompare(timeString) {
                var maxMinutes = 15;
                var currentTime = new Date();
                var pastTime = new Date(timeString);
                var timeDiff = currentTime - pastTime;
                var minPast = Math.floor((timeDiff / 60000));

                if (minPast > maxMinutes) {
                    sessionStorage.removeItem("lastTimeStamp");
                    window.location = "<?php echo base_url(); ?>login_controller/logout";
                    return false;
                } else {
                    //JUST ADDED AS A VISUAL CONFIRMATION
                    console.log(currentTime + " - " + pastTime + " - " + minPast + " min past");
                }
            }

            if (typeof (Storage) !== "undefined") {
                $(document).mousemove(function () {
                    var timeStamp = new Date();
                    sessionStorage.setItem("lastTimeStamp", timeStamp);
                });
                timeChecker();
            }
        });
	</script>
	<?php
}
		?>
