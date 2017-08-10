<!DOCTYPE html>


<?php include "forgotpass_form.php"; ?>  
<?php include "_header.php"; ?>  
<html lang="en">


<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="bs-component">
				<div class="jumbotron">
				  <h1>Helping Hands Non-Profit Auction</h1>
				  <p>Please enter your email and your password will be sent to you!</p>
				</div>		
			</div>	
		</div>
			
	</div>
	
	
		<div class="row">
			<div class="col-lg-6">
				<div class="well bs-component">
					<form action="/~CR1501/phpmailer-fe.php" method="post" class="form-horizontal">
							<input type="hidden" name="redirect" value="/~CR1501/project_2/pass_reset_success.php">
							<form action="/~CR1501/phpmailer-fe.php" method="post" class="form-horizontal">
							<input type="hidden" name="redirect" value="/~CR1501/project_2/pass_reset_fail.php">
						<fieldset>
							<div class="form-group">
								<label for="email" class="col-lg-2 control-label">E-mail</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php if(isset($email)){ echo htmlspecialchars($email);} ?>" required>
								</div>
							</div>
								<div class="col-lg-10 col-lg-offset-2">
							</div>
							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="submit" class="btn btn-primary" name="submit">Submit</button>

								</div>
							</div>
						</fieldset>
					</form>
					</form>
				</div>
			</div> 
		</div>



</div>

<?php include "_footer.php"; ?>

</html>