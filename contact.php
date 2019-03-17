<?php 

require_once 'inc/header.php'; 

?>




<section class="contact mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <h3 class="text-center">Contact us at <?php echo SITE_NAME; ?></h3><hr>
                
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
                
            </div>
        </div>
    </div>
</section>


<section class="contact-bg">
    <div class="contact-area">
            <div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            
            <p class="lead text-center">Fill in the form below to contact us</p>
            
            <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="text" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block mb-4">Send message</button>
                </form>
            
        </div>
    </div>
</div>
    </div>
</section>

    

      

<?php include_once 'inc/footer.php';