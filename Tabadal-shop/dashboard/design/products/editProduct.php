<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit A Product</h1>
	</div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="./functions/products/editProduct.php" enctype="multipart/form-data">
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
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Enter the quantity" value="<?= $_POST["quantity"] ?>">
            </div>
           
            <div class="form-group">
                <label for="city_id">city</label>
                <select name="city_id" class="form-control" >
                    <?php
                        $cityId = $_POST["city_id"];
                        $citySql = "SELECT * FROM city WHERE 1";
                        $cityQuery = $query = $conn -> query($citySql);
                        foreach($cityQuery as $city){
                    ?>
                        <option value="<?= $city["id"] ?>" <?= $cityId == $city["id"] ? "selected" : "" ?>><?= $city["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" class="form-control" name="date" placeholder="Enter the Date" value="<?= $_POST["date"] ?>">
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
                <label for="category_id">category</label>
                <select name="category_id" class="form-control" >
                    <?php
                        $categoryId = $_POST["category_id"];
                        $categorySql = "SELECT * FROM category WHERE 1";
                        $categoryQuery = $query = $conn -> query($categorySql);
                        foreach($categoryQuery as $category){
                    ?>
                        <option value="<?= $category["id"] ?>" <?= $categoryId == $category["id"] ? "selected" : "" ?>><?= $category["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Edit Product</button>
        </form>
    </div>
</div>