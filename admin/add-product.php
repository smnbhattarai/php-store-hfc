<?php include_once 'inc/header.php'; ?>

<?php redirect_if_not_logged_in(); ?>

<div class="row">
    <div class="col-md-8">
        <h3 class="text-success">Add new product</h3><hr>

        <form action="add-product.php" method="post">

            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Product Name" id="name">
            </div>

            <div class="form-group">
                <label for="size">Size</label>
                <select name="size" id="size" class="form-control">
                <option value="XL">XL (Extra Large)</option>
                    <option value="L">L (Large)</option>
                    <option value="M">M (Medium)</option>
                    <option value="SM">SM (Small)</option>
                    <option value="XS">XS (Extra Small)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photo">Select product image</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="text" class="form-control" name="price" id="price" placeholder="In USD">
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-lg btn-primary">Add Product</button>

        </form>

    </div>
</div>

<?php include_once 'inc/footer.php'; ?>   