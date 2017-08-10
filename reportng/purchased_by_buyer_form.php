<?php
	include "../../database.php";
	include "../../connect.php";
	require_admin();

	$buyer_user_id= $_POST['buyer_user_id'];


	if(isset($_POST['search']))
	{

		$where = "CURRENT_BUYER_USER_ID";
		$query="SELECT * FROM HISTORY WHERE CURRENT_BUYER_USER_ID = ". $buyer_user_id." AND HIGHEST_BID >= RESERVE_PRICE";
		
		if($r= mysql_query($query))
		{
			if(mysql_num_rows($r)==0){
				//alert box
				echo '<script language="javascript">';
				echo 'alert("Buyer #'.$buyer_user_id.'not found. ")';
				echo '</script>';
				
				unset($buyer_user_id);	
			}

		}



	}
?>