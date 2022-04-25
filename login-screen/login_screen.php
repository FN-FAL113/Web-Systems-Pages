<?php
//  update 145-159

    $isPost = $_SERVER["REQUEST_METHOD"] === "POST";
    $email_log = $_POST['email_log'] ?? null;
    $password_log = $_POST['password_log'] ?? null;
  

    $flag=0; 



    $error_icon ='<img src="https://www.seekpng.com/png/full/251-2514375_free-high-quality-error-youtube-icon-png-2018.png" height="20px" width="20px">';

    $fieldNotEmpty = 1;
    $fieldIsEmpty = 0;
    $GLOBALS['fieldIsSet'] = $GLOBALS['fieldNotEmpty'];


    $validate=0; 
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Log in Screen</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!--FONT FAMILY -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <!--FONT FAMILY -->




    <style>

    body{
      font-family: 'Poppins';
    }

    a.decor {
             text-decoration: none;
             color: black;
         }



      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }


      .has_error{ 
        color: #b01c2a; 
      } 
      .has_error input{ 
        color: #b01c2a; 
        border-color: #b01c2a; 
        border-width: medium;
      }

        /* FAde in animation */
    .fade-in{
      animation: fadeIn .8s;
      -webkit-animation: fadeIn .8s;
      -moz-animation: fadeIn .8s;
      -o-animation: fadeIn .8s;
      -ms-animation: fadeIn .8s;
    }
    @keyframes fadeIn {
      0% {opacity:0;}
      100% {opacity:1;}
    }

    @-moz-keyframes fadeIn {
      0% {opacity:0;}
      100% {opacity:1;}
    }

    @-webkit-keyframes fadeIn {
      0% {opacity:0;}
      100% {opacity:1;}
    }

    @-o-keyframes fadeIn {
      0% {opacity:0;}
      100% {opacity:1;}
    }

    @-ms-keyframes fadeIn {
      0% {opacity:0;}
      100% {opacity:1;}
    }
  /* FAde in animation */ 
    </style>

</head>
<body class="text-center pt-5">

  <div class="container">
      <div class="header">
          <h1><img src="https://www.freepnglogos.com/uploads/marvel-logo-png/new-marvel-studios-logo-debuted-marvelstudios-3.png" height="200px" width="768px"></h1>
      </div>

    <main class="form-signin">

      <div class="row">
        <div class="col-4 mx-auto">
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h1 class="h3 mb-3 fw-normal">Sign in</h1>

                      <!-- VALIDATE LOG-IN-->
                    <?php
                        if($email_log !=null && $password_log !=null){
                          $validate=1; 
                        }

                        if($validate==1){
                          $pdo = new PDO('mysql:host=localhost;port=3306;dbname=marvel_blog', 'root', ''); // database connection 
                          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set error


                          $login_statement = $pdo->prepare('SELECT * FROM `registration` WHERE `email` = :email AND `password` = :password '); // fetch data from database if username and pass exist and same

                          $login_statement->bindValue(':email', $email_log);
                          $login_statement->bindValue(':password', md5($password_log)) ;
                          $login_statement->execute();

                          $count = $login_statement->rowcount();
                      
                          if ($count != 0):
                            header('location: landing_screen.php');
                          else:
                            $error_msg = " {$error_icon} Incorrect email or password.";
                             checkError($error_msg);
                          endif;


                          // $data = $login_statement->fetch(PDO::FETCH_ASSOC); // returns true if user exist in the table

                          // if($data && $username_log == $data['username'] && $password_log == $data['password']){
                          //    var_dump($data);
                          //  } else {
                          //    $error_msg = " {$error_icon} Incorrect email or password.";
                          //    checkError($error_msg);
                          // }
                          
                        }

               ?>     <!-- VALIDATE LOG-IN-->
    
            <div class="form-floating pb-2 <?php echo ( $isPost && ( !isset($email_log) || strlen(trim($email_log)) == 0 ) ? 'has_error' : $flag=1); ?> ">
              <input type="email" class="form-control" id="floatingInput" placeholder="email" name="email_log">
              <label for="floatingInput">Email</label>
            </div>
                  <?php
                        if($isPost && $flag != 1){
                            $error_msg = " {$error_icon} type in your username.";
                            checkError($error_msg);
                            $GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
                        }
                    ?>

            <div class="form-floating <?php echo ( $isPost && ( !isset($password_log) || strlen(trim($password_log)) == 0 ) ? 'has_error' : $flag=2); ?>">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password_log">
              <label for="floatingPassword">Password</label>
            </div>
                   <?php
                        if($isPost && $flag != 2){
                            $error_msg = " {$error_icon} type in your password.";
                            checkError($error_msg);
                            $GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
                        }
                    ?>
            <div class="checkbox my-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="w-100 btn-danger btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
          
          </form>
  
        <div class="register my-3 pt-2">
          Not registered?
          <a href="signup_screen.php">Create an acount</a>
            </div>  
            <p class="mb-3 text-muted">&copy; 2017–2022</p>

        </div>
      </div>    
    </main>
  </div>

    <?php
        function checkError($msg){ // display the error message when a field is empty
            echo "<div class=\"col-12 fade-in\">";
            echo  "<div class=\"px-0 pt-0\" role=\"alert\">";
            echo    "<p class=\"has_error\">$msg</p>";
            echo  "</div>";
            echo "</div>";
        }
    ?>
  
</body>
</html>