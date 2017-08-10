<?php
	include "../../database.php";
	include "../../connect.php";
	require_admin();



	$seller_user_id = $_POST['seller_user_id'];
	$query = "SELECT * FROM HISTORY WHERE SELLER_USER_ID = ".$seller_user_id." AND HIGHEST_BID >= RESERVE_PRICE";
	?>
	<pre>
		<?php var_dump($query); ?>
	</pre>
	<?php 

	$r = mysql_query($query);


 ?>