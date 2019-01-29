<?php
	include 'include/config.php';
	if(@session_destroy())
	{?>
		<script>
			document.location = "index.php";
		</script>
	<?php
		die();
	}
?>