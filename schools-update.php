<?php
	function school_update()
	{
		global $wpdb;
		$table_name=$wpdb->prefix.'school';
		
		$id=$_GET["id"];	
		
		//update
		if(isset($_REQUEST["update"]))
		{
			$name=$_REQUEST["school_name"];
			$principal=$_REQUEST["school_principal"];
			$contact=$_REQUEST["school_contact"];
			$wpdb->update($table_name,
				array('name'=>$name,"principal"=>$principal,"contact"=>$contact),//data
				array("id"=>$id),//where
				array("%s")//where format
			);
			echo '<script>location.href="'.admin_url('admin.php?page=schools_list').'";</script>';
		}
?>
	<link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
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
					//get data of particular id
					$schools=$wpdb->get_results($wpdb->prepare("select * from $table_name where id=%s",$id));
					
					foreach($schools as $s)
					{
						$name=$s->name;
						$principal=$s->principal;
						$contact=$s->contact;
					}
				?>
				<form method="post" action="<?php echo $_SERVER["REQUEST_URI"] ?>">
					<table class="table-hover table bordered">
						<tr>
							<th>School</th>
							<td><input type="text" name="school_name" class="form-control" value="<?php echo $name; ?>"></td>
						</tr>
						<tr>
							<th>Principal</th>
							<td><input type="text" value="<?php echo $principal; ?>" name="school_principal" class="form-control"></td>
						</tr>
						<tr>
							<th>Contact</th>
							<td><input type="text" value="<?php echo $contact; ?>" name="school_contact" class="form-control"></td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<td><input type="submit" name="update" value="Update" class="btn btn-success"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
<?php		
	}
?>