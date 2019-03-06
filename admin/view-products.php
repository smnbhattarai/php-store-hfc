<?php 

include_once 'inc/header.php'; 
redirect_if_not_logged_in(); 

// Get all products
$products = selectAll('products');
?>

<h4 class="mb-4 text-center text-info">All Products</h4>

<table class="table table-striped table-sm">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Size</th>
        <th>In Stock?</th>
        <th>Added</th>
        <th>Edited</th>
        <th></th>
    </tr>

<?php while($row = mysqli_fetch_assoc($products)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><img src="<?php echo BASE_URL . 'images/products/' . $row['image']; ?>" height="75"></td>
        <td><sup>$</sup><?php echo $row['price']; ?></td>
        <td><?php echo $row['size']; ?></td>
        <td><?php echo $row['in_stock'] ? 'Yes' : 'No' ?></td>
        <td><?php echo date("Y M d", strtotime($row['created_at'])); ?></td>
        <td><?php echo date("Y M d", strtotime($row['updated_at'])); ?></td>
        <td>
        
        <a href="edit-product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
        
        <a href="delete-product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm admin-product-delete">Delete</a>
        
        </td>
    </tr>
<?php endwhile; ?>



</table>



<?php include_once 'inc/footer.php'; ?>   