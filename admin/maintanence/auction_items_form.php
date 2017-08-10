<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();

	$auction_id = $_POST['auction_id'];
	$itemname = $_POST['itemname'];
	$description = $_POST['description'];
	$start_price = $_POST['start_price'];
	$reserve_price = $_POST['reserve_price'];
	$buy_it_now = $_POST['buy_it_now'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$seller_user_id = $_POST['seller_user_id'];
	$current_top_bidder = $_POST['current_top_bidder'];
	$highest_bid = $_POST['highest_bid'];
	$num_of_bids = $_POST['num_of_bids'];
	$category_id = $_POST['category_id'];
	$file = $_FILES['image']['tmp_name'];

	// strings for query functions
	$table_name = "AUCTION_ITEMS";
	$where_clause = "WHERE auction_id = " . $auction_id;

	//data for query functions
	$form_data = array(
		'AUCTION_ID' => $auction_id,
		'ITEM_NAME' => $itemname, 
		'DESCRIPTION' => $description,
		'STARTING_PRICE' => $start_price,
		'RESERVE_PRICE' => $reserve_price,
		'BIN_PRICE' => $buy_it_now,
		'BEGIN_TIME' => $start_date,
		'END_TIME' => $end_date,
		'SELLER_USER_ID' => $seller_user_id,
		'CURRENT_BUYER_USER_ID' => $current_top_bidder,
		'HIGHEST_BID' => $highest_bid,
		'NUM_OF_BIDS' => $num_of_bids
		
		
	);
	if(!(empty($_FILES['image']['tmp_name'])))
	{
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		$form_data['IMAGE'] = $image;
		$form_data['IMAGE_NAME'] = $image_name;

	}

	//retrieve button pressed
	if(isset($_POST['retrieve']))
	{

		$where = "AUCTION_ID";
		if($r = dbRetrieve($table_name, $where, $auction_id))
		{
			if($row = mysql_fetch_array($r))
			{
				$auction_id= $row['AUCTION_ID'];
				$itemname = $row['ITEM_NAME'];
		       	$description= $row['DESCRIPTION'];
                $start_price= $row['STARTING_PRICE'];
                $reserve_price=  $row['RESERVE_PRICE'];
                $buy_it_now=  $row['BIN_PRICE'];
                $start_date=  $row['BEGIN_TIME'];
                $end_date=  $row['END_TIME'];
                $seller_user_id=  $row['SELLER_USER_ID'];
                $current_top_bidder=  $row['CURRENT_BUYER_USER_ID'];
                $highest_bid= $row['HIGHEST_BID'];
                $num_of_bids=  $row['NUM_OF_BIDS'];
                $image=$row['IMAGE'];
                $table_name = "AUCTION_ITEM_CATEGORY";

					if($r = dbRetrieve($table_name, $where, $auction_id))
					{
						while($ai_row = mysql_fetch_array($r))
						{
							$category_id[] = $ai_row['CATEGORY_ID'];
						}
					
					}	
				
			}else{

				//alert box
				echo '<script language="javascript">';
				echo 'alert("Auction ID'.$auction_id.' does not exist")';
				echo '</script>';

				unset($auction_id);
				unset($itemname);
				
				
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
			 		echo 'alert("'.$auction_id.' has been added to the database")';
			 		echo '</script>';
			 }
		 }else
		 {
			 echo '<script language="javascript">';
			 echo 'alert("When adding a auction item all fields must be completed")';
			 echo '</script>';
		 }

	}

	if(isset($_POST['delete']))
	{

		$where = "AUCTION_ID";	
		$r=dbRetrieve($table_name, $where, $auction_id);
		$row = mysql_fetch_array($r);
		if($delete_resource=dbRowDelete($table_name,$where_clause))
		{

				//alert box
			echo '<script language="javascript">';
			echo 'alert("'.$auction_id.'  has been deleted from the database")';
			echo '</script>';

				unset($auction_id);			
				unset($itemname);
				unset($description);			
				unset($start_price);
				unset($reserve_price);			
				unset($buy_it_now);
				unset($start_date);			
				unset($end_date);
				unset($seller_user_id);
				unset($current_top_bidder);			
				unset($highest_bid);
				unset($num_of_bids);
		

		


		}
	}

if(isset($_POST['modify']))
	{
		if(isFormComplete($form_data))
		{

			
			$where = "AUCTION_ID";	
			$r=dbRetrieve($table_name, $where, $auction_id);
			$row = mysql_fetch_array($r);


		  	

			$where_clause="WHERE AUCTION_ID = " . $row['AUCTION_ID'];
			$aid = $row['AUCTION_ID'];
			mysql_query("LOCK TABLES AUCTION_ITEMS WRITE;");  

			
			if($update_resource=dbRowUpdate($table_name, $form_data, $where_clause))
			{
				echo '<script language="javascript">';
				echo 'alert("'.$itemname.' has been updated")';
				echo '</script>';
			}
			mysql_query("UNLOCK TABLES;");

			mysql_query("LOCK TABLES AUCTION_ITEM_CATEGORY WRITE;");
			$where_clause = "WHERE AUCTION_ID = ".$auction_id;
			$table_name = "AUCTION_ITEM_CATEGORY";
			dbRowDelete($table_name,$where_clause);
			?>
			<pre>
				<?php var_dump($category_id); ?>
			</pre>
			<?php 
			foreach ($category_id as $value) {
					$auction_item_category_form_data = array(
						'AUCTION_ID' => $auction_id,
						'CATEGORY_ID' => $value
					);

				dbRowInsert($table_name, $auction_item_category_form_data);
			}
			


		}else
		{
			echo '<script language="javascript">';
			echo 'alert("When updating a new order all fields must be completed")';
			echo '</script>';		
		}
		mysql_query("UNLOCK TABLES;");
	}




?>