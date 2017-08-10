<?php
	include "../database.php";
	include "../connect.php";
	require_user();

	$user_id = $_SESSION['user_id'];
	$query = "SELECT * FROM HISTORY WHERE SELLER_USER_ID = ".$user_id." AND HIGHEST_BID >= RESERVE_PRICE";
	?>
	<pre>
		<?php var_dump($query); ?>
	</pre>
	<?php 

	$r = mysql_query($query);


 ?>