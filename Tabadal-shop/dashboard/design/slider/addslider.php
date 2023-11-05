<div class="row">
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">ADD Slider</h1>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="./functions/slider/addslider.php" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="img">img</label>
                <input type="file" class="form-control form-control-admin" name="img[]" placeholder="Enter the img" multiple>
            </div>
            
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Add Slider</button>
        </form>
    </div>
</div>
