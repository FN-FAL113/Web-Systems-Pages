<?php
//CHANGES IN LINE 9,35,246
// add 337-345
	$firstname = $_POST['firstname'] ?? null;
	$lastname = $_POST['lastname'] ?? null;
	$username = $_POST['username'] ?? null;
	$email = $_POST['email'] ?? null;
	$birth = $_POST['birth'] ?? null;
	$home_add = $_POST['home_add'] ?? null;
	$sex = $_POST['sex'] ?? null;
	$password = $_POST['password'] ?? null;
	$description = $_POST['description'] ?? null;
	$agree_terms = $_POST['agree_terms'] ?? '';
	$photo = $_FILES['upload']['name'] ?? null;
	$isPost = $_SERVER["REQUEST_METHOD"] === "POST";

	$target = "./uploads/";

	$uploadSuccess = 1;
	$uploadFail = 0;
	$fieldNotEmpty = 1;
	$fieldIsEmpty = 0;
	$allPassed = false;
	$Passed = false;
	

	$GLOBALS['uploadedSuccessfully'] = $GLOBALS['uploadSuccess'];
	$GLOBALS['target_dir'] = $GLOBALS['target'];
	$GLOBALS['fieldIsSet'] = $GLOBALS['fieldNotEmpty'];


	$flag = 0; 

	$error_icon ='<img src="https://www.seekpng.com/png/full/251-2514375_free-high-quality-error-youtube-icon-png-2018.png" height="20px" width="20px">'; 

	if($isPost && $agree_terms==1 && $photo !=null &&  $firstname !=null && $lastname!=null && $username!=null && $email!=null && $password!=null){
		
			$pdo = new PDO('mysql:host=localhost;post=3306;dbname=marvel_blog', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $pdo->prepare("INSERT INTO `registration` ( `firstname`, `lastname`, `username`, `email`, `birthday`, `address`, `sex`, `password`, `description`, `agree_terms`, `photo`) VALUES (:firstname, :lastname, :username, :email, :birthday, :address, :sex, :password, :description, :agree_terms, :photo) ");

			$statement->bindValue(':firstname', $firstname);
			$statement->bindValue(':lastname', $lastname);
			$statement->bindValue(':username', $username);
			$statement->bindValue(':email', $email);
			$statement->bindValue(':birthday', $birth);
			$statement->bindValue(':address', $home_add);
			$statement->bindValue(':sex', $sex);
		    $statement->bindValue(':password', md5($password));
		    $statement->bindValue(':description', $description);
		    $statement->bindValue(':agree_terms', $agree_terms);
		    $statement->bindValue(':photo', $photo);

			$xecute = $statement->execute();

			$Passed = true;
		

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">


	<!-- Sweer Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
	
</head>
<body>


	<style type="text/css"> .has_error{ color: #b01c2a; } .has_error input{ color: #b01c2a; border-color: #b01c2a; border-width: medium;} 	
			* {
			font-family: 'Poppins';
			}
			
			div.animated {
    		opacity: 1;
    		animation: fade 1s linear;
		}


			@keyframes fade {
  			0%,100% { opacity: 0 }
  			50% { opacity: 1 }
		}

	</style>
	
	<div class="container">

		<div class="row mx-auto">
			<div class="col-8 mx-auto">
				<div class="py-3">
					<img class="d-block mx-auto mb-4" src="https://www.freepnglogos.com/uploads/marvel-logo-png/new-marvel-studios-logo-debuted-marvelstudios-3.png" alt="image not found" height="100" width="350">
					<p class="text-center">Welcome to Marvel Studio website! </p>
					<p class="text-center">Please enter the needed information for account registration. </p>
				</div>
			</div>

			
			
		</div>

		<!--- Second row --->
		<div class="row mx-auto">
			<div class="container">
				<div class="  border border-4   p-4 mb-5">
					<h3 class="border-bottom text-center pb-4">Create Account</h3>
					<em class="">Fields having * are required.</em>

					<form class="mt-3" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
						<div class="row">

							<div class="col-lg-6">

								<div class="<?php echo ( $isPost && ( !isset($firstname) || strlen(trim($firstname)) == 0 ) ? 'has_error' : $flag=1 ); ?>">
									<label for="firstname" class="form-label"> First Name *</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" value="<?php echo $firstname; ?>">
									</div>
								</div>
								<?php if($isPost && $flag != 1 ){
									$error_msg = " $error_icon First name is required.";
									checkError($error_msg);
									$GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
								} ?>
								

								<div class="<?php echo ( $isPost && ( !isset($lastname) || strlen(trim($lastname)) == 0 ) ? 'has_error' : $flag=2 ); ?>">
									<label for="lastname" class="form-label"> Last Name *</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" value="<?php echo $lastname; ?>">
									</div>
								</div>
								<?php if($isPost && $flag != 2 ){
									$error_msg = " $error_icon Last name is required.";
									checkError($error_msg);
									$GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
								} ?>

								<div class="<?php echo ( $isPost && ( !isset($username) || strlen(trim($username)) == 0 ) ? 'has_error' : $flag=3 ); ?>">
									<label for="username" class="form-label">Username *</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?php echo $username; ?>">
									</div>
								</div>
								<?php if($isPost && $flag != 3 ){
									$error_msg = " $error_icon User name is required.";
									checkError($error_msg);
									$GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
								} ?>

								<div class="<?php echo ( $isPost && ( !isset($email) || strlen(trim($email)) == 0 ) ? 'has_error' : $flag=4 ); ?>">
									<label for="email" class="form-label">Email *</label>
									<div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">????</span>
										<input type="email" class="form-control" id="email" name="email" placeholder="xyz@maildomain.com" value="<?php echo $email; ?>">
									</div>
								</div> 
								<?php if($isPost && $flag != 4 ){
									$error_msg = " $error_icon E-mail is required.";
									checkError($error_msg);
									$GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
								} ?>

								<div class="">					 
									<label for="birth" class="form-label">Date of Birth</label>
									<input type="date" id="birth" class="form-control" name="birth">
								</div>

							</div>



							<div class="col-lg-6">

								<div class="">
									<label for="home_add" class="form-label">Address</label>
									<div class="input-group mb-3">
										<span class="input-group-text" id="address">????</span>
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
									<label for="upload" class="form-label mt-2">Upload Photo *</label>
									<div class="input-group mb-3">
										<input type="file" class="form-control" name="upload" id="upload" aria-label="Upload">
									</div>
								</div>
								<?php
								  $upload_valid=null;
									if ($isPost){
										validateUpload();
									}

								?>

								<div class="<?php echo ( $isPost && ( !isset($password) || strlen(trim($password)) == 0 ) ? 'has_error' : $flag=5 ); ?>">
									<label for="password" class="form-label">Password *</label>
									<div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">*</span>
										<input type="password" class="form-control" id="password" name="password" placeholder="Password">
									</div>
								</div>
								<?php if($isPost && $flag != 5 ){
									$error_msg = " $error_icon Password is required.";
									checkError($error_msg);
									$GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
								} ?>

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
										<div class="form-check form-check-inline mt-4 <?php echo ($isPost && $agree_terms=='') ? '' :  $flag=6 ?>">
											<input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="agree_terms">
											<label class="form-check-label" for="flexCheckChecked">
												* I agree to all <u>Terms of Service</u>
											</label>
										</div>
									</div>
								</div>
							</div>
							<?php if($isPost && $flag != 6){
									$error_msg =" $error_icon Please review terms and conditions.";
									checkError($error_msg);
									$GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
							} ?>


							<div class="row mx-auto">
								<button class="btn-danger btn btn-lg btn-primary" type="submit" name="submit">Register</button>
							</div>

						</div>
					</form>

				</div>
			</div>
			<!--- Second row --->

			<?php

				function validateUpload(){

					$error_icon ='<img src="https://www.seekpng.com/png/full/251-2514375_free-high-quality-error-youtube-icon-png-2018.png" height="20px" width="20px">'; 

					$imageFileType = strtolower(pathinfo($_FILES["upload"]["name"],PATHINFO_EXTENSION));

					$check = filesize($_FILES["upload"]["tmp_name"]);

					if($_FILES["upload"]["name"] == ''){
						$GLOBALS['uploadedSuccessfully'] = $GLOBALS['uploadFail'];
    					checkError("$error_icon Please upload a profile picture!");

					} else if (file_exists($GLOBALS['target_dir'] . basename($_FILES["upload"]["name"]))) {
    					$GLOBALS['uploadedSuccessfully'] = $GLOBALS['uploadFail'];
    					checkError("$error_icon File already exist! Please upload a new one");

 					} else if($check === false){
						$GLOBALS['uploadedSuccessfully'] = $GLOBALS['uploadFail'];

					} else if ($_FILES["upload"]["size"] > 500000) {
    					$GLOBALS['uploadedSuccessfully'] = $GLOBALS['uploadFail'];
    					checkError("$error_icon Sorry, your file is too large (size must be < 1MB)");
    					
 					} else if($imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif"){
						$GLOBALS['uploadedSuccessfully'] = $GLOBALS['uploadFail'];
						checkError("$error_icon Unsupported file type! Please upload using image formats");
					}
				} 

				function checkError($msg){
					echo "<div class=\"col-12 animated\">";
					echo	"<div class=\"px-0 pt-0\" role=\"alert\">";
					echo 		"<p class=\"has_error\">$msg</p>";
					echo	"</div>";
					echo "</div>";
				}
			?>
			
			<?php 
				if (isset($_POST['submit']) && $GLOBALS['fieldIsSet'] == 1 && $GLOBALS['uploadedSuccessfully'] == 1){ 

					$target_file = $GLOBALS['target_dir'] . basename($_FILES["upload"]["name"]);

					$result = move_uploaded_file( $_FILES["upload"]["tmp_name"] , $target_file );
					
					if($result){
						$allPassed = true;
					}

				}
			?>	

			<?php if ($allPassed && $Passed): ?>

				<script>

					swal("Registered Successfully!", "", "success")
					.then((value) => {
						if (value == true) {
							window.location = "login_screen.php";
						}
					})
				</script>

			<?php endif; ?>	

		</div>


	</div> 
</body>
</html>
