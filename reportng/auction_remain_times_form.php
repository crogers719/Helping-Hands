

<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();

	

		if (isset($_POST['report'])) {



		$query="SELECT * FROM AUCTION_ITEMS";
		
		$r= mysql_query($query);

}

?>