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
	
 	
		<div class="row">
			<div class="col-lg-6">
				<?php if(!isset($_SESSION['user'])){ ?>
					<div class="well bs-component">
						<form action="" method="post" class="form-horizontal">
							<fieldset>
								<div class="form-group">
									<label for="username" class="col-lg-2 control-label">User Name</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php if(isset($username)){ echo htmlspecialchars($username);} ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-lg-2 control-label">Password</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php if(isset($password)){ echo htmlspecialchars($password);} ?>">
									</div>
								</div>
								<div class="col-lg-10 col-lg-offset-2">
										<a href="forgotpass.php">Forgot Password</a>
										&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
										<a href="register.php">Register</a>
										<br>
								</div>
								<div class="form-group">
									<div class="col-lg-10 col-lg-offset-2">
										<button type="submit" class="btn btn-primary" name="index.php" onclick="return confirm('You are about to login. Do you want to continue?');">Login</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				<?php } ?>
			</div>					

		</div>



</div>

<?php include "_footer.php"; ?>

</html>