<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-fund_tables.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Fund_tables</a>

				<h1>Fund_tables</h1>
				<p>This table includes <?php echo counting("fund_tables", "id");?> fund_tables.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Budget id</th>
			<th>Deparment id</th>
			<th>Year of allocation</th>
			<th>Amount</th>
			<th>Created at</th>
			<th>Updated at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$fund_tables = getAll("fund_tables");
				if($fund_tables) foreach ($fund_tables as $fund_tabless):
					?>
					<tr>
		<td><?php echo $fund_tabless['budget_id']?></td>
		<td><?php echo $fund_tabless['deparment_id']?></td>
		<td><?php echo $fund_tabless['year_of_allocation']?></td>
		<td><?php echo $fund_tabless['amount']?></td>
		<td><?php echo $fund_tabless['created_at']?></td>
		<td><?php echo $fund_tabless['updated_at']?></td>


						<td><a href="edit-fund_tables.php?act=edit&id=<?php echo $fund_tabless['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $fund_tabless['id']?>&cat=fund_tables" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				