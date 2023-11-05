<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit A Brands</h1>
	</div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="./functions/Brands/editbrands.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $_POST["id"] ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter the product name" value="<?= $_POST["name"] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Edit Brands</button>
        </form>
    </div>
</div>