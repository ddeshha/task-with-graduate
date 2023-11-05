<div class="row">
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">ADD Porodacet</h1>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="./functions/products/addProduct.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter the product name">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Enter the price">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Enter the quantity">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select country</label>
                    <select name="city_id" class="form-control" id="exampleFormControlSelect1">
                    <option disabled selected> Select country</option>
                    <?php
                        $citySql = "SELECT * FROM city WHERE 1";
                        $cityQuery = $query = $conn -> query($citySql);
                        foreach($cityQuery as $city){
                    ?>
                        <option value="<?= $city["id"] ?>"><?= $city["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" placeholder="Enter the date">
            </div>
            <div class="form-group">
                <label for="img">img</label>
                <input type="file" class="form-control form-control-admin" name="img[]" placeholder="Enter the img" multiple>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" cols="135" rows="4">
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                    <select name="categoryId" class="form-control" id="exampleFormControlSelect1">
                    <option disabled selected> open Category</option>
                    <?php
                        $categorySql = "SELECT * FROM category WHERE 1";
                        $categoryQuery = $query = $conn -> query($categorySql);
                        foreach($categoryQuery as $category){
                    ?>
                        <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</div>
