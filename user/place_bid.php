<!DOCTYPE html>
<?php include "place_bid_form.php"; ?>
<html lang="en">
<?php include "../_header.php"; ?>
  <div class="container">
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="forms">Place Bid</h1>
                </div>
            </div>
        </div>
            <?php 
              if(isset($_REQUEST['id']))
              {
                echo '<div class="row">';
                echo '<div class="col-lg-12">';
                echo '<div class="well bs-component">';
                echo '<div class="panel panel-default">';
                echo '<div class="panel-heading">Auction ID: '.$row['AUCTION_ID'].'</div>';
                echo '<div class="panel-body">';
                echo '<table class="table table-striped table-hover ">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Item Name</th>';
                echo '<th>Description</th>';
                echo '<th>Start Price</th>';
                echo '<th>Reserve Price</th>';
                echo '<th>Buy it Now Price</th>';
                echo '<th>Start Date</th>';
                echo '<th>End Date</th>';
                echo '<th>Current Bid</th>';
                echo '<th>Number of Bids</th>';
                echo '<th>Image</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';    

                echo '<tr class="info">';
                echo '<td>'.$row['ITEM_NAME'].'</td>';
                echo '<td>'.$row['DESCRIPTION'].'</td>';
                echo '<td>'.$row['STARTING_PRICE'].'</td>';
                echo '<td>'.$row['RESERVE_PRICE'].'</td>';
                echo '<td>'.$row['BIN_PRICE'].'</td>';
                echo '<td>'.$row['BEGIN_TIME'].'</td>';
                echo '<td>'.$row['END_TIME'].'</td>';
                echo '<td>'.$row['HIGHEST_BID'].'</td>';
                echo '<td>'.$row['NUM_OF_BIDS'].'</td>';
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode( $row['IMAGE'] ) . '" />';
                echo '<td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

              }
             ?>
             <form action="" method="post" class="form-horizontal">
               <fieldset>
                 <div class="form-group">
                  <label for="bid" class="col-lg-2 control-label">Place a Bid (Buy it now for $<?php echo $row['BIN_PRICE']; ?>!)</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="bid" name="bid" placeholder="Enter Bid...">
                    </div>
                 </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
               </fieldset>
             </form>
              
            </div>
          </div>
        </div>

    </div>
  </div>

</html>
