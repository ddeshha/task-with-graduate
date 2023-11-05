<?php
        require_once("./dashboard/functions/connect.php");
        require_once 'inc/header.php';
    ?>
<head>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/vendor/animate/animate.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/vendor/slick/slick.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="style/css/util.css">
		<link rel="stylesheet" type="text/css" href="style/css/main.css">
	<!--===============================================================================================-->
</head>
<body class="animsition">
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>
					<?php  
						$productId  = $_GET ['id'];
						$select = "SELECT * FROM products WHERE `id` = $productId ";
						$query = $conn -> query($select);
						$product = $query -> fetch_assoc();
					?>
					<div class="slick3">
					<?php
						$productImgs = explode(",", $product['img']);
						foreach($productImgs as $img){
						?>
						<div class="item-slick3" data-thumb="dashboard/img/db/<?= $img ?>">
							<div class="wrap-pic-w">
								<img src="dashboard/img/db/<?=  $img ?>" alt="IMG-PRODUCT">
							</div>
						</div>
						<?php }?>
						
						
					</div>
				</div>
			</div>
			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?= $product ['name'] ?>
				</h4>
				<span class="m-text17">
					<?= $product ['price'] ?>
				</span>
				
				<div class="p-t-33 p-b-60">
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Date Product
						</div>
						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<input type="text" class="form-control" value="<?= $product ['date'] ?>" readonly>
						</div>
					</div>
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Seller Name
						</div>
						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<input type="text" class="form-control" value="<?= $product ['username'] ?>" readonly>
						</div>
					</div>
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Item Location
						</div>
						<?php  
							$cityId = filter_var($product['city_id'],FILTER_SANITIZE_NUMBER_INT) ;
							$select = "SELECT * FROM city WHERE `id` = $cityId ";
							$query = $conn -> query($select);
							$city = $query -> fetch_assoc();
					?>
						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<input type="text" name="name" class="form-control" value="<?= $city ['name'] ?>" readonly>
						</div>
					</div>
					
					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									<a href="saller.php?id=<?= $product["id"]; ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">Contact Sellers</a>
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>
					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?= $product ['description'] ?>
						</p>
					</div>
				</div>
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>
					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Meet the seller in a public place such as the metro, malls or petrol stations
							Take someone with you and you are going to meet anyone
							Check the product well before you buy and make sure that the price is right
							Do not pay or transfer money unless you see the product well
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>
			<div class="wrap-slick2">
				<div class="slick2">
				<?php
                    if (!isset( $_GET['category_id']))
                    {
                        $selectPro = "SELECT * FROM products";
                    }
                    else 
                    {
                        $category_id = $_GET['category_id'];
                        $selectPro = "SELECT * FROM products WHERE category_id = $category_id ";
                    }
                    $query = $conn -> query($selectPro);
                    foreach ($query as $product) {
                        require_once "dashboard/functions/GetImgs.php";
                        $imgs = GetImgs::get($product["id"], $conn);
                        $productImgs = explode(",", $product['img']);
                ?>
					<div class="col-12 col-sm-6 col-md-6 col-lg-8">
                    <article class="article" style="box-shadow: 0 4px 25px 0 rgba(0,0,0,0.1); background-color: #fff; border-radius: 10px; border: none; position: relative; margin-bottom: 30px; box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);">
                        <div class="article-header" style="height: 170px; position: relative; overflow: hidden;">
                            <div class="article-image" style="background-image: url(./dashboard/img/db/<?= $productImgs[0]; ?>); background-color: #fbfbfb; background-position: center; background-size: cover; background-repeat: no-repeat; width: 100%; height: 100%; z-index: -1;"
                                data-background="./dashboard/img/db/<?= $productImgs[0]; ?>">
                            </div>
                            <div class="article-title" style="position: absolute; bottom: 0; left: 0; width: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.01) 1%, rgba(0,0,0,0.65) 98%, rgba(0,0,0,0.65) 100%); padding: 10px;">
                            <h2 style="font-size: 16px; color:white; line-height: 24px;"><?= $product['name']?></h2>
                            </div>
                        </div>
                        <div class="article-details" style="background-color: #626f87; padding: 20px; line-height: 24px;">
                            <h2 style="font-size: 16px; color:black; line-height: 24px;"><?= $product['price']?></h2>
                            <div class="article-cta">
                                <a href="detail.php?id=<?= $product["id"]; ?>" style="bacground:red;" class="btn btn-primary">View Product</a>
                            </div>
                        </div>
                    </article>
                </div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>
	<!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
		<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="font-weight-bold border border-black px-3 mr-1" style="color:#007bfe;">T</span>ABADAL</h1>
                </a>
                <p class="mb-2" style="color: #212529;"><i class="fa fa-map-marker-alt text-primary mr-3"></i> Street, Mansoura, EG</p>
                <p class="mb-2" style="color: #212529;"><i class="fa fa-envelope text-primary mr-3"></i>tabadal@example.com</p>
                <p class="mb-0" style="color: #212529;"><i class="fa fa-phone-alt text-primary mr-3"></i>+21023800994</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Social media</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="tabadal@twitter"><i class="fa fa-angle-right mr-2"></i>Twitter</a>
                            <a class="text-dark mb-2" href="tabadal@Instagram"><i class="fa fa-angle-right mr-2"></i>Instagram</a>
                            <a class="text-dark mb-2" href="tabadal@Tumblr"><i class="fa fa-angle-right mr-2"></i>Tumblr</a>
                            <a class="text-dark mb-2" href="tabadal@Pinterest"><i class="fa fa-angle-right mr-2"></i>Pinterest</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">COMPANY</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>TABADAL-SHOP</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>TABADAL-SHOP
                </p>
            </div>
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $("#con").change(function(){
            var x = $(this).val()
            if(x=="egy"){$("#egy").show(100)&&$("#ksa,#fal,#qut,#uae,#omn,#bah,#mor,#gar,#tur,#lab").hide(100)}
            if(x=="ksa"){$("#ksa").show(100)&&$("#egy,#fal,#qut,#uae,#omn,#bah,#mor,#gar,#tur,#lab").hide(100)}
            if(x=="fal"){$("#fal").show(100)&&$("#ksa,#egy,#qut,#uae,#omn,#bah,#mor,#gar,#tur,#lab").hide(100)}
            if(x=="qut"){$("#qut").show(100)&&$("#ksa,#fal,#egy,#uae,#omn,#bah,#mor,#gar,#tur,#lab").hide(100)}
            if(x=="uae"){$("#uae").show(100)&&$("#ksa,#fal,#qut,#egy,#omn,#bah,#mor,#gar,#tur,#lab").hide(100)}
            if(x=="omn"){$("#omn").show(100)&&$("#ksa,#fal,#qut,#uae,#egy,#bah,#mor,#gar,#tur,#lab").hide(100)}
            if(x=="bah"){$("#bah").show(100)&&$("#ksa,#fal,#qut,#uae,#omn,#egy,#mor,#gar,#tur,#lab").hide(100)}
            if(x=="mor"){$("#mor").show(100)&&$("#ksa,#fal,#qut,#uae,#omn,#bah,#egy,#gar,#tur,#lab").hide(100)}
            if(x=="gar"){$("#gar").show(100)&&$("#ksa,#fal,#qut,#uae,#omn,#bah,#mor,#egy,#tur,#lab").hide(100)}
            if(x=="tur"){$("#tur").show(100)&&$("#ksa,#fal,#qut,#uae,#omn,#bah,#mor,#gar,#egy,#lab").hide(100)}            
            if(x=="lab"){$("#lab").show(100)&&$("#ksa,#fal,#qut,#uae,#omn,#bah,#mor,#gar,#tur,#egy").hide(100)}
            })
    </script>
<!--===============================================================================================-->
	<script type="text/javascript" src="style/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="style/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="style/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="style/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="style/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="style/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="style/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="style/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
<!--===============================================================================================-->
	<script src="style/js/main.js"></script>
	</body>
</html>