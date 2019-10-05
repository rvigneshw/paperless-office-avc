<?php
		include "includes/header.php";
?>
<h3>
Here are the functions which may cause stability issues <br>
Or 
<b>
Even may result in crash of entire application
</b>
</h3>
<a href="export.php">
<button class="btn btn-primary">
Export Current Status of Database As SQL File.
</button>
</a>
<!-- <a href="import_reset_database.php"> -->
<button onclick="check()" class="btn btn-danger">
Reset Database
</button>
<!-- </a> -->
<script>
function check() {
    if(confirm("Are You Sure?It leads to deletion of entire database(Taking a backup of Current Database is hugely adviced)")===true){
        window.location = "import_reset_database.php";
    }
}
</script>