<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-department.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Department</a>

				<h1>Department</h1>
				<p>This table includes <?php echo counting("department", "id");?> department.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Dept id</th>
			<th>Department name</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$department = getAll("department");
				if($department) foreach ($department as $departments):
					?>
					<tr>
		<td><?php echo $departments['dept_id']?></td>
		<td><?php echo $departments['department_name']?></td>


						<td><a href="edit-department.php?act=edit&id=<?php echo $departments['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $departments['id']?>&cat=department" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				