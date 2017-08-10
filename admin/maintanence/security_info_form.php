<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();

	$user_id = $_POST['user_id'];
	$security_level = $_POST['security_level'];
	

	// strings for query functions
	$table_name = "SECURITY";
	$where_clause = "WHERE user_id = " . $user_id;

	//data for query functions
	$form_data = array(
		'USER_ID' => $user_id,
		'SECURITY_LEVEL' => $security_level
		
	);

	//retrieve button pressed
	if(isset($_POST['retrieve']))
	{

		$where = "USER_ID";
		if($r = dbRetrieve($table_name, $where, $user_id))
		{
			if($row = mysql_fetch_array($r))
			{
				$user_id= $row['USER_ID'];
				$security_level = $row['SECURITY_LEVEL'];
				
				
			}else{

				//alert box
				echo '<script language="javascript">';
				echo 'alert("User ID'.$user_id.' does not exist")';
				echo '</script>';

				unset($user_id);
				unset($security_level);
				
				
			}
		}

	}

	if(isset($_POST['add']))
	{
		// echo dbRowInsert($table_name, $form_data);
		 if(isFormComplete($form_data))
		 {
			 if($insert_resource=dbRowInsert($table_name, $form_data))
			 {
					echo '<script language="javascript">';
			 		echo 'alert("'.$user_id.' has been added to the database")';
			 		echo '</script>';
			 }
		 }else
		 {
			 echo '<script language="javascript">';
			 echo 'alert("When adding a security level for a user all fields must be completed")';
			 echo '</script>';
		 }

	}

	if(isset($_POST['delete']))
	{

		$where = "USER_ID";	
		$r=dbRetrieve($table_name, $where, $user_id);
		$row = mysql_fetch_array($r);
		if($delete_resource=dbRowDelete($table_name,$where_clause))
		{
				//alert box
			echo '<script language="javascript">';
			echo 'alert("'.$user_id.'  has been deleted from the database")';
			echo '</script>';

				unset($user_id);			
				unset($security_level);
					

			
		}
	}

	if(isset($_POST['modify']))
	{
		if(isFormComplete($form_data))
		{
			if($update_resource=dbRowUpdate($table_name, $form_data, $where_clause))
			{
				echo '<script language="javascript">';
				echo 'alert("'.$user_id.'  has been updated")';
				echo '</script>';
			}
		}else
		{
			echo '<script language="javascript">';
			echo 'alert("When updating a security level for a user all fields must be completed")';
			echo '</script>';		
		}
	}



?>