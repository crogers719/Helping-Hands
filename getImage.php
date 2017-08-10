<?php 
	include "database.php";
	include "connect.php";
	require_user();

	$id = $_REQUEST['id'];
	?>
	<pre>
		<?php var_dump($_REQUEST); ?>
	</pre>
	<?php 
	// $table_name = "AUCTION_ITEMS";
	// $where = "AUCTION_ID";
	// $r = dbRetrieve($table_name, $where, $id)
	$image = mysql_query("SELECT * FROM AUCTION_ITEMS WHERE AUCTION_ID = $id");
	$imageArray = mysql_fetch_assoc($image);
	$image = $imageArray['IMAGE'];

	$filename = $imageArray['IMAGE_NAME'];
	$ext = end(explode('.',$filename));
	header("Content-type:$ext");
	header('Content-Disposition: inline; filename="'.$filename.'"');
	echo $image;

 ?>