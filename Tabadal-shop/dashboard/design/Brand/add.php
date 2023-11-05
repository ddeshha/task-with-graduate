<div class="row">
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">ADD Brand</h1>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="./functions/Brand/addbrand.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter the product name">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Enter the price">
            </div>
            <div class="form-group">
                <label for="price">Sale</label>
                <input type="number" class="form-control" name="sale" placeholder="Enter the Sale">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Enter the quantity">
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
                <label for="exampleFormControlSelect1">Brands</label>
                    <select name="brand_id" class="form-control" id="exampleFormControlSelect1">
                    <option value="--"></option>
                    <?php
                        $Brands = "SELECT * FROM brands WHERE 1";
                        $brandsQuery = $query = $conn -> query($Brands);
                        foreach($brandsQuery as $brands){
                    ?>
                        <option value="<?= $brands["id"] ?>"><?= $brands["name"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Add Brand</button>
        </form>
    </div>
</div>