<?php include_once 'inc/header.php'; ?>

<?php 

redirect_if_not_logged_in(); 
if(!isset($_GET['id'])) {
    redirect_to('view-products.php');
}

$id = $_GET['id'];
$id = preg_replace("/\D/", '', $id);
$id = (int)$id;

$product = selectOne('products', $id);

if(isset($id) && isset($_GET['delete']) && $_GET['delete'] == 'true') {
    $filepath = BASE_PATH . 'images/products/' . $product['image'];
    unlink($filepath);
    $query = "DELETE FROM products WHERE id = $id";
    mysqli_query($db, $query);
    redirect_to('view-products.php');
}

?>

<h1 class="text-danger">Delete Product?</h1>

<div class="row">
    <div class="col-md-10 m-auto">
        <table class="table">
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
                <td><?php echo $product['price'] ?></td>
            </tr>
            <tr>
                <th>Image</th>
                <td><img src="<?php echo BASE_URL . 'images/products/' . $product['image'] ?>" width="150"></td>
            </tr>
            <tr>
                <th>In stock?</th>
                <td><?php echo $product['in_stock'] ? 'Yes' : 'No'; ?></td>
            </tr>
        </table>

        <div>
        <a href="delete-product.php?id=<?php echo $product['id']; ?>&delete=true" class="btn btn-danger btn-block btn-lg">Yes! Delete this product permanently</a>
        </div>

    </div>
</div>

<?php include_once 'inc/footer.php'; ?>   