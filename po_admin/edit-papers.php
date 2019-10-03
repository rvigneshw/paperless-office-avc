<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$papers = getById("papers", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Papers</legend>
						<input name="cat" type="hidden" value="papers">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Paper type</label>
							<input class="form-control" type="text" name="paper_type" value="<?=$papers['paper_type']?>" /><br>
							
							<label>Department id</label>
							<input class="form-control" type="text" name="department_id" value="<?=$papers['department_id']?>" /><br>
							
							<label>Subject</label>
							<textarea class="ckeditor form-control" name="subject"><?=$papers['subject']?></textarea><br>
							
							<label>IsApproved</label>
							<input class="form-control" type="text" name="isApproved" value="<?=$papers['isApproved']?>" /><br>
							
							<label>Content</label>
							<input class="form-control" type="text" name="content" value="<?=$papers['content']?>" /><br>
							
							<label>Associated files path</label>
							<input class="form-control" type="text" name="associated_files_path" value="<?=$papers['associated_files_path']?>" /><br>
							
							<label>Priority</label>
							<input class="form-control" type="text" name="priority" value="<?=$papers['priority']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$papers['created_at']?>" /><br>
							
							<label>Paper submitted person</label>
							<input class="form-control" type="text" name="paper_submitted_person" value="<?=$papers['paper_submitted_person']?>" /><br>
							
							<label>Amount</label>
							<input class="form-control" type="text" name="amount" value="<?=$papers['amount']?>" /><br>
							
							<label>Status of manager</label>
							<input class="form-control" type="text" name="status_of_manager" value="<?=$papers['status_of_manager']?>" /><br>
							
							<label>Status of principal</label>
							<input class="form-control" type="text" name="status_of_principal" value="<?=$papers['status_of_principal']?>" /><br>
							
							<label>Status of secretary</label>
							<input class="form-control" type="text" name="status_of_secretary" value="<?=$papers['status_of_secretary']?>" /><br>
							
							<label>Last modified person</label>
							<input class="form-control" type="text" name="last_modified_person" value="<?=$papers['last_modified_person']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$papers['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				