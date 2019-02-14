<?php require_once '../core/init.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>css/style.css">

    <title>PHP Store - Admin</title>
  </head>
  <body>
   
    <!-- Admin menu start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="<?php echo BASE_URL; ?>admin" class="navbar-brand">PHP Store</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarNav">
            
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Add Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">View Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
                </ul>
            
            </div>    
        </div>
    </nav>
    <!-- Admin menu end -->



    <!-- website main content start -->
    <div class="container mt-4">