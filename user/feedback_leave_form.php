<?php
	include "../database.php";
	include "../connect.php";
	require_user();

	$seller_user_id= $_POST['seller_user_id'];
	$auction_id=$_POST['auction_id'];
	$comments= $_POST['comments'];


	$table_name = "AUCTION_ITEMS";
	$where_clause = "WHERE AUCTION_ID = " . $auction_id;

	//data for query functions
	$form_data = array(
 	 
	 	 'AUCTION_ID' =>$auction_id,
	 	 'COMMENTS' => $comments,
	 	 'USER_ID'=>$_SESSION['user_id']
	 	 );

	if(isset($_POST['search']))

	{

		$where = "AUCTION_ID";
		if($r = dbRetrieve($table_name, $where, $auction_id))
		{
			
			if($row = mysql_fetch_array($r))
			{
				$auction_id = $row['AUCTION_ID'];
				$form_data['SELLER_USER_ID']=$row['SELLER_USER_ID'];
				$seller_user_id=$row['SELLER_USER_ID'];
			}	else if($r = dbRetrieve("HISTORY",$where,$auction_id)){			
			
				if($row = mysql_fetch_array($r)){
					$auction_id = $row['AUCTION_ID'];
					$form_data['SELLER_USER_ID']=$row['SELLER_USER_ID'];
					$seller_user_id=$row['SELLER_USER_ID'];

				}


			}else{
				//alert box
				echo '<script language="javascript">';
				echo 'alert("Auction ID #'.$auction_id.' not found. ")';
				echo '</script>';
				
			}
		}
	}


	if(isset($_POST['list_comment']))
	{
		$where = "AUCTION_ID";
		if($r = dbRetrieve($table_name, $where, $auction_id))
		{
			
			if($row = mysql_fetch_array($r))
			{
				$auction_id = $row['AUCTION_ID'];
				$form_data['SELLER_USER_ID']=$row['SELLER_USER_ID'];
				$seller_user_id=$row['SELLER_USER_ID'];

			}				


			if(isFormComplete($form_data))
			{
				$table_name = "USER_COMMENTS";
				mysql_query("LOCK TABLES USER_COMMENTS WRITE;"); 
				if($insert_resource=dbRowInsert($table_name, $form_data))
				{			

					echo '<script language="javascript">';
					echo 'alert("'.$auction_id.' comment has been added to the database")';
					
					echo '</script>';
				}
			}
		}
	}
?>


