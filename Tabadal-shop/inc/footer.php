
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="font-weight-bold border border-white px-3 mr-1" style="color:#7878ea;">T</span>ABADAL</h1>
                </a>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> Street, Mansoura, EG</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>tabadal@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+21023800994</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <!-- <a class="text-dark mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a> -->
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
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


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
           
           $('body').on('change' , '.secondForm' , function(){
                
                var second = $('.secondForm select').val();

                location.href='index.php?city='+second;
                
            })
    </script>
</body>

</html>