<!DOCTYPE html>
<html lang="en">
<?php include "../database.php" ?>
<?php include "../connect.php" ?>
<?php require_user(); ?>

<?php include "../_header.php"; ?>

<div class="container">
	<h1>Hello, <?php if(isset($_SESSION['user'])){print $_SESSION['user'];} ?></h1>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="bs-component">
					<h1>Welcome to Helping Hands Auctions!</h1>
					<h2>User Home Page</h2>
					<div class="btn-group-vertical">
						<a href="/~CR1501/project_2/user/view_auctions_category.php" class="btn btn-default">View Active Auction Items by Category</a>
						
						<a href="/~CR1501/project_2/user/view_all_items.php" class="btn btn-default">View All Active Auction Items</a>
						<a href="/~CR1501/project_2/user/items_active_report.php" class="btn btn-default">Report of All Active Auction Items</a>
						<a href="/~CR1501/project_2/user/purchased_items.php" class="btn btn-default">Bought</a>
					
						<a href="/~CR1501/project_2/user/sold.php" class="btn btn-default">Sold</a>
						<a href="/~CR1501/project_2/user/list_item.php" class="btn btn-default">List Item</a>
						<a href="/~CR1501/project_2/user/update_item.php" class="btn btn-default">Modify Item</a>

						<a href="/~CR1501/project_2/user/feedback.php" class="btn btn-default">Search Feedback On Sellers</a>
						<a href="/~CR1501/project_2/user/feedback_leave.php" class="btn btn-default">Leave Feedback</a>
					</div>
				
			
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="bs-component">
	            	<div class="panel panel-default">
	            		<div class="panel-heading">Suggested Items</div>
						<div class="panel-body" id="suggested_items">
<?php 


$query = "SELECT * FROM AUCTION_ITEMS WHERE CURRENT_BUYER_USER_ID = ". $_SESSION['user_id'];
$r = mysql_query($query);
if(mysql_num_rows($r) == 0)
{
	//user is not the current buyer in any auctions
	$query = "SELECT * FROM HISTORY WHERE CURRENT_BUYER_USER_ID = ". $_SESSION['user_id'];
	$r = mysql_query($query);
	if(mysql_num_rows($r) == 0)
	{
		//no history or current auctions
		echo "<p>Not enough info! Buy some items or make some bids!</p>";
	}
	else{
		//user has bought at least 1 auction item
		while($row = mysql_fetch_array($r)){
			$ac_query = "SELECT * FROM AUCTION_ITEM_CATEGORY WHERE AUCTION_ID =".$row['AUCTION_ID'];
			$ac_r = mysql_query($ac_query);
			if(mysql_num_rows($ac_r) > 0){
				continue;
			}
		}
		if(mysql_num_rows($ac_r) > 0){
			$ac_row = mysql_fetch_array($ac_r);
			$cat_query = "SELECT * FROM AUCTION_ITEM_CATEGORY WHERE CATEGORY_ID = ".$ac_row['CATEGORY_ID'];
			$cat_r = mysql_query($cat_query);
			if(mysql_num_rows($cat_r)>0)
			{
				$category_name_r = mysql_query("SELECT * FROM CATEGORY WHERE CATEGORY_ID =".$ac_row['CATEGORY_ID']);
				$category_name_array = mysql_fetch_array($category_name_r);
				echo '<p>Based off your interest in the '.$category_name_array['CATEGORY_NAME'].' category</p>';
				$i = 0;
				while(($cat_row = mysql_fetch_array($cat_r)) && $i < 3){
					$item_query = "SELECT * FROM AUCTION_ITEMS WHERE NOT(CURRENT_BUYER_USER_ID =".$_SESSION['user_id'].") AND AUCTION_ID =".$cat_row['AUCTION_ID'];
					$item_r = mysql_query($item_query);
					if(mysql_num_rows($item_r)>0){

						$i = $i + 1;
						$item_row = mysql_fetch_array($item_r);
						echo "<p>".$item_row['ITEM_NAME']."</p>";
	          			echo '<a href="place_bid.php?id='.$item_row['AUCTION_ID'].'"><img src="data:image/jpeg;base64,' . base64_encode( $item_row['IMAGE'] ) . '" /></a>'; 
					}

				}if($i == 0){
					echo "<p>No Active Auctions of category ".$category_name_array['CATEGORY_NAME']."</p>";

				}
			}
		}

	}
}
else{
	//user is the current buyer of at least 1 auction item
	while($row = mysql_fetch_array($r)){
		$ac_query = "SELECT * FROM AUCTION_ITEM_CATEGORY WHERE AUCTION_ID =".$row['AUCTION_ID'];

		$ac_r = mysql_query($ac_query);
		if(mysql_num_rows($ac_r) > 0){
			continue;
		}
	}
	if(mysql_num_rows($ac_r) > 0){
		$ac_row = mysql_fetch_array($ac_r);
		$cat_query = "SELECT * FROM AUCTION_ITEM_CATEGORY WHERE CATEGORY_ID = ".$ac_row['CATEGORY_ID'];
		$cat_r = mysql_query($cat_query);
		if(mysql_num_rows($cat_r)>0)
		{	
			$category_name_r = mysql_query("SELECT * FROM CATEGORY WHERE CATEGORY_ID =".$ac_row['CATEGORY_ID']);
			$category_name_array = mysql_fetch_array($category_name_r);
			echo '<p>Based off your interest in the '.$category_name_array['CATEGORY_NAME'].' category</p>';

			$i = 0;
			while(($cat_row = mysql_fetch_array($cat_r)) && $i < 3){
				$item_query = "SELECT * FROM AUCTION_ITEMS WHERE NOT(CURRENT_BUYER_USER_ID =".$_SESSION['user_id'].") AND AUCTION_ID =".$cat_row['AUCTION_ID'];
				$item_r = mysql_query($item_query);
				if(mysql_num_rows($item_r)>0){
					$i = $i + 1;
					$item_row = mysql_fetch_array($item_r);
					echo "<p>".$item_row['ITEM_NAME']."</p>";
          			echo '<a href="place_bid.php?id='.$item_row['AUCTION_ID'].'"><img src="data:image/jpeg;base64,' . base64_encode( $item_row['IMAGE'] ) . '" /></a>'; 
				}

			}
		}
	}

}
 ?>
	                	</div>
	            	</div>
				</div>
			</div>

		</div>
			<!-- adjusts to window width -->

</div>
	
<?php include "../_footer.php"; ?>

</html>