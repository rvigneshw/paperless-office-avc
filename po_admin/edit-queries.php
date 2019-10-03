<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit"){
					$id = $_GET['id'];
					$queries = getById("queries", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Queries</legend>
						<input name="cat" type="hidden" value="queries">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Paper id</label>
							<input class="form-control" type="text" name="paper_id" value="<?=$queries['paper_id']?>" /><br>
							
							<label>Query</label>
							<textarea class="ckeditor form-control" name="query"><?=$queries['query']?></textarea><br>
							
							<label>Answer</label>
							<textarea class="ckeditor form-control" name="answer"><?=$queries['answer']?></textarea><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$queries['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$queries['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				