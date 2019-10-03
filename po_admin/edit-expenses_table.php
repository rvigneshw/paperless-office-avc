<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$expenses_table = getById("expenses_table", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Expenses_table</legend>
						<input name="cat" type="hidden" value="expenses_table">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Paper id</label>
							<input class="form-control" type="text" name="paper_id" value="<?=$expenses_table['paper_id']?>" /><br>
							
							<label>Budget id</label>
							<input class="form-control" type="text" name="budget_id" value="<?=$expenses_table['budget_id']?>" /><br>
							
							<label>Amount</label>
							<input class="form-control" type="text" name="amount" value="<?=$expenses_table['amount']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$expenses_table['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$expenses_table['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				