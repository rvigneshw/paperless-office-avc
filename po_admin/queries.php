<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-queries.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Queries</a>

				<h1>Queries</h1>
				<p>This table includes <?php echo counting("queries", "id");?> queries.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Paper id</th>
			<th>Query</th>
			<th>Answer</th>
			<th>Created at</th>
			<th>Updated at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$queries = getAll("queries");
				if($queries) foreach ($queries as $queriess):
					?>
					<tr>
		<td><?php echo $queriess['id']?></td>
		<td><?php echo $queriess['paper_id']?></td>
		<td><?php echo $queriess['query']?></td>
		<td><?php echo $queriess['answer']?></td>
		<td><?php echo $queriess['created_at']?></td>
		<td><?php echo $queriess['updated_at']?></td>


						<td><a href="edit-queries.php?act=edit&id=<?php echo $queriess['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $queriess['id']?>&cat=queries" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				