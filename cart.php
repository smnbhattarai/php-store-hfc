<?php

require_once 'inc/header.php';

if(isset($_POST['product_id'])) {
    $id = sanitize($_POST['product_id']);
    $id = preg_replace("/\D/", '', $id);

    // Add product to cart
    $_SESSION['cart'][] = $id;

    // Filter array to remove same product
    $_SESSION['cart'] = array_values(array_unique($_SESSION['cart']));
}

if(isset($_GET['id']) && isset($_GET['remove'])) {
    $id = $_GET['id'];
    if(in_array($id, $_SESSION['cart'])) {
        $position = array_search($id, $_SESSION['cart']);
        unset($_SESSION['cart'][$position]);
        redirect_to("cart.php");
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col">
        
        <h3 class="text-center mt-4">Your Cart</h3>

        <?php if(count($_SESSION['cart']) > 0): ?>

        <p class="text-muted text-center"><small>Note: Same product cannot be added twice ...</small></p>

        <table class="table table-borderless">
            <tr>
                <th>Name</th>
                <th>Preview</th>
                <th>Price</th>
                <th>Size</th>
                <th></th>
            </tr>

            <?php foreach($_SESSION['cart'] as $one): ?>

            <?php $product = selectOne('products', $one);
            ?>

            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><img src="<?php echo BASE_URL . 'images/products/' . $product['image'] ?>" width="75"></td>
                <td><sup>$</sup><?php echo $product['price'] ?></td>
                <td><?php echo $product['size'] ?></td>
                <td>
                    <a href="cart.php?id=<?php echo $product['id'] ?>&remove=1" class="btn btn-danger btn-sm remove-cart-item">Remove</a>
                </td>
            </tr>

            <?php endforeach; ?>

        </table>   

        <?php else: ?> 

        <h3 class="my-5 text-center text-success">No item in cart yet. Get busy shopping.</h3>

        <?php endif; ?>
        
        </div>
    </div>
</div>

<?php require_once 'inc/footer.php'; ?>