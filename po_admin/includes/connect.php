<?php
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "paperless_office");  
		mysqli_query($link, "SET CHARACTER SET utf8");
		?>
		