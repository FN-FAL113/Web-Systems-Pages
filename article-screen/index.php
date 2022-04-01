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
        height: 1000px;
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

       /*serves as margins */
     
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
      <h3 class="text-center text-dark fw-bold">Write a Blog</h3>
    </div>

      <form>
          <div class="text-dark mx-5">

            <div class="row mb-2">
                <div class="col-6 ">
                  <label for="description" class="form-label fw-bold">Title</label>
                  <div class="col-6 input-group mb-3">
                    <input type="text" class="h-50 form-control" id="description" name="description" placeholder="Title here...">
                  </div>
                </div> 

                <div class="col-6 my-auto">
                    <label class="fw-bold" for="Category">Choose Category &nbsp</label>
                    <select id="cars" name="cars">
                      <option value=" ">Updates</option>
                      <option value=" ">Reviews</option>
                      <option value=" ">Theory</option>
                      <option value=" ">Fanfiction</option>
                    </select>
                </div>
             </div>   

                <div class="col-12 mb-2">
                  <label class="fw-bold" for="description" class="form-label">Article</label>
                  <div class="input-group mb-3">
                    <textarea name="article" rows="5" cols="300" placeholder="Type or paste your article here"></textarea>
                  </div>
                 </div> 

                <div class="col-12">
                  <label class="fw-bold" for="upload" class="form-label mt-2">Upload Photo</label>
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" id="upload"  aria-label="Upload">
                  </div>
                </div>



                  <div class="col-12 mb-2">
                    <div class="row">
                      <div class="col-12">
                          <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="agree_terms">
                          <label class="form-check-label" for="flexCheckChecked">
                            Public
                          </label>
                      </div>
                    </div>
                   </div>

                <div class="row mx-auto">
                    <button class="w-25 btn-danger btn btn-lg btn-primary" type="submit">Upload</button>
                </div>

            </div>  
      </form>


  </div><!--ROW 1 -->


  </main>

     <div class="container pe-5"> <!-- FOOTER div -->
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
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
            <li class="ms-3"><ahref="https://twitter.com/marvel" target="_blank"><img class="opacity-50" src="https://cdn-icons-png.flaticon.com/512/1384/1384017.png" width="27" height="27"><use xlink:href="#twitter"></a></li>
          </ul>
        </footer><!-- FOOTER div -->
      </div>
      
</body>
</html>