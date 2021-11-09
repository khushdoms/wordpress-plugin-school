<?php
	function school_delete()
	{
		
		$id=$_GET["id"];
		
		if(isset($id))
		{
			global $wpdb;
			$tablename=$wpdb->prefix."school";
			
			$sql="delete from $tablename where id=".$id;
			$wpdb->query($sql);
			echo '<script>location.href="'.admin_url('admin.php?page=schools_list').'";</script>';
		}
	}
?>