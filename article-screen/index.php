<?php

    $isPost = $_SERVER["REQUEST_METHOD"] === "POST";
    $title = $_POST['title'] ?? null;
    $category = $_POST['category'] ?? null;
    $article = $_POST['article'] ?? null;
    $visibility = $_POST['visibility'] ?? null;

    $type = 0;
    $uploadOk = 0;
    $flag = 0;
    $error_icon ='<img src="https://www.seekpng.com/png/full/251-2514375_free-high-quality-error-youtube-icon-png-2018.png" height="20px" width="20px">';

    $fieldNotEmpty = 1;
    $fieldIsEmpty = 0;
    $GLOBALS['fieldIsSet'] = $GLOBALS['fieldNotEmpty'];

    if($isPost && $_FILES['upload']['name'] != null){
        $target_dir = "./upload/";
        $imageFileType = strtolower(pathinfo($_FILES['upload']['name'],PATHINFO_EXTENSION));
        $time_stamp = time();
        $targetFile = $target_dir . "photo_{$time_stamp}.{$imageFileType}";
    }

    function insertArticleEntry($title, $category, $article, $photo_name, $visibility) {
        $db = new PDO('mysql:host=localhost;port=3306;dbname=marvel_blog', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare('INSERT INTO `article_uploads` ( `title`, `category`, `article`, `photo_name`, `visibility`) VALUES ( :title, :category, :article, :photo_name, :visibility ) ');

        $query->bindValue(':title', $title);
        $query->bindValue(':category', $category);
        $query->bindValue(':article', $article);
        $query->bindValue(':photo_name', $photo_name);
        $query->bindValue(':visibility', $visibility);
        $query->execute();
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Article Screen</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbars/">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">


    <!-- Bootstrap core CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
      *{
       font-family: 'Poppins'; 
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


      body{

        background-image: linear-gradient(#ebe8e8, white);
        background-repeat: no-repeat;
        height: 100vh;
      }

      .navbar {
      
        margin-bottom: 20px;
      }

      a {
        color color: lightpink;
      }
      /* ICON HOVER */

      .brightness {
   
      display: inline-block;

      }
      .brightness img:hover {
          opacity: .5;
      }
      .justify{
        text-align: justify;
      }

      .has_error{ 
        color: #b01c2a; 
      } 
      .has_error input{ 
        color: #b01c2a; 
        border-color: #b01c2a; 
        border-width: medium;
      } 
      .has_error textarea{ 
        color: #b01c2a; 
        border-color: #b01c2a; 
        border-width: medium;
      } 

       /*serves as margins */



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


    .has_error_selection{
      color: #b01c2a; 
        border-color: #b01c2a; 
        border-width: medium;

    }

        hr.solid {
      border-top: 3px solid #bbb;
    }


    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
  </head>

<body>
    
<main class="text-white border-4 mx-5 clearfix">


  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded border" aria-label="Eleventh navbar example"><!-- Nav Bar controls --> 
      <div class="container-fluid">
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
                <li><a class="dropdown-item" href="index.html">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>

        <nav class="nav nav-masthead justify-content-center float-md-end">
              <a class="nav-link active decor brightness" href="https://www.youtube.com/c/marvel" target="_blank"><img src="https://freepngimg.com/download/youtube/77758-logo-live-computer-youtube-icons-png-download-free.png" height="40px" width="40px"></a>
        </nav>
      </div>
    </nav><!-- Nav Bar controls --> 
  </div>

   <div class="row mx-5"><!--ROW 1 -->
    <div class="col-12">
      <h3 class="text-center text-dark fw-bold">Write a blog</h3>
      <p class="text-center text-muted fw-light">All fields requires an input</p>
      <hr class="solid">
    </div> <!--ROW 1 -->

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
          <div class="text-dark mx-5">

            <div class="row"> <!--ROW 2 -->
                <div class="col-6 <?php echo ( $isPost && ( !isset($title) || strlen(trim($title)) == 0 ) ? 'has_error' : $flag=1); ?>">
                  <label for="description" class="form-label fw-bold">Title</label>
                  <div class="col-6 input-group mb-3">
                    <input type="text" class="h-50 form-control" id="title" name="title" value="<?php echo $title; ?>" placeholder="Title here...">
                  </div>
                    <?php
                        if($isPost && $flag != 1){
                            $error_msg = " {$error_icon} Title is required.";
                            checkError($error_msg);
                            $GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
                        }
                    ?>
                </div>


                <div class="col-3 <?php echo ( $isPost && ( !isset($category) || strlen(trim($category)) == 0 ) ? 'has_error' : $flag=2); ?>">
                    <label class="fw-bold" for="category">Choose Category &nbsp</label>
                    <div class="row-1 my-2">
                        <select name="category" id="category" class=" form-select <?php echo ( ($flag != 2 ? 'has_error_selection' : '') ); ?>">
                            <option value="" selected disabled>Choose category...</option>
                            <option value="Updates">Updates</option>
                            <option value="Reviews">Reviews</option>
                            <option value="Theory">Theory</option>
                            <option value="Fanfiction">Fan-Fiction</option>
                        </select>
                        <div class="row-1 my-4">
                        <?php
                            if($isPost && $flag != 2){
                                $error_msg = "{$error_icon} Please select a category";
                                checkError($error_msg);
                                $GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
                            }
                        ?>
                        </div>
                    </div>
                </div>

                <div  class="col-3">
                    <img class="" src="https://i1.wp.com/www.popculthq.com/wp-content/uploads/2017/04/Deadpool-laying-down-transparent.png?fit=1132%2C330" height="90px" width="290px">
                    
                </div>

             </div> <!--ROW 2 -->

                <div class="col-12 mb-2 <?php echo ( $isPost && ( !isset($article) || strlen(trim($article)) == 0 ) ? 'has_error' : $flag=3); ?>">
                  <label class="fw-bold form-label" for="article">Article</label>
                  <div class="input-group mb-3">
                    <textarea value="<?php echo $article; ?>" class="form-control"  name="article" id="article" rows="5" cols="300" placeholder="Type or paste your article here"></textarea>
                  </div>
                 </div> 
                    <?php
                        if($isPost && $flag != 3){
                            $error_msg = " {$error_icon} Article is required.";
                            checkError($error_msg);
                            $GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
                        }
                    ?>

                <div class="col-12 <?php echo ( $isPost && $_FILES['upload']['name'] == null) ? 'has_error' : $flag=4; ?>">
                  <label class="fw-bold form-label mt-2" for="upload">Upload Photo</label>
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" id="upload" name="upload" > 
                  </div>
                </div>
                    <?php
                        if($isPost && $flag != 4){
                            $error_msg = " {$error_icon} Please upload a photo.";
                            checkError($error_msg);
                            $type = 1; // no file uploaded
                        } else if ($isPost && isNotImageFormat($imageFileType)) { // check if the file is a valid image format
                            $error_msg = " {$error_icon} Invalid file type! Must be png, gif, jpeg or jpg";
                            checkError($error_msg);
                            $type = 1;
                        }
                    ?>

                  <div class="col-12 mb-2">
                      <label class="fw-bold form-label" for="visibility">Blog Visibility</label>
                    <div class="row">
                      <div class="col-12 <?php echo ( $isPost && ( !isset($visibility) || strlen(trim($visibility)) == 0 ) ? 'has_error' : $flag=5); ?>">
                          <input class="form-check-input" name="visibility" value="0" type="radio" id="public">
                          <label class="form-check-label" for="public">
                              Public
                          </label>
                          <input class="form-check-input" name="visibility" value="1" type="radio" id="private">
                          <label class="form-check-label" for="private">
                              Private
                          </label>
                      </div>
                    </div>
                   </div>
                    <?php
                        if($isPost && $flag != 5){
                            $error_msg = " {$error_icon} Please select blog visibility.";
                            checkError($error_msg);
                            $GLOBALS['fieldIsSet'] = $GLOBALS['fieldIsEmpty'];
                        }
                    ?>

                <div class="row mx-auto">
                    <button class="w-25 btn-danger btn btn-lg btn-primary" type="submit" name="submit">Upload</button>
                </div>

            </div>  
      </form>

  </div><!--ROW 1 -->

    <?php

        function isNotImageFormat($imageFileType) { // check if the file extension is an image type

            if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
                return true;
            }
        }

    ?>

    <?php
        if($isPost && $GLOBALS['fieldIsSet'] == 1 && $type == 0){
            $uploadOk = move_uploaded_file( $_FILES["upload"]["tmp_name"] , $targetFile);
            insertArticleEntry($title, $category, $article, "photo_{$time_stamp}.{$imageFileType}", $visibility);
        }
    ?>

    <?php if ($uploadOk == 1): ?>
        <script>
            swal("Successfully uploaded!", "" , "success");
        </script>
    <?php endif; ?>

    <?php
        function checkError($msg){ // display the error message when a field is empty
            echo "<div class=\"col-12 fade-in\">";
            echo  "<div class=\"px-0 pt-0\" role=\"alert\">";
            echo    "<p class=\"has_error\">$msg</p>";
            echo  "</div>";
            echo "</div>";
        }
    ?>

  </main>

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
