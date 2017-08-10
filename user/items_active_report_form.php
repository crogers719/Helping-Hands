

<?php

	include "../database.php";
	include "../connect.php";
	require_user();

	

		if (isset($_POST['report'])) {



		$query="SELECT * FROM AUCTION_ITEMS";
		
		$r= mysql_query($query);

}

?>