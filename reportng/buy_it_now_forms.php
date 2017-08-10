<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();

	

		if (isset($_POST['report'])) {



		$query="SELECT * FROM HISTORY WHERE BIN_PRICE = HIGHEST_BID";
		
		$r= mysql_query($query);

}

?>