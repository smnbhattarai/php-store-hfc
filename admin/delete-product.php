<?php include_once 'inc/header.php'; ?>

<?php redirect_if_not_logged_in(); ?>

<?php 

$id = $_GET['id'];
$id = preg_replace("/\D/", '', $id);
$id = (int)$id;

$product = selectOne('products', $id);

?>

<h1 class="text-danger">Delete Product?</h1>

<?php include_once 'inc/footer.php'; ?>   