<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-papertype.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Papertype</a>

				<h1>Papertype</h1>
				<p>This table includes <?php echo counting("papertype", "id");?> papertype.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Paper type id</th>
			<th>Paper type name</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$papertype = getAll("papertype");
				if($papertype) foreach ($papertype as $papertypes):
					?>
					<tr>
		<td><?php echo $papertypes['paper_type_id']?></td>
		<td><?php echo $papertypes['paper_type_name']?></td>


						<td><a href="edit-papertype.php?act=edit&id=<?php echo $papertypes['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $papertypes['id']?>&cat=papertype" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				