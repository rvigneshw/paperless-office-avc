<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$fund_tables = getById("fund_tables", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Fund_tables</legend>
						<input name="cat" type="hidden" value="fund_tables">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Deparment id</label>
							<input class="form-control" type="text" name="deparment_id" value="<?=$fund_tables['deparment_id']?>" /><br>
							
							<label>Year of allocation</label>
							<input class="form-control" type="text" name="year_of_allocation" value="<?=$fund_tables['year_of_allocation']?>" /><br>
							
							<label>Amount</label>
							<input class="form-control" type="text" name="amount" value="<?=$fund_tables['amount']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$fund_tables['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$fund_tables['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				