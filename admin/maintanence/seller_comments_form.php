<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();

	$comment_id = $_POST[comment_id];
	$seller_user_id = $_POST[seller_user_id];
	$user_id = $_POST[user_id];
	$auction_id = $_POST[auction_id];
	$comment = $_POST[comment];
	// strings for query functions
	$table_name = "USER_COMMENTS";
	$where_clause = "WHERE comment_id = " . $comment_id;

	//data for query functions
	$form_data = array(
		'COMMENT_ID' => $comment_id,
		'SELLER_USER_ID' => $seller_user_id,
		'USER_ID' => $user_id,
		'AUCTION_ID' => $auction_id,
		'COMMENTS' => $comment
	);

	//retrieve button pressed
	if(isset($_POST['retrieve']))
	{

		$where = "COMMENT_ID";
		if($r = dbRetrieve($table_name, $where, $comment_id))
		{
			if($row = mysql_fetch_array($r))
			{
				$comment_id= $row['COMMENT_ID'];
				$seller_user_id = $row['SELLER_USER_ID'];
				$user_id= $row['USER_ID'];
				$auction_id = $row['AUCTION_ID'];
				$comment= $row['COMMENTS'];
				
			}else{

				//alert box
				echo '<script language="javascript">';
				echo 'alert("Comment ID'.$comment_id.' does not exist")';
				echo '</script>';

				unset($comment_id);
				unset($seller_user_id);
				unset($user_id);
				unset($auction_id);
				unset($comment);
				
				
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
			 		echo 'alert("'.$comment_id.' has been added to the database")';
			 		echo '</script>';
			 }
		 }else
		 {
			 echo '<script language="javascript">';
			 echo 'alert("When adding a comment all fields must be completed")';
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
				unset($comment_id);
				unset($seller_user_id);
				unset($user_id);
				unset($auction_id);
				unset($comment);
				
					

			
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