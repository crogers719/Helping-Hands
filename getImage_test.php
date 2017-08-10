<!DOCTYPE html>

<?php include "login.php"; ?>  
<html lang="en">

<?php include "_header.php"; ?>  
<div class="container">

	<div class="row">
	<div class="col-lg-12">
		<div class="bs-component">
			<div class="jumbotron">
			  <h1>Helping Hands Non-Profit Auction</h1>
			  <p>Welcome to Helping Hands Auction</p>
			</div>		
		</div>	
	</div>
	<?php 
		$query = "SELECT * FROM AUCTION_ITEMS WHERE AUCTION_ID = 84";
		$r = mysql_query($query);
		$row = mysql_fetch_array($r);
		$image = $row['IMAGE'];
		echo '<img src="data:image/jpeg;base64, ' . base64_encode($image) . '/>"';
	 ?>
 	




</div>

<?php include "_footer.php"; ?>

</html>