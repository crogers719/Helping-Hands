<!DOCTYPE html>
<?php include "register_form.php"; ?>  

<html lang="en">

<?php include "_header.php"; ?>  
<div class="container">
	<div class="bs-docs-section">
		<div class="row">
		
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="forms">Register Form</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="well bs-component">
					<form action="" method="post" class="form-horizontal">
						<fieldset>
							<div class="form-group">
								<label for="username" class="col-lg-2 control-label">User Name</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?php if(isset($username)){ echo htmlspecialchars($username);} ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-lg-2 control-label">Password</label>
								<div class="col-lg-10">
									<input type="password" class="form-control" id="password" name ="password" placeholder="Password" value="<?php if(isset($password)){ echo htmlspecialchars($password);} ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label for="email" class="col-lg-2 control-label">E-mail</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php if(isset($email)){ echo htmlspecialchars($email);} ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="submit" class="btn btn-primary" name="sign_up">Sign Up</button>
								</div>
							</div>
						</fieldset>
					</form>
					
				</div>
			</div>
		</div>

	</div>
</div>

<?php include "_footer.php"; ?>


</html>
