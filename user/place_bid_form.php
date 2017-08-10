<?php 
	include "../database.php";
	include "../connect.php";
	require_user();

	$id = $_REQUEST['id'];

	if(isset($_REQUEST['id'])){
		$query = "SELECT * FROM AUCTION_ITEMS WHERE AUCTION_ID = ".$id;
		$r = mysql_query($query);
		$row = mysql_fetch_array($r);
		$num_of_views = $row['NUM_OF_VIEWS'];
		$num_of_views = $num_of_views + 1;
		$view_form['NUM_OF_VIEWS'] = $num_of_views;
		$table_name = "AUCTION_ITEMS";
		$where_clause = "WHERE AUCTION_ID = ".$id;
		dbRowUpdate($table_name, $view_form, $where_clause);
		if(isset($_POST['bid']))
		{

			$bid = $_POST['bid'];
			if($bid > $row['BIN_PRICE'] || $bid < $row['RESERVE_PRICE'] || $bid <= $row['HIGHEST_BID'])
			{
				if($bid <= $row['HIGHEST_BID'])
				{
					echo '<script language="javascript">';
					echo 'alert("Your bid must be greater than '.$row['HIGHEST_BID'].', the current highest bid")';
					echo '</script>';

				}else
				{
					echo '<script language="javascript">';
					echo 'alert("Your bid must be at least '.$row['RESERVE_PRICE'].' and at most '. $row['BIN_PRICE'] .'")';
					echo '</script>';
					
				}

			}else
			{

				$num_of_bids = $row['NUM_OF_BIDS'] + 1;
				$table_name = "AUCTION_ITEMS";
				$where_clause = "WHERE AUCTION_ID = " . $id;


				$form_data = array(
					'HIGHEST_BID' => $bid, 
					'CURRENT_BUYER_USER_ID' => $_SESSION['user_id'],
					'NUM_OF_BIDS' => $num_of_bids
				);
				mysql_query("LOCK TABLES AUCTION_ITEMS WRITE;");  

				
				if($update_resource=dbRowUpdate($table_name, $form_data, $where_clause))
				{
					if($bid != $row['BIN_PRICE'])
					{
						echo '<script language="javascript">';
						echo 'alert("Bid has been placed. You are currently the highest bidder")';
						echo '</script>';
						
					}
				}
				mysql_query("UNLOCK TABLES;");
				mysql_query("LOCK TABLES AUCTION_ITEMS WRITE;");  

				if($bid == $row['BIN_PRICE'])
				{
					if($delete_resource = dbRowDelete($table_name, $where_clause)){
						echo '<script language="javascript">';
						echo 'alert("Congratulations you have bought the item!")';
						echo '</script>';

					}

				}
				mysql_query("UNLOCK TABLES;");

			}

		}

	}else{
		header("Location: http://acadweb1.salisbury.edu/~CR1501/project_2/user/index.php");
	}

?>