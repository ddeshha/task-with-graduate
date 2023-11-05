<?php require_once 'inc/header.php'?>
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Tabadal</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="message" id="contactForm">
                        <div class="form-group">
                            <input class="form-control" type="name"  placeholder="Enter your name">
                            <br>
                            <input class="form-control" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                            <p class="help-block text-danger"></p>
                            <textarea name="message" id="" cols="59" rows="10"></textarea>
                            <div class="input-group-append">
                                <button class="btn btn-primary py-2 px-4" id="message" type="submit">Send Message</button>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p>Contact us, you will be contacted immediately. Customer service is available 24 hours a day .</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3"> Tabadal Shop</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Mansoura, New York, EG</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>tabadal@example.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+01023800994</p>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Contact End -->
<?php require_once 'inc/footer.php'?>
    <script>
        $("#message").click(function(){
            let name = $(this).parent().prev().prev().prev().prev().prev().val();
            let email = $(this).parent().prev().prev().prev().val();
            let message = $(this).parent().prev().val();
            
            $(this).parent().prev().prev().prev().prev().prev().val('')
            $(this).parent().prev().prev().prev().val('')
            $(this).parent().prev().val('')
            
            $.post("functions/messages/add.php", {name, email, message}, function(){})
            });
        </script>