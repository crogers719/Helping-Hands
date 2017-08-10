<?php
	include "../../database.php";
	include "../../connect.php";
	require_admin();

	$seller_user_id= $_POST['seller_user_id'];
	$auction_id=$_POST['auction_id'];
	$comments= $_POST['comments'];


	$table_name = "USER_COMMENTS";
	$where_clause = "WHERE AUCTION_ID = " . $auction_id;

	//data for query functions
	$form_data = array(

	 	'SELLER_USER_ID' => $seller_user_id,
	 	 //ELLER_USER_ID' => $_SESSION['user_id'];
	 	 'AUCTION_ID' =>$auction_id,
	 	 'COMMENTS' => $comments
	 	 );

	if(isset($_POST['search']))
	{

		$where = "SELLER_USER_ID";
		if($r = dbRetrieve($table_name, $where, $seller_user_id))
		{
			if(mysql_num_rows($r)==0){
				//alert box
				echo '<script language="javascript">';
				echo 'alert("Seller ID #'.$seller_user_id.'not found. ")';
				echo '</script>';
				
				unset($seller_user_id);	
				?>
				<pre>	<?php 	var_dump($seller_user_id); ?></pre>
				<?php 	
			}
								
			
				
		}else{


				
		}
		

	}
