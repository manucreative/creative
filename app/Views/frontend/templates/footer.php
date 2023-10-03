</div>  <!-- wrapper end -->

  <!-- Footer Start -->
  <div class="footer wow fadeIn" data-wow-delay="0.3s">
                <div class="container">
                    <div class="footer-wrapper">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-contact wow fadeInLeft">
                                <h2>Office Contact</h2>
                                <p><i class="fa fa-map-marker-alt"></i>&nbsp 2522-00100, Nairobi, Kenya</p>
                                <p><i class="fa fa-phone-alt"></i>&nbsp +254-721827214</p>
                                <p><i class="fa fa-phone-alt"></i>&nbsp +254-745369555</p>
                                <p><i class="fa fa-envelope"></i>&nbsp emmanuelkirui34@gmail.com</p>
                                <div class="footer-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link wow fadeInDown">
                                <h2>My Services Areas</h2>
                                <a href="<?php echo base_url('services')?>">Websites Development</a>
                                <a href="<?php echo base_url('services')?>">Android Development</a>
                                <a href="<?php echo base_url('services')?>">Graphic Design</a>
                                <a href="<?php echo base_url('services')?>">E-commerce Development</a>
                                <a href="<?php echo base_url('services')?>">Web Hosting Support</a>
                                <a href="<?php echo base_url('services')?>">System Administration</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link wow fadeInDown">
                                <h2>Useful Sites</h2>
                                <a href="<?php echo base_url('about')?>">My Profile</a>
                                <a href="<?php echo base_url('contact')?>">Contact Me</a>
                                <a href="<?php echo base_url('services')?>">All Services</a>
                                <a href="<?php echo base_url('portfolio')?>">My Projects</a>
                                <a href="<?php echo base_url('myBlogs')?>">My Blogs</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="newsletter wow fadeInRight">
                                <h2>Newsletter</h2>
                                <p>
                                    For More Updates or to learn more about Me, I kindly request you to Subscribe my news letter Now. Take advantage of finding a close developer for your project.
                                </p>
                                <div class="form">
                                    <input class="form-control" placeholder="Email here">
                                    <button class="btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="container footer-menu wow fadeInUp">
                    <div class="f-menu">
                        <a href="">Terms of use</a>
                        <a href="">Privacy policy</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="<?php echo base_url('faqs')?>">FQAs</a>
                    </div>
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; <a href="#">Manu Creative Dev</a>, All Right Reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p>Developed and managed By :<a href="<?php echo base_url()?>">Emmanuel Kirui</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
            <script src="<?php echo base_url('frontend/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('frontend/manuu/easing/easing.min.js')?>"></script>
        <script src="<?php echo base_url('frontend/manuu/wow/wow.min.js')?>"></script>
        <script src="<?php echo base_url('frontend/manuu/owlcarousel/owl.carousel.min.js')?>"></script>
        <script src="<?php echo base_url('frontend/manuu/isotope/isotope.pkgd.min.js')?>"></script>
        <script src="<?php echo base_url('frontend/manuu/lightbox/js/lightbox.min.js')?>"></script>
        <script src="<?php echo base_url('frontend/manuu/waypoints/waypoints.min.js')?>"></script>
        <script src="<?php echo base_url('frontend/manuu/counterup/counterup.min.js')?>"></script>
        <script src="<?php echo base_url('frontend/manuu/slick/slick.min.js')?>"></script>

        <!-- Template Javascript -->
        <script src="<?php echo base_url('frontend/js/main.js')?>"></script>
        <script>
    tinymce.init({
    selector: '#contact_message', // Change this to match your textarea's class or ID
    height: 300,
    plugins: 'link image code',
    toolbar: 'undo redo | formatselect | bold italic underline strikethrough | fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | table | code',
    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt', // Customize font sizes as needed
    menubar: true,
    skin_url: '<?php echo base_url('frontend/tinymce/js/tinymce/skins/ui/tinymce-5-dark');?>',
});
 </script>
    </body>
</html>