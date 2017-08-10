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
					<h1>Maintenance</h1>
					<div class="btn-group-vertical">
						<a href="/~CR1501/project_2/admin/maintenance/category.php" class="btn btn-default">Category Maintenance</a>
						<a href="/~CR1501/project_2/admin/maintenance/auction_items.php" class="btn btn-default">Auction Items Maintenance</a>
						<a href="/~CR1501/project_2/admin/maintenance/user.php" class="btn btn-default">User Information</a>
						<a href="/~CR1501/project_2/admin/maintenance/security_info.php" class="btn btn-default">Security Level of Users</a>
						<a href="/~CR1501/project_2/admin/maintenance/seller_comments.php" class="btn btn-default">Comments</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php include "../../_footer.php"; ?>

</html>
