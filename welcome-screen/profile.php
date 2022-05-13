<?php 

  session_start();

  if( !isset( $_SESSION['is_logged_in'] )){
    header("Location: ./login_screen.php");
  }

  $article_id = $_SESSION['user_info']['id'];

  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=marvel_blog', 'root', ''); // database connection 
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set error

  $statement = $pdo->prepare('SELECT * FROM `article_uploads` WHERE `article_uploads`.`user_id` = :id ');
	$statement->bindValue(':id', $article_id);
	$statement->execute();
	$data = $statement->fetchall(PDO::FETCH_ASSOC); 

  $size = count($data);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbars/">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">


    <!-- Bootstrap core CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

       <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
      *{
       font-family: 'Poppins'; 
      }
      .profile img{
        border-radius: 50%;
        width: 300px;
        height: 300px;
      }
    </style>
    <body>

    <div class="container"><!--CONTAINER -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded border" aria-label="Eleventh navbar example"><!-- Nav Bar controls --> 
      <div class="container-fluid" id="navbg">
        <a class="navbar-brand brightness" href="#"><img src="https://www.freepnglogos.com/uploads/marvel-logo-png/new-marvel-studios-logo-debuted-marvelstudios-3.png" height="50px" width="180px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">test</span>
        </button>

        <div class="collapse navbar-collapse">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="landing_screen.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown09">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><a class="dropdown-item" href="login_screen.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>

        <nav class="nav nav-masthead justify-content-center float-md-end">
       
            <!--ADDITION FUNCTIONALITY HERE IF NECESSARRY  -->
        </nav>
      </div>
    </nav><!-- Nav Bar controls --> 


    <div class="container">

    <div class="row">

        <div class="col-4">
          <div class="profile mt-5 text-center">
            <img src="./uploads/<?php echo $_SESSION['user_info']['photo']; ?>">
            <!-- <img src="https://i.kym-cdn.com/entries/icons/facebook/000/011/061/lelbron.jpg"> -->
          </div>
        </div>
         <div class="col-4 mt-5">
          <div class="float-start">
            <div>
              <h3><span class="fs-5 text-muted">Username: </span><?php echo $_SESSION['user_info']['username']; ?></h3>
              <hr>
              <h4><span class="fs-6 text-muted">Name:</span>&nbsp; <?php echo $_SESSION['user_info']['firstname']; ?></h4>
              <h4><span class="fs-6 text-muted">E-mail:</span> <?php echo $_SESSION['user_info']['email']; ?></h4>
              <hr>
              <h4><span class="fs-6 text-muted text-capitalize"><i class="fa-solid fa-user fa-xl"></i></span>&nbsp;<?php echo $_SESSION['user_info']['sex']; ?></h4>
              <h4><span class="fs-6 text-muted"><i class="fa-solid fa-location-dot fa-xl"></i></span>&nbsp;&nbsp;<?php echo $_SESSION['user_info']['address']; ?></h4>
              <h4><span class="fs-6 text-muted"><i class="fa-solid fa-cake-candles fa-xl"></i></span>&nbsp;<?php echo $_SESSION['user_info']['birthday']; ?></h4>
            </div>
          </div>
         </div>
           <div class="col-4 mt-5">
          <div class="float-start">
               <div class="col-12">
              <h3>BIO</h3> 
              <h5><?php echo $_SESSION['user_info']['description']; ?></h5>           
          </div>
          </div>
         </div>

    </div>

      <div class="row mt-5">
        <hr>

        <div class="col-12 text-center">
              <h3 class="mb-5">Your blogs</h3>
    </div>
         
        <?php 

          for($x = $size - 1; $x >= 0 ; $x--){  
              featured_article($data[$x]['title'], $data[$x]['article'],
              $data[$x]['photo_name'], $data[$x]['article_id'], $data[$x]['category']);
          }

        ?>
        
      </div>
      
    </div><!--CONTAINER -->

   <div class="container pe-5"> <!-- FOOTER div -->
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top mb-3">
          <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="text-muted">&copy; 2022 Marvel, Inc</span>
          </div>

          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <!--facebook -->
            <li class="ms-3"><a href="https://www.facebook.com/MarvelPhilippines/?brand_redir=6883542487" target="_blank"><img class="opacity-50" src="https://cdn-icons-png.flaticon.com/512/20/20673.png" width="27" height="27"><use xlink:href="#facebook"></a></li>
            <!--instagram-->
            <li class="ms-3"><a href="https://www.instagram.com/marvel/" target="_blank"><img class="opacity-50" src="https://www.freepnglogos.com/uploads/logo-ig-png/logo-ig-instagram-new-logo-vector-download-5.png" width="28" height="28"><use xlink:href="#instagram"/></a></li>
            <!--Twitter-->
            <li class="ms-3"><a href=https://twitter.com/marvel" target="_blank"><img class="opacity-50" src="https://cdn-icons-png.flaticon.com/512/1384/1384017.png" width="27" height="27"><use xlink:href="#twitter"></a></li>
          </ul>
        </footer><!-- FOOTER div -->
      </div>

      
  </body>

  <?php 
  
  function featured_article($titles,$articles,$photo_name,$article_id,$category){ 
                 echo "<div class=\"col-md-6\">"; 
                 echo         "<div class=\"row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bg-dark\">";
                 echo           "<div class=\"col p-4 d-flex flex-column position-static text-white\">";
                 echo             "<strong class=\"d-inline-block mb-2 text-primary text-danger\">$category</strong>";
                 echo             "<h3 class=\"mb-0 \">$titles</h3>";
                 echo             "<div class=\"mb-1 text-muted\">ID $article_id</div>";
                 echo              " <div class=\" mb-1\"style=\"height: 300px; width: auto;\"><img style=\"height: 300px; width: auto; border: 5px solid darkgrey;\" src=\"thumbnails\\$photo_name\"></div>";
                 echo             "<p class=\"card-text mb-auto fw-light justify\">$articles</p>";
                 echo           "</div>";
                 echo     "</div>";
                 echo    " </div> ";
  
  }

?>
