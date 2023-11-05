<?php
require_once "../../dashboard/functions/connect.php";

$minPricerange = $_POST["minPricerange"];
$maxPricerange = $_POST["maxPricerange"];
$newPage = $_POST["newPage"];
$offset = ($newPage - 1) * 2;

$sql = "SELECT * FROM `products` WHERE `price` > '$minPricerange' AND `price` < '$maxPricerange' LIMIT 2 OFFSET $offset";
$query = $conn -> query($sql);

foreach($query as $product){
    $productImgs = explode(",", $product["img"]);
?>

<!-- PRODUCT-->
<div class="col-lg-4 col-sm-6">
    <div class="product text-center">
        <div class="mb-3 position-relative">
            <div class="badge text-white badge-"></div><a class="d-block" href="detail.php?id=<?= $product["id"]; ?>"><img class="img-fluid w-100" src="./dashboard/img/db/<?= $productImgs[0]; ?>" alt="..."></a>
            <div class="product-overlay">
            <ul class="mb-0 list-inline">
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="functions/cart/add.php?id=<?= $product["id"]; ?>">Add to cart</a></li>
                <li class="list-inline-item mr-0 productView"><button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#productView" data-id="<?= $product["id"]; ?>" data-name="<?= $product["name"]; ?>" data-description="<?= $product["description"]; ?>"  data-price="<?= $product["price"]; ?>" data-quantity="<?= $product["quantity"]; ?>" data-imgs="<?= $product["img"] ?>"><i class="fas fa-expand"></i></button></li>
            </ul>
            </div>
        </div>
        <h6> <a class="reset-anchor" href="detail.html"><?= $product["name"]; ?></a></h6>
        <p class="small text-muted">$<?= $product["price"]; ?></p>
    </div>
</div>

<?php
}
echo "cutTheStringHere";
?>
                <!-- PAGINATION-->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center justify-content-lg-end">
<?php
$productNumSql = "SELECT COUNT(*) FROM `products` WHERE `price` >= '$minPricerange' AND `price` <= '$maxPricerange'";
$productNumQuery = $conn -> query($productNumSql);
$pageNum = 0;

foreach($productNumQuery as $productNum){
  $pageNum = ceil($productNum["COUNT(*)"] / 2);
}

if($newPage > 1){
?>
                        <li class="page-item"><button class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></button></li>
<?php
}
for($i = 1; $i <= $pageNum; $i++){
?>
                        <li class="page-item <?= $i == $newPage ? "active" : "" ?>"><button class="page-link"><?= $i ?></button></li>
<?php }
if($newPage < $pageNum){
?>
                        <li class="page-item"><button class="page-link" aria-label="Next"><span aria-hidden="true">»</span></button></li>
<?php } ?>
                    </ul>
                </nav>