<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit category</h1>
	</div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="./functions/categories/editCategory.php">
            <div class="form-group">
<?php
$id = $_POST["id"];
$name = $_POST["name"];
?>
                <label for="username">name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter the category name" value="<?= $name ?>">
            </div>
            <input type="hidden" name="id" value="<?= $id ?>">
            <button type="submit" class="btn btn-primary">edit category</button>
        </form>
    </div>
</div>