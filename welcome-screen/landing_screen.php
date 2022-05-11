<?php

  //update 46-49, 101

  session_start();

  if( !isset( $_SESSION['is_logged_in'] )){
    header("Location: ./login_screen.php");
  }


    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=marvel_blog', 'root', ''); // database connection 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set error

    $stmt = $pdo->prepare('SELECT title FROM article_uploads');    // careful, without a LIMIT this can take long if your table is huge
    $stmt->execute();
    $titles = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $stmt = $pdo->prepare('SELECT article FROM article_uploads');    
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $stmt = $pdo->prepare('SELECT photo_name FROM article_uploads');    
    $stmt->execute();
    $photo_name =$stmt->fetchAll(PDO::FETCH_COLUMN);

    $stmt = $pdo->prepare('SELECT article_id FROM article_uploads');    
    $stmt->execute();
    $article_id =$stmt->fetchAll(PDO::FETCH_COLUMN);

    $stmt = $pdo->prepare('SELECT category FROM article_uploads');    
    $stmt->execute();
    $category=$stmt->fetchAll(PDO::FETCH_COLUMN);


    //var_dump($photo_name);

    $titles_len=count($titles)

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marvel Blog Home</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

  <!-- Bootstrap core CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style type="text/css">


    *{
      font-family: 'Poppins';
    }

    #userProfile {
     
      border-radius: 50%;
    }  
      
    .nav .dropdown .user {
      border: none;
      outline: none;
    }

    .justify {
      text-align: justify;
      text-justify: inter-word;
    }
    </style>

</head>
<body>

  <!-- Container -->
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded border" aria-label="Eleventh navbar example"><!-- Nav Bar controls --> 
      <div class="container-fluid" id="navbg">
        <a class="navbar-brand brightness" href="#"><img src="https://www.freepnglogos.com/uploads/marvel-logo-png/new-marvel-studios-logo-debuted-marvelstudios-3.png" height="50px" width="180px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">test</span>
        </button>

        <div class="collapse navbar-collapse">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
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
        
        <?php if( isset( $_SESSION['is_logged_in'] )){ ?>         
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <div class="dropdown">
            <button class="user dropdown-toggle bg-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <!--- Add profile photo to navigation drop down --->
              <img src="<?php echo 'uploads/' . $_SESSION['user_info']['photo']; ?>" id="userProfile" height="40px" width="40px">
             <!--- Old logo 
              <img src="https://pic.onlinewebfonts.com/svg/img_24787.png" name="userProfile" height="40px" width="40px"> 
              --->

            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li>
                <a class="dropdown-item my-1" href="#"><?php echo $_SESSION['user_info']['firstname'] . ' ' . $_SESSION['user_info']['lastname'] ?></a>
              </li>
              <li>
                <a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user me-2"></i>My Profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="fa-solid fa-gear me-2"></i>Setting</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-question me-2"></i>Help</a>
              </li>
              <li>
                <a class="dropdown-item" href="./logout.php"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout</a>
              </li>
            </ul>
          </div>
        </nav>
        <?php } else{ ?>
          <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link active decor brightness" href="#" target="_blank"><a class="btn-danger btn btn-sm text-white" href="login_screen.php">Log in</a>
          </nav>
        <?php } ?>

      </div>
    </nav><!-- Nav Bar controls --> 
  </div>

  <br><br>

    <main class="container">
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-12 px-0">
            
            <h3 style="color: #da3545;">Newest post</h3>
            <h1 class="display-4 fst-italic"><?php echo $titles[$titles_len-1]; ?> </h1>
            <div class="ms-5 text-muted">ID:<?php echo $article_id[$titles_len-1];?> <span> | Category: <?php echo $category[$titles_len-1];?> </span></p></div>
           
            <div class="text-center">
                <div style="height: 500px; width: auto;">
                <img style="height: 500px; width: auto; border: 5px solid darkgrey;" src= "thumbnails\<?php echo $photo_name[$titles_len-1]?>">
                </div>
            </div>
          
           

        </div>

        <div class="justify">

             <p class="lead my-3"> <?php echo $articles[$titles_len-1]; ?> </p>
          
        </div>
      </div>

      <div class="row mb-2">

        <?php $newCount = $titles_len-2; 

          for($x=-1; $x<$newCount; $newCount-- ){
            featured_article($titles[$newCount],$articles[$newCount],$photo_name[$newCount],$article_id[$newCount],$category[$newCount]);
          }




        ?>
     
      </div>
    </main>
  <!-- Container -->
    <footer class="blog-footer text-center">
      <p>
        <a href="#" style="text-decoration: none; color: gray;">Back to top</a>
      </p>
    </footer>
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




</html>
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