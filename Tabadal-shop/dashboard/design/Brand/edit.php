<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit A Brand</h1>
	</div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="./functions/Brand/editbrand.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $_POST["id"] ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter the product name" value="<?= $_POST["name"] ?>">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Enter the price" value="<?= $_POST["price"] ?>">
            </div>
            <div class="form-group">
                <label for="Sale">Sale</label>
                <input type="number" class="form-control" name="sale" placeholder="Enter the price" value="<?= $_POST["sale"] ?>">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Enter the quantity" value="<?= $_POST["quantity"] ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" cols="135" rows="4">
                    <?= $_POST["description"] ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="img">img</label>
                <input type="file" class="form-control" name="img[]" placeholder="Enter the img" multiple>
            </div>
            <div class="form-group">
                <label for="brand_id">Brands</label>
                <select name="brand_id" class="form-control" >
                    <?php
                        $BrandsId = $_POST["brand_id"];
                        $BrandsSql = "SELECT * FROM brands WHERE 1";
                        $BrandsQuery = $query = $conn -> query($BrandsSql);
                        foreach($BrandsQuery as $Brands){
                    ?>
                        <option value="<?= $Brands["id"] ?>" <?= $BrandsId == $Brands["id"] ? "selected" : "" ?>><?= $Brands["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Edit Brand</button>
        </form>
    </div>
</div>