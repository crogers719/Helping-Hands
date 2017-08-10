<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();

$category_id = $_POST[category_id];
	$category_name = $_POST[category_name];
	

	// strings for query functions
	$table_name = "CATEGORY";
	$where_clause = "WHERE category_id = " . $category_id;

	//data for query functions
	$form_data = array(
		'CATEGORY_ID' => $category_id,
		'CATEGORY_NAME' => $category_name
		
	);

	//retrieve button pressed
	if(isset($_POST['retrieve']))
	{

		$where = "CATEGORY_ID";
		if($r = dbRetrieve($table_name, $where, $category_id))
		{
			if($row = mysql_fetch_array($r))
			{
				$category_id= $row['CATEGORY_ID'];
				$category_name = $row['CATEGORY_NAME'];
				
				
			}else{

				//alert box
				echo '<script language="javascript">';
				echo 'alert("Category ID'.$category_id.' does not exist")';
				echo '</script>';

				unset($category_id);
				unset($category_id);
				
				
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
			 		echo 'alert("'.$category_id.' has been added to the database")';
			 		echo '</script>';
			 }
		 }else
		 {
			 echo '<script language="javascript">';
			 echo 'alert("When adding a category all fields must be completed")';
			 echo '</script>';
		 }

	}

	if(isset($_POST['delete']))
	{

		$where = "CATEGORY_ID";	
		$r=dbRetrieve($table_name, $where, $category_id);
		$row = mysql_fetch_array($r);
		if($delete_resource=dbRowDelete($table_name,$where_clause))
		{
				//alert box
			echo '<script language="javascript">';
			echo 'alert("'.$category_id.'  has been deleted from the database")';
			echo '</script>';

				unset($category_id);			
				unset($category_name);
					

			
		}
	}

	if(isset($_POST['modify']))
	{
		if(isFormComplete($form_data))
		{
			if($update_resource=dbRowUpdate($table_name, $form_data, $where_clause))
			{
				echo '<script language="javascript">';
				echo 'alert("'.$category_id.'  has been updated")';
				echo '</script>';
			}
		}else
		{
			echo '<script language="javascript">';
			echo 'alert("When updating a new category all fields must be completed")';
			echo '</script>';		
		}
	}



?>