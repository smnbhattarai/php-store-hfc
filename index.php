<?php require_once 'inc/header.php'; ?>

<?php 
    $products = mysqli_query($db, "SELECT * FROM products ORDER BY id DESC LIMIT 3");
?>


<div class="jumbotron">
        <div class="container">
          <h1 class="display-4 text-center">Welcome to PHP store</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, animi et magnam magni id laboriosam ducimus deleniti nulla molestias quidem! Voluptatum, dolor doloribus obcaecati nihil similique id ratione eaque officia.</p><hr>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, animi et magnam magni id laboriosam ducimus deleniti nulla molestias quidem! Voluptatum, dolor doloribus obcaecati nihil similique id ratione eaque officia.</p>
          
          <p class="lead text-center">
              <a class="btn btn-primary btn-lg" href="<?php echo BASE_URL . 'products.php'; ?>" role="button">View all products</a>
          </p>
        </div>
    </div>



<div class="container">
    <div class="row">
        <h3 class="text-success text-center text-uppercase mb-4 mt-4">Recent products in our store</h3>

        <div class="card-group mb-5">
        
        <?php while($product = mysqli_fetch_assoc($products)): ?>

        <div class="card">
            <img class="card-img-top" src="<?php echo BASE_URL . 'images/products/'. $product['image'] ; ?>" alt="<?php echo $product['name']; ?>">

            <div class="card-body">
                <h5 class="card-title text-center"><?php echo $product['name']; ?></h5>
                <p class="card-text text-center text-muted"><?php echo substr($product['description'], 0, 150); ?></p>

                <h4 class="card-text text-center">
                        <span class="badge badge-success"><sup>$</sup><?php echo $product["price"] ?></span>
                        <span class="badge badge-light"><?php echo $product["size"] ?></span>
                    </h4>
            </div>

            <div class="card-footer text-center">
                <a href="product.php?id=<?php echo $product["id"] ?>" class="btn btn-secondary">View details</a>
                
                <form action="cart.php" method="post" class="d-inline">
                    <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                    <button class="btn btn-success ml-auto" <?php echo $product['in_stock'] ? '' : 'disabled' ?>>
                        <?php echo $product['in_stock'] ? 'Add to Cart' : 'Out of stock' ?>
                    </button>
                </form>
                
            </div>
        </div>

        <?php endwhile; ?>
        
        </div>

    </div>
</div>



<section class="mt-5 place-order">
    <div class="place-order-bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-center text-dark text-uppercase">Place your order</h3><hr>
                    
                    <form>
                        <div class="row mb-3">
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Full name">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Email">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Address (123, Kalanki Road)">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" placeholder="District (Lalitpur)">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <div class="col">
                            <input type="text" class="form-control" placeholder="State">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Zip code">
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <div class="col">
                              <textarea name="order" class="form-control" rows="10" placeholder="Describe your order in detail"></textarea>
                          </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Place order</button>
                        
                      </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>





<section class="description">
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <h3 class="text-center">Nunc dignissim risus id metus</h3><hr>
                
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
                
                <p class="text-justify">Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                
                <p class="text-justify">Ut convallis, sem sit amet interdum consectetuer, odio augue aliquam leo, nec dapibus tortor nibh sed augue. Integer eu magna sit amet metus fermentum posuere. Morbi sit amet nulla sed dolor elementum imperdiet. Quisque fermentum. Cum sociis natoque penatibus et magnis xdis parturient montes, nascetur ridiculus mus. Pellentesque adipiscing eros ut libero. Ut condimentum mi vel tellus. Suspendisse laoreet. Fusce ut est sed dolor gravida convallis. Morbi vitae ante. Vivamus ultrices luctus nunc. Suspendisse et dolor. Etiam dignissim. Proin malesuada adipiscing lacus. Donec metus. Curabitur gravida</p>
            </div>
        </div>
    </div>
</section>



<?php require_once 'inc/footer.php'; ?>