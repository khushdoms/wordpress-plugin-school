<?php
function schools_lists()
{
	?>	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>List</h2>
				<br>
				<a href="<?php echo admin_url('admin.php?page=add_school'); ?>">Add new</a>
				<br><br>
				<?php
				global $wpdb;
				$table_name=$wpdb->prefix."school";
				$rows=$wpdb->get_results("select * from $table_name");
				?>		
				<table class="table-hover table-bordered">
					<tr>
						<th class="text-center">School Name</th>
						<th class="text-center">School Principal</th>
						<th class="text-center">School Contact</th>
						<th class="text-center" colspan="2">Action</th>
					</tr>
					<?php
					$count_query = "select count(*) from $table_name";
					$rowcount = $wpdb->get_var($count_query);
					if($rowcount > 0)
					{
						foreach($rows as $row)
						{
							?>
							<tr>
								<td align="left"><?php echo $row->name ?></td>
								<td align="left"><?php echo $row->principal ?></td>
								<td align="left"><?php echo $row->contact ?></td>
								<td align="left">
									<a href="<?php echo admin_url('admin.php?page=school_update&id='.$row->id); ?>">Update</a>
								</td>
								<td align="left">
									<a href="<?php echo admin_url('admin.php?page=school_delete&id='.$row->id); ?>">Delete </a>
								</td>
							</tr>
							<?php
						}
					}
					else
					{
						?>	
						<tr>
							<td class="text-center" colspan="5">No Data found !</td>
						</tr>
						<?php	
					}					
					?>
				</table>
			</div>
		</div>
	</div>	
	<?php	
}
?>