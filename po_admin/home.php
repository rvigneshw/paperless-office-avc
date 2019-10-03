<?php
		include "includes/header.php";
		?>
		<table class="table table-striped">
		<tr>
		<th class="not">Table</th>
		<th class="not">Entries</th>
		</tr>
		
				<tr>
					<td><a href="department.php">Department</a></td>
					<td><?=counting("department", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="expenses_table.php">Expenses_table</a></td>
					<td><?=counting("expenses_table", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="fund_tables.php">Fund_tables</a></td>
					<td><?=counting("fund_tables", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="papers.php">Papers</a></td>
					<td><?=counting("papers", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="papertype.php">Papertype</a></td>
					<td><?=counting("papertype", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="queries.php">Queries</a></td>
					<td><?=counting("queries", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="users.php">Users</a></td>
					<td><?=counting("users", "id")?></td>
				</tr>
				</table>
			<?php include "includes/footer.php";?>
			