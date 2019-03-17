
<?php 

require_once 'inc/header.php';

$product_per_page = 9;
$page_no = 1;
$total_products = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM products"))[0];

$products = mysqli_query($db, "SELECT * FROM products ORDER BY id DESC LIMIT $product_per_page");


/*
 * Pagination logic
 */

$total_pages = ceil($total_products / $product_per_page);

if(isset($_GET["page"])) {
    $page_no = $_GET["page"];
    $page_no = preg_replace("/\D/", '', $page_no);
    $page_no = (int)$page_no;
    
    $offset = ($page_no - 1) * $product_per_page;
    
    $products = mysqli_query($db, "SELECT * FROM products ORDER BY id DESC LIMIT $product_per_page OFFSET $offset");
    
}

?>

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="text-success text-center text-uppercase my-5">All products in our store</h3>
            
            <div class="card-group">
                
                <?php 
                
                $k = 0;
                while($product = mysqli_fetch_assoc($products)): 
                    
                    ?>
                <div class="card">
                    <img class="card-img-top" src="<?php echo BASE_URL . 'images/products/' . $product["image"] ?>" alt="<?php echo $product["name"] ?>">
                    
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $product["id"] . ' - ' . $product["name"] ?></h5>
                        <p class="card-text text-muted"><?php echo substr(strip_tags($product["description"]), 0, 150); ?> ...</p>
                        
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
                    
                </div><!-- .card -->
                
                
                <?php 
                
                $k++;
                if($k%3 == 0) {
                    echo '</div><!-- .card-group-end -->
                    <div class="card-group mt-5 next">';
                }
                endwhile; 
                
                ?>
                
                
            </div><!-- .card-group-end -->
            
            
            <?php if($total_products > $product_per_page): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination my-5">
                  <?php
                    for($i = 1; $i <= $total_pages; $i++) {
                        $out = '<li class="page-item">';
                        if($i == $page_no) {
                            $out = '<li class="page-item active">';
                        }
                        $out .= '<a class="page-link" href="products.php?page=' . $i . '">' . $i . '</a>';
                        $out .= '</li>';
                        echo $out;
                    }
                  ?>  
                </ul>
            </nav>
            <?php endif; ?>
            
            
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container -->



<?php require_once 'inc/footer.php'; ?>
