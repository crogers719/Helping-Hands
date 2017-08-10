<!DOCTYPE html>
<html lang="en">
<?php include "../database.php" ?>
<?php include "../connect.php" ?>
<?php session_start(); ?>	
<?php include "../_header.php"; ?>


<div class="container">
	<div class="page-header" id="banner">
		<div class="row">
			<!-- adjusts to window width -->
			<div class="col-lg-8 col-md-7 col-sm-6">
				<div class="bs-component">
					<h1>Welcome back Admin!</h1>
					<h2>Admininstrative Home Page</h2>
					<div class="btn-group-vertical">

						<a href="/~CR1501/project_2/admin/active_auctions.php" class="btn btn-default">All Active Auction Items</a>
						<a href="/~CR1501/project_2/admin/active_items_category.php" class="btn btn-default">Active Items In a Category</a>
						<a href="/~CR1501/project_2/admin/maintenance/index.php" class="btn btn-default">Maintenance</a>
						<a href="/~CR1501/project_2/admin/reporting/index.php" class="btn btn-default">Reporting</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	
<?php include "../_footer.php"; ?>

</html>
