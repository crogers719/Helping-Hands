<?php
	include "../database.php";
	include "../connect.php";
	
	require_user();
	
	$itemname = $_POST['itemname'];
	$description= $_POST['description'];
	$start_price= $_POST['start_price'];
	$reserve_price= $_POST['reserve_price'];
	$buy_it_now= $_POST['buy_it_now'];
	$start_date= $_POST['start_date'];
	$end_date= $_POST['end_date'];
	$category_id = $_POST['category_id'];
	$file = $_FILES['image']['tmp_name'];
	// strings for query functions
	
	$table_name = "AUCTION_ITEMS";
	$where_clause = "WHERE ITEM_NAME = " . $itemname;

	
	$form_data = array(

		'ITEM_NAME' => $itemname,
		'DESCRIPTION' => $description,
		'STARTING_PRICE' => $start_price,
		'BEGIN_TIME' =>$start_date,
		'END_TIME' =>$end_date,
		'SELLER_USER_ID' => $_SESSION['user_id']
		);
	if(!(empty($_FILES['image']['tmp_name'])))
	{
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		$form_data['IMAGE'] = $image;
		$form_data['IMAGE_NAME'] = $image_name;

	}else
	{
		$image = addslashes(file_get_contents('../helping-hands-logo.jpg'));
		$image_name = addslashes('helping-hands-logo.jpg');
		$form_data['IMAGE'] = $image;
		$form_data['IMAGE_NAME'] = $image_name;

	}

	$isError=0;
	if(!empty($buy_it_now)){
		$form_data['BIN_PRICE'] = $buy_it_now;
		if($buy_it_now < $reserve_price || $buy_it_now < $start_price){

			$isError=1;
			$error = "You're buy it now price must be greater than the reserve and starting price.";
		}
	}
	if(!empty($reserve_price)){
		$form_data['RESERVE_PRICE'] = $reserve_price;
	}

	if(!isFormComplete($form_data)){
		$error .= " When registering information all fields must be completed. ";
	}


	if(isset($_POST['list_item']))
	{
		if(isFormComplete($form_data) && !$isError)
		{
			mysql_query("LOCK TABLES AUCTION_ITEMS WRITE;"); 
			if($insert_resource=dbRowInsert($table_name, $form_data))
			{			
						
				$aid = mysql_insert_id($connection);
				mysql_query("UNLOCK TABLES;");
				if(isset($_POST['category_id'])){

					foreach ($_POST['category_id'] as $value) {
						$auction_item_category_form_data = array(
								'AUCTION_ID' => $aid,
								'CATEGORY_ID' => $value
							);

						

						$table_name = "AUCTION_ITEM_CATEGORY";

						mysql_query("LOCK TABLES AUCTION_ITEM_CATEGORY WRITE;"); 
						dbRowInsert($table_name, $auction_item_category_form_data);
					}
				}
				echo '<script language="javascript">';
				echo 'alert("'.$itemname.' has been added to the database")';
				
				echo '</script>';
			}

			
		}else
		{
			echo '<script language="javascript">';
			echo 'alert("'.$error.'")';
			echo '</script>';
		}
mysql_query("UNLOCK TABLES;");
	}
	else{
		
	}

	

	
?>