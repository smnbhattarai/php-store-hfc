<?php require_once 'inc/header.php'; ?>

<?php 
    $products = mysqli_query($db, "SELECT * FROM products ORDER BY id DESC LIMIT 3");
?>

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

<?php require_once 'inc/footer.php'; ?>