<?php
	function add_school()
	{
		if(isset($_REQUEST["submit"]))
		{
			global $wpdb;
			$table_name=$wpdb->prefix.'school';
			
			$name=$_REQUEST["school_name"];
			$principal=$_REQUEST["school_principal"];
			$contact=$_REQUEST["school_contact"];

			$wpdb->insert(
				$table_name, //table
				array('name'=>$name,'principal'=>$principal,'contact'=>$contact),//data
				array("%s","%s","%s")//format
			);
			
			echo '<script>location.href="'.admin_url('admin.php?page=schools_list').'";</script>';
		}
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<H2>Add New School<H2>
				<?php
					if(isset($message))
					{
				?>
				<div class="updated"><p><?php echo $message; ?></p></div>
				<?php	
					}
				?>
				<form method="post" action="<?php echo $_SERVER["REQUEST_URI"] ?>">
					<table class="table-hover table bordered">
						<tr>
							<th>School</th>
							<td><input type="text" name="school_name" class="form-control" ></td>
						</tr>
						<tr>
							<th>Principal</th>
							<td><input type="text" name="school_principal" class="form-control"></td>
						</tr>
						<tr>
							<th>Contact</th>
							<td><input type="text" name="school_contact" class="form-control"></td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><input type="submit" name="submit" value="Add" class="btn btn-success"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
<?php		
	}
?>