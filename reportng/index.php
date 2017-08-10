<!DOCTYPE html>
<html lang="en">
<?php 	include "../../database.php" ?>
<?php 	include "../../connect.php" ?>
<?php include "../../_header.php"; ?>

<div class="container">
	<div class="page-header" id="banner">
		<div class="row">
			<!-- adjusts to window width -->
			<div class="col-lg-8 col-md-7 col-sm-6">
				<div class="bs-component">
					<h1>Reporting</h1>
					<div class="btn-group-vertical">
						<a href="/~CR1501/project_2/admin/reporting/items_sold_by_seller.php" class="btn btn-default">Items Sold By Seller Report</a>
						<a href="/~CR1501/project_2/admin/reporting/comments.php" class="btn btn-default">Comments about Seller Report</a>
						<a href="/~CR1501/project_2/admin/reporting/auction_remain_times.php" class="btn btn-default">Items Remaining in the Auction Report</a>
						<a href="/~CR1501/project_2/admin/reporting/buy_it_now.php" class="btn btn-default">Buy It Now Reports</a>
						<a href="/~CR1501/project_2/admin/reporting/purchased_by_buyer.php" class="btn btn-default">Purchased By Buyer Report</a>
						<a href="/~CR1501/project_2/admin/reporting/date_range_items.php" class="btn btn-default">Items Purchased within a Date Range Report</a>
						<a href="/~CR1501/project_2/admin/reporting/amount_range.php" class="btn btn-default">Items Purchased between Price Range Report</a>
						<a href="/~CR1501/project_2/admin/reporting/items_sold_category.php" class="btn btn-default">Items Sold based On Category Report</a>
						<a href="/~CR1501/project_2/admin/reporting/items_sold_sorted.php" class="btn btn-default">Items Sold and sorted by category & Item Number Report</a>
						<a href="/~CR1501/project_2/admin/reporting/security_log.php" class="btn btn-default">Security Log Report</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php include "../../_footer.php"; ?>

</html>
