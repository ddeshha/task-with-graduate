<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit A slider</h1>
	</div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="./functions/slider/editslider.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $_POST["id"] ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="img">img</label>
                <input type="file" class="form-control" name="img[]" placeholder="Enter the img" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Edit slider</button>
        </form>
    </div>
</div>