<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$users = getById("users", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Users</legend>
						<input name="cat" type="hidden" value="users">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Username</label>
							<input class="form-control" type="text" name="username" value="<?=$users['username']?>" /><br>
							
							<label>Password</label>
							<input class="form-control" type="text" name="password" value="<?=$users['password']?>" /><br>
							
							<label>Designation</label>
							<input class="form-control" type="text" name="designation" value="<?=$users['designation']?>" /><br>
							
							<label>Remember token</label>
							<input class="form-control" type="text" name="remember_token" value="<?=$users['remember_token']?>" /><br>
							
							<label>Department</label>
							<input class="form-control" type="text" name="department" value="<?=$users['department']?>" /><br>
							
							<label>Last login</label>
							<input class="form-control" type="text" name="last_login" value="<?=$users['last_login']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				