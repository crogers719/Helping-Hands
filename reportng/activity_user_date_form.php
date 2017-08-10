<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();
	$user_id = $_POST['user_id'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];

?>
<pre>
	<?php var_dump($_POST); ?>
</pre>
<?php 

	if (isset($_POST['report'])) {


		$query="SELECT * FROM ACTIVITY_LOG_HISTORY WHERE USER_ID = ".$user_id." AND DATE_TIME_START BETWEEN '".$start_date."' AND '".$end_date."'";

		$r= mysql_query($query);

	}

?>