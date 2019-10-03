<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-expenses_table.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Expenses_table</a>

				<h1>Expenses_table</h1>
				<p>This table includes <?php echo counting("expenses_table", "id");?> expenses_table.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Paper id</th>
			<th>Budget id</th>
			<th>Amount</th>
			<th>Created at</th>
			<th>Updated at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$expenses_table = getAll("expenses_table");
				if($expenses_table) foreach ($expenses_table as $expenses_tables):
					?>
					<tr>
		<td><?php echo $expenses_tables['id']?></td>
		<td><?php echo $expenses_tables['paper_id']?></td>
		<td><?php echo $expenses_tables['budget_id']?></td>
		<td><?php echo $expenses_tables['amount']?></td>
		<td><?php echo $expenses_tables['created_at']?></td>
		<td><?php echo $expenses_tables['updated_at']?></td>


						<td><a href="edit-expenses_table.php?act=edit&id=<?php echo $expenses_tables['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $expenses_tables['id']?>&cat=expenses_table" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				