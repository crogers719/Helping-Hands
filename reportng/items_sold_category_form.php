



<?php

	include "../../database.php";
	include "../../connect.php";
	require_admin();

	$category_id = $_POST['category_id'];
	?>
	<pre>
		<?php var_dump($category_id); ?>
	</pre>
	<?php 

	if (isset($_POST['report'])) 
	{

		$query="SELECT * FROM HISTORY a ";
		if(isset($_POST['category_id'])){
			$query .= "WHERE ( SELECT COUNT(*) FROM AUCTION_ITEM_CATEGORY ai WHERE a.AUCTION_ID = ai.AUCTION_ID AND CATEGORY_ID IN (";
			$i = 0;
			foreach ($category_id as $value) {
				if($i==0){
					$query .= $value;
				}else{
					$query .= ", ".$value;
				}
				$i++;

			}
			$query .= "))  AND HIGHEST_BID >= RESERVE_PRICE";

			?>
		  	<pre>
		 		<?php var_dump($query); ?>
		 	</pre>
		 	<?php 
			
			
		}
		$r= mysql_query($query);

	}

?>