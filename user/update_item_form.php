<?php
	include "../database.php";
	include "../connect.php";
	require_user();

	$auction_id= $_POST['auction_id'];
	$itemname = $_POST['itemname'];
	$description= $_POST['description'];
	$start_price= $_POST['start_price'];
	$reserve_price= $_POST['reserve_price'];
	$buy_it_now= $_POST['buy_it_now'];
	$start_date= $_POST['start_date'];
	$end_date= $_POST['end_date'];
	$category_id = $_POST['category_id'];
	// strings for query functions
	
	$table_name = "AUCTION_ITEMS";
	$where_clause = "WHERE ITEM_NAME = " . $itemname;

	//data for query functions
	$form_data = array(

		'AUCTION_ID' =>$auction_id,
		'ITEM_NAME' => $itemname,
		'DESCRIPTION' => $description,
		'STARTING_PRICE' => $start_price,
		'RESERVE_PRICE' =>$reserve_price,
		'BIN_PRICE' =>$buy_it_now,
		'BEGIN_TIME' =>$start_date,
		'END_TIME' =>$end_date,
		'SELLER_USER_ID' => $_SESSION['user_id']
		);

	if(isset($_POST['search']))
	{

		$where = "AUCTION_ID";
		if($r = dbRetrieve($table_name, $where, $auction_id))
		{
			if($row = mysql_fetch_array($r))
			{
				
				if($_SESSION['user_id']==$row['SELLER_USER_ID']){


					$auction_id = $row['AUCTION_ID'];
					$itemname= $row['ITEM_NAME'];
					$description = $row['DESCRIPTION'];
					$start_price = $row['STARTING_PRICE'];
					$reserve_price = $row['RESERVE_PRICE'];
					$buy_it_now = $row['BIN_PRICE'];
					$start_date = $row['BEGIN_TIME'];
					$end_date = $row['END_TIME'];

					$table_name = "AUCTION_ITEM_CATEGORY";

					if($r = dbRetrieve($table_name, $where, $auction_id))
					{
						while($ai_row = mysql_fetch_array($r))
						{
							$category_id[] = $ai_row['CATEGORY_ID'];
						}
					
					}	
				}else{
					echo '<script language="javascript">';
					echo 'alert("Permission Denied. No item found with auction id #'.$auction_id.' ")';
					echo '</script>';

					unset($auction_id);

				}
			}else{

				//alert box
				echo '<script language="javascript">';
				echo 'alert("Permission Denied. No item found with auction id #'.$auction_id.' ")';
				echo '</script>';
				
				unset($auction_id);
				unset($itemname);
				unset($description);
				unset($start_price);
				unset($reserve_price);
				unset($buy_it_now);
				unset($start_date);
				unset($end_date	);
				
			}
		}

	}

	

if(isset($_POST['delete']))
	{
		
			$where = "ITEM_NAME";	
			$r=dbRetrieve($table_name, $where, $itemname);
			$row = mysql_fetch_array($r);
		  	

		$where_clause="WHERE AUCTION_ID = " . $row['AUCTION_ID'];
		$aid = $row['AUCTION_ID'];
		mysql_query("LOCK TABLES AUCTION_ITEMS WRITE;");  
		if($delete_resource=dbRowDelete($table_name,$where_clause))

		{	
			mysql_query("UNLOCK TABLES;");
			$where = "AUCTION_ID";	
			$table_name = "AUCTION_ITEM_CATEGORY";
			
				
			$r=dbRetrieve($table_name, $where, $aid);
			while($ai_row = mysql_fetch_array($r)){

				$auction_item_category_form_data = array(
						'AUCTION_ID' => $ai_row['AUCTION_ID'],
						'CATEGORY_ID' => $ai_row['CATEGORY_ID']
					);
					
					$where_clause = "WHERE AUCTION_ID = ". $ai_row['AUCTION_ID'] . " AND CATEGORY_ID = " . $ai_row['CATEGORY_ID']; 
					mysql_query("LOCK TABLES AUCTION_ITEM_CATEGORY WRITE;");  
					dbRowDelete($table_name, $where_clause);
				
			}
			
			//alert box
			echo '<script language="javascript">';
			echo 'alert("'.$itemname.'  has been deleted from the database")';
			echo '</script>';

				unset($itemname);
				unset($description);
				unset($start_price);
				unset($reserve_price);
				unset($buy_it_now);
				unset($start_date);
				unset($end_date);


			
		}
	mysql_query("UNLOCK TABLES;");
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
			header("Location: http://acadweb1.salisbury.edu/~CR1501/project_2/user/modify_auction_email_success.php");
			exit();


		}else
		{
			echo '<script language="javascript">';
			echo 'alert("When updating a new order all fields must be completed")';
			echo '</script>';		
		}
		mysql_query("UNLOCK TABLES;");
	}


	
?>