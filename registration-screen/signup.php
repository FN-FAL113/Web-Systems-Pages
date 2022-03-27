<?php

	$firstname = $_POST['firstname'] ?? null;
	$lastname = $_POST['lastname'] ?? null;
	$username = $_POST['username'] ?? null;
	$email = $_POST['email'] ?? null;
	$birth = $_POST['birth'] ?? null;
	$home_add = $_POST['home_add'] ?? null;
	$sex = $_POST['sex'] ?? null;
	$password = $_POST['password'] ?? null;
	$description = $_POST['description'] ?? null;
	$agree_terms = $_POST['agree_terms'] ?? null;
	$has_error = 0;
	$error_msg = '';

	if($_SERVER["REQUEST_METHOD"] === "POST") {

		if(!isset($firstname) || strlen(trim($firstname)) == 0 ){
			$has_error = 1;
			$error_msg .= ' &bull; First name is required.<br />';
		}

		if(!isset($lastname) || strlen(trim($lastname)) == 0 ){
			$has_error = 1;
			$error_msg .= ' &bull; Last name is required.<br />';
		}

		if(!isset($username) || strlen(trim($username)) == 0 ){
			$has_error = 1;
			$error_msg .= ' &bull; User name is required.<br />';
		}

		if(!isset($email) || strlen(trim($email)) == 0 ){
			$has_error = 1;
			$error_msg .= ' &bull; Email is required.<br />';
		}

		if(!isset($password) || strlen(trim($password)) == 0 ){
			$has_error = 1;
			$error_msg .= ' &bull; Password is required.<br />';
		}

		if(!isset($agree_terms) || strlen(trim($agree_terms)) == 0 ){
			$has_error = 1;
			$error_msg .= ' &bull; Please review terms and consitions.<br />';
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Page</title>

	<!-- Bootstrap core CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

	<style type="text/css"> .has_error{ color: #842029; } .has_error input{ color: #842029; border-color: #842029; background-color: #f8d7da; } </style>
	
	<div class="container">

		<div class="row mx-auto">
			<div class="col-8 mx-auto">
				<div class="py-3">
					<img class="d-block mx-auto mb-4" src="https://www.freepnglogos.com/uploads/marvel-logo-png/new-marvel-studios-logo-debuted-marvelstudios-3.png" alt="image not found" height="100" width="350">
					<p class="text-center">Welcome to Marvel Studio website! </p>
					<p class="text-center">Please enter the needed information for account registration. </p>
				</div>
			</div>

			<?php if($has_error == 1): ?>
			<div class="col-12">
				<div class="alert alert-danger" role="alert">
					<strong class="">Attention!</strong>
					<p class=""><?php echo $error_msg; ?></p>
				</div>
			</div>
			<?php endif; ?>
			
		</div>

		<!--- Second row --->
		<div class="row mx-auto">
			<div class="container">
				<div class="  border border-4   p-4 mb-5">
					<h3 class="border-bottom text-center pb-4">Create Account</h3>
					<em class="">Fields having * are required.</em>

					<form class="mt-3" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="row">

							<div class="col-lg-6">

								<div class="<?php echo ( $_SERVER['REQUEST_METHOD'] === 'POST' && ( !isset($firstname) || strlen(trim($firstname)) == 0 ) ? 'has_error' : '' ); ?>">
									<label for="firstname" class="form-label"> First Name *</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" value="<?php echo $firstname; ?>">
									</div>
								</div>

								<div class="<?php echo ( $_SERVER['REQUEST_METHOD'] === 'POST' && ( !isset($lastname) || strlen(trim($lastname)) == 0 ) ? 'has_error' : '' ); ?>">
									<label for="lastname" class="form-label"> Last Name *</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" value="<?php echo $lastname; ?>">
									</div>
								</div>

								<div class="<?php echo ( $_SERVER['REQUEST_METHOD'] === 'POST' && ( !isset($username) || strlen(trim($username)) == 0 ) ? 'has_error' : '' ); ?>">
									<label for="username" class="form-label">Username *</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?php echo $username; ?>">
									</div>
								</div>

								<div class="<?php echo ( $_SERVER['REQUEST_METHOD'] === 'POST' && ( !isset($email) || strlen(trim($email)) == 0 ) ? 'has_error' : '' ); ?>">
									<label for="email" class="form-label">Email *</label>
									<div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">📧</span>
										<input type="email" class="form-control" id="email" name="email" placeholder="xyz@maildomain.com" value="<?php echo $email; ?>">
									</div>
								</div> 

								<div class="">					 
									<label for="birth" class="form-label">Date of Birth</label>
									<input type="date" id="birth" class="form-control" name="birth">
								</div>

							</div>



							<div class="col-lg-6">

								<div class="">
									<label for="home_add" class="form-label">Address</label>
									<div class="input-group mb-3">
										<span class="input-group-text" id="address">🏠</span>
										<input type="text" class="form-control" id="home_add" name="home_add" placeholder="Zone, Brg, Municipality, Region">
									</div>
								</div>

								<div class="">
									<!--- Gender Container --->
									<label class="form-label">Gender</label>
									<div class="gender">
										<input type="radio" name="sex" value="" class="invisible" checked="checked">
										<input type="radio" name="sex" id="male" value="male" class="form-check-input">
										<label for="male" class="male">Male</label>
										<input type="radio" name="sex" id="female" value="female" class="form-check-input ms-3">
										<label for="female" class="male">Female</label>
									</div>
									<!--- Gender Container --->
								</div>


								<div class="mt-4">
									<label for="upload" class="form-label mt-2">Upload Photo</label>
									<div class="input-group mb-3">
										<input type="file" class="form-control" id="upload"  aria-label="Upload">
									</div>
								</div>

								<div class="<?php echo ( $_SERVER['REQUEST_METHOD'] === 'POST' && ( !isset($password) || strlen(trim($password)) == 0 ) ? 'has_error' : '' ); ?>">
									<label for="password" class="form-label">Password *</label>
									<div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">*</span>
										<input type="password" class="form-control" id="password" name="password" placeholder="Password">
									</div>
								</div>

								<div class="">
									<label for="description" class="form-label">Bio</label>
									<div class="input-group mb-3">
										<input type="text" class="h-50 form-control" id="description" name="description" placeholder="Short description here...">
									</div>

								</div>

							</div>




							<div class="col-12 mb-2">
								<div class="row">
									<div class="col-12">
										<div class="form-check form-check-inline mt-4">
											<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="agree_terms">
											<label class="form-check-label" for="flexCheckChecked">
												* I agree to all <u>Terms of Service</u>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row mx-auto">
								<button class="btn-danger btn btn-lg btn-primary" type="submit">Register</button>
							</div>

						</div>
					</form>

				</div>
			</div>
			<!--- Second row --->


		</div>


	</div> 
</body>
</html>