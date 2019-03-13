<?php require_once 'core/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>css/style.css">

    <title>PHP Store</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a href="<?php echo BASE_URL; ?>" class="navbar-brand">PHP Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>products.php">Products</a></li>

                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>about.php">About</a></li>

                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>contact.php">Contact</a></li>

                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>cart.php">Cart</a></li>

            </ul>
        
        </div>

        </div>
    </nav>