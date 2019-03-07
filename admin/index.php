<?php include_once 'inc/header.php'; ?>

<?php 

redirect_if_not_logged_in(); 

$total_product = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM products"));

$in_stock = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM products WHERE in_stock = 1"));

$out_of_stock = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) FROM products WHERE in_stock = 0"));

?>

<h1 class="mb-4 text-warning">Admin</h1><hr>

<div class="row">
    <div class="col-md-4">
        <div class="card card-body">
            <?php echo $total_product[0]; ?> product(s) in store.
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-body">
            <?php echo $in_stock[0]; ?> product(s) in stock.
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-body">
            <?php echo $out_of_stock[0]; ?> product(s) out of stock.
        </div>
    </div>

</div>

<?php include_once 'inc/footer.php'; ?>   