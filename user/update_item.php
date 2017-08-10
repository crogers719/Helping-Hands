<!DOCTYPE html>
<?php include "update_item_form.php"; ?>
<html lang="en">
<?php include "../_header.php"; ?>
<div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">Modify an Item</h1>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="well bs-component">
             <form action="" method="post" class="form-horizontal">
               <fieldset>
                 <div class="form-group">
                  <label for="auction_id">Search by Auction ID</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="auction_id" name="auction_id" placeholder="Auction ID">
                    </div>
                 </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                    </div>
                </div>
               </fieldset>
             </form>
              
            </div>
          </div>
        </div>
        <div class="row" <?php if(!isset($auction_id)) echo 'style="display: none;"' ?>>
            <div class="col-lg-6">
                <div class="well bs-component">
                  <div class="panel panel-default">
                    <div class="panel-heading">Auction ID: <?php if(isset($auction_id)){echo htmlspecialchars($auction_id);} ?></div>
                    <div class="panel-body">
                      <form action="" method="post" class="form-horizontal">
                          <fieldset>
                              <input type="hidden" name="auction_id" value=" <?php if(isset($auction_id)){echo htmlspecialchars($auction_id);} ?>">
                              <div class="form-group">
                                  <label for="itemname" class="col-lg-2 control-label">Item Name</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="itemname" name="itemname" placeholder="Item Name" value="<?php if(isset($itemname)){echo htmlspecialchars($itemname);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="categories" class="col-lg-2 control-label">Categories</label>
                                  <div class="col-lg-10">
                                    <?php 
                                    $category_query = "SELECT * FROM CATEGORY";
                                    $category_r = mysql_query($category_query);
                                    while($category_row = mysql_fetch_array($category_r)){
                                      echo '<div class="checkbox">';
                                      echo '<label>';
                                      echo '<input type="checkbox" id="'.$category_row['CATEGORY_NAME'].'" name="category_id[]" value="'.$category_row['CATEGORY_ID'].'"';
                                      if(is_array($category_id)&&in_array($category_row['CATEGORY_ID'], $category_id)) echo "checked";
                                      echo '> '.$category_row['CATEGORY_NAME'];
                                      echo '</label>';
                                      echo '</div>';
                                    }
                                    ?>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="description" class="col-lg-2 control-label">Description with 50 characters or less</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php if(isset($description)){ echo htmlspecialchars($description);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="start_price" class="col-lg-2 control-label">Start Price</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="start_price" name="start_price" placeholder="Start Price" value="<?php if(isset($start_price)){ echo htmlspecialchars($start_price);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="reserve_price" class="col-lg-2 control-label">Reserve Price</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="reserve_price" name="reserve_price" placeholder="Reserve Price" value="<?php if(isset($reserve_price)){ echo htmlspecialchars($reserve_price);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="buy_it_now" class="col-lg-2 control-label">Buy It Now Price</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="buy_it_now" name="buy_it_now" placeholder="Buy It Now Price" value="<?php if(isset($buy_it_now)){ echo htmlspecialchars($buy_it_now);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="start_date" class="col-lg-2 control-label">Start Date</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" id="start_date" name="start_date" placeholder="year month date" value="<?php if(isset($start_date)){ echo htmlspecialchars($start_date);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="end_date" class="col-lg-2 control-label">End Date</label>
                                  <div class="col-lg-10">
                                      <input type="datetime" class="form-control" id="end_date" name="end_date" placeholder="year month date" value="<?php if(isset($end_date)){ echo htmlspecialchars($end_date);} ?>">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="fileToUpload" class="col-lg-2 control-label">Upload Photo</label>
                                  <div class="col-lg-10" id="suggested_items">
                                      <input type="file" name="fileToUpload" id="fileToUpload">
          <?php echo '<img src="data:image/jpeg;base64,' . base64_encode( $row['IMAGE'] ) . '" />'; ?>
            
                                      <!--         <input type="submit" value="Upload Image" name="submit">
   -->
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                      <button type="submit" name="modify" class="btn btn-primary">Request Changes</button>
                                  </div>
                              </div>
                          </fieldset>
                      </form>


                    </div>

                  </div>

</div>
</div>
</div>
</div>
</div>


<?php include "../_footer.php"; ?>
</html>
