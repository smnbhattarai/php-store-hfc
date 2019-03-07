<?php include_once 'inc/header.php'; ?>

<?php 

redirect_if_not_logged_in(); 

// redirect if no id
if(!isset($_GET['id'])) {
    redirect_to('index.php');
}

$id = $_GET['id'];
$id = preg_replace("/\D/", '', $id);
$id = (int)$id;

$product = selectOne('products', $id);

?>

<?php

    $name = '';
    $price = '';
    $description = '';

    if(isset($_POST['addPdt'])) {

        $name = sanitize($_POST['name']);
        $size = sanitize($_POST['size']);
        $price = sanitize($_POST['price']);
        $desc  = sanitize($_POST['description']);
        $stock  = sanitize($_POST['in_stock']);

        if(empty($name)) {
            $errors['name'] = "Please add product name.";
        }

        if(empty($size)) {
            $errors[] = "Please select size.";
        }

        if(empty($price) || !is_numeric($price)) {
            $errors[] = "Price is required and should be a number.";
        }

        if(empty($desc)) {
            $errors[] = "Product description is required.";
        }

        // Check image
        if($_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
            $errors[] = "Please select product image.";
        }
        else if ($_FILES['photo']['size'] == UPLOAD_ERR_INI_SIZE) {
            $errors[] = "Image cannot be more than ? 2MB.";
        }
        else {
            $allowed = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
            $detected = exif_imagetype($_FILES['photo']['tmp_name']);
            if(!in_array($detected, $allowed)) {
                $errors[] = "Not a valid image. Allowed type includes JPG, PNG and GIF.";
            }
        }


        // If there are no errors upload the image
        if(count($errors) == 0) {
            $date = date("Y-m-d H:i:s");
            $destination = BASE_PATH . 'images/products';
            $tmp_name = $_FILES['photo']['tmp_name'];
            $image = rand(1, 999999) . '-' . str_replace(' ', '-', basename($_FILES['photo']['name']));
            move_uploaded_file($tmp_name, "$destination/$image");

            // update record in DB
            $query = "UPDATE products SET name = '$name', size = '$size', price = '$price', description = '$desc', image = '$image', in_stock = '$stock', updated_at = '$date' WHERE id = '$id'";
            mysqli_query($db, $query);
            redirect_to('edit-product.php?id=' . $id . '&updated=true');

        } // count error

    } // form submit check
?>

<div class="row mb-4">
    <div class="col-md-8">
        <h3 class="text-success">Edit product</h3><hr>

        <form action="edit-product.php?id=<?php echo $product['id']; ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Product Name: <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" name="name" placeholder="Product Name" id="name" value="<?php echo $product['name']; ?>">
                <?php if(isset($errors['name'])): ?>
                <div class="invalid-feedback">
                    <?php echo $errors['name']; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="size">Size</label>
                <select name="size" id="size" class="form-control">
                <option value="<?php echo $product['size']; ?>"><?php echo $product['size']; ?></option>
                <option value="XL">XL (Extra Large)</option>
                    <option value="L">L (Large)</option>
                    <option value="M">M (Medium)</option>
                    <option value="SM">SM (Small)</option>
                    <option value="XS">XS (Extra Small)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photo">Select product image</label>
                <input type="file" name="photo" id="photo" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="text" class="form-control" name="price" id="price" placeholder="In USD" value="<?php echo $product['price']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="in_stock">In stock?</label>
                <select name="in_stock" id="in_stock" class="form-control">
                    <?php echo ($product['in_stock']) ? '<option value="1">Yes</option><option value="0">No</option>' : '<option value="0">No</option><option value="1">Yes</option>' ?>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="20" class="form-control"><?php echo $product['description']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-lg btn-primary float-right" name="addPdt">Update Product</button>

        </form>

    </div>

    <div class="col-md-4">

        <?php
        if(isset($_GET['updated']) && $_GET['updated'] == 'true') {
            echo '<div class="alert alert-success">Product updated successfully.</div>';
        }
        ?>

        <img src="<?php echo BASE_URL . 'images/products/' . $product['image']; ?>" class="img-fluid">

        <?php
            if(count($errors) > 0) {
                foreach($errors as $error) {
                    echo "<p class='text-danger'>$error</p>";
                }
            }
        ?>
    </div>

</div>

<?php include_once 'inc/footer.php'; ?>   