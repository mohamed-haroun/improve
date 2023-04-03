<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/images/logo.jpg">
    <title>Store - {{pageName}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

  <?php

  $page = explode("?", $_SERVER['REQUEST_URI'])[0];

  if ($page != '/error'):
  ?>


  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">
      <a class="navbar-brand text-danger fw-bold fs-3" href="/">St<span class="text-success">ore</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav me-2 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php echo $page == '/'? 'active text-success':'';?>" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $page == '/products'? 'active text-success':'';?>" href="/products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $page == '/contact'? 'active text-success':'';?>" href="/contact">Contact Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?php echo $page == '/register' || $page == '/login'? 'active  text-success':'';?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php
              if(isset($_SESSION['user'])) {
                  echo "<span class='text-success'>" . $_SESSION['user']['first_name'] . "</span>";
                } else {
                echo "<span>User</span>";
              }
              ?>

            </a>
            <?php if(isset($_SESSION['user'])):?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/profile">profile</a></li>
              <li><a class="dropdown-item" href="/settings">Settings</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
            <?php else:?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/register">Register</a></li>
              <li><a class="dropdown-item" href="/login">Login</a></li>
            </ul>
            <?php endif;?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php endif;?>
    

    {{content}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>