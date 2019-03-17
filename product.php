<?php 

require_once 'inc/header.php';

if(!isset($_GET['id'])) {
    redirect_to("index.php");
}

$id = $_GET['id'];
$id = preg_replace("/\D/", '', $id);
$id = (int)$id;

$product = selectOne('products', $id);

?>

<div class="container">
    <div class="row">
        
        <div class="col-md-4 mt-4">
            <img src="<?php echo BASE_URL . 'images/products/' . $product['image']; ?>" alt="product" class="img-fluid">
        </div>

        <div class="col-md-8 mt-4">

        <table class="table table-borderless">
        
            <tr>
                <th>ID</th>
                <td><?php echo $product['id'] ?></td>
            </tr>

            <tr>
                <th>Name</th>
                <td><?php echo $product['name'] ?></td>
            </tr>

            <tr>
                <th>Size</th>
                <td><?php echo $product['size'] ?></td>
            </tr>

            <tr>
                <th>Price</th>
                <td><sup>$</sup><?php echo $product['price'] ?></td>
            </tr>

            <tr>
                <th>Description</th>
                <td><?php echo $product['description'] ?></td>
            </tr>

            <tr>
                <td></td>
                <td>
                <form action="cart.php" method="post" class="d-inline pdt-btn">
                    <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                    <button class="btn btn-success ml-auto" <?php echo $product['in_stock'] ? '' : 'disabled' ?>>
                        <?php echo $product['in_stock'] ? 'Add to Cart' : 'Out of stock' ?>
                    </button>
                </form>
                </td>
            </tr>

        </table>
        
        </div>

    </div>
</div>

<?php require_once 'inc/footer.php'; ?>