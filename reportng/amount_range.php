<!DOCTYPE html>
 <?php include "amount_range_form.php"; ?>  

<html lang="en">

<?php include "../../_header.php"; ?>  

<div class="container">
	<div class="bs-docs-section">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="forms">Items Sold between an Amount Range Report</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="well bs-component">
					<form action="" method="post" class="form-horizontal">
						<fieldset>
							<div class="form-group">
								<label for="amount_one" class="col-lg-2 control-label">Amount 1</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="amount_one" name="amount_one" placeholder="Amount 1 " value="<?php if(isset($amount_one)){ echo htmlspecialchars($amount_one);} ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label for="amount_two" class="col-lg-2 control-label">Amount 2</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="amount_two" name="amount_two" placeholder="Amount 2" value="<?php if(isset($amount_two)){ echo htmlspecialchars($amount_two);} ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="submit" class="btn btn-primary" name="report">Report</button>
								</div>
							</div>
						</fieldset>
					</form>
 </div>
</div>
  </div>					
						<?php 

				if(mysql_num_rows($order_row_r)!= 0){
                  echo '<div class="row">';
                  echo '<div class="col-lg-12">';
                  echo '<div class="well bs-component">';
                  echo '<div class="panel panel-default">';
                  echo '<div class="panel-heading">';
                  echo '<div class="panel-body">';

             echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Item Name</th>';
                echo '<th>Seller ID</th>';
                echo '<th>Buyer ID</th>';
                 echo '<th>Price Bought</th>';
                echo '<th>Category</th>';
				echo '<th>Date Purchased</th>';

                echo '<th>Image</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';            
      

               while($row=mysql_fetch_array($order_row_r)){
                  $seller_username_query = "SELECT USERNAME FROM USERS WHERE USER_ID = ".$row['SELLER_USER_ID'];
                  $seller_username_r = mysql_query($seller_username_query);
                  $seller_username_array = mysql_fetch_array($seller_username_r);

                  $buyer_username_query = "SELECT USERNAME FROM USERS WHERE USER_ID = ".$row['CURRENT_BUYER_USER_ID'];
                  $buyer_username_r = mysql_query($buyer_username_query);
                  $buyer_username_array = mysql_fetch_array($buyer_username_r);
                  
                  $auction_item_category_query = "SELECT * FROM AUCTION_ITEM_CATEGORY WHERE AUCTION_ID = ".$row['AUCTION_ID'];
                  $auction_item_category_r = mysql_query($auction_item_category_query);


                 echo '<tr class="info">';
                  echo '<td>'.$row['ITEM_NAME'].'</td>';
                  echo '<td>'.$row['SELLER_USER_ID'].'</td>';
                   echo '<td>'.$row['CURRENT_BUYER_USER_ID'].'</td>';
                  echo '<td>'.$row['HIGHEST_BID'].'</td>';
            
                  echo '<td>';
                  while($auction_item_category_array = mysql_fetch_array($auction_item_category_r))
                  {
                    $category_query = "SELECT CATEGORY_NAME FROM CATEGORY WHERE CATEGORY_ID = ".$auction_item_category_array['CATEGORY_ID'];
                    $category_r = mysql_query($category_query);
                    $i=0;
                    while($category_array = mysql_fetch_array($category_r)){
                      echo $category_array['CATEGORY_NAME']." ";
            
                    }                    
                  }
                  echo '<td>'.$row['DATE_TIME_BOUGHT'].'</td>';

                  echo '</td>';
                  echo '<td><img src="data:image/jpeg;base64,' . base64_encode( $row['IMAGE'] ) . '" /></td>';
                  echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';

                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';

              }
             
          
          ?>


  </div>
</div>



<?php include "../../_footer.php"; ?>

</html>