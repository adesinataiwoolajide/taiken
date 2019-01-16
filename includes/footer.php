 <footer class="footer">
            <div class="footer-middle">
                <div class="container">
                    <div class="footer-ribbon" style="color: ">
                       <p style="color: red">Get It</p>
                    </div><!-- End .footer-ribbon -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="widget">
                                        <ul class="contact-info">
                                            <li>
                                                <span class="contact-info-label">Address:</span> 
                                            </li>
                                            <li>
                                                <span class="contact-info-label">Phone:</span>Toll Free <a href="tel:"></a>
                                            </li>
                                            <li>
                                                <span class="contact-info-label">Email:</span> <a href=""></a>
                                            </li>
                                            <li>
                                                <span class="contact-info-label">Working Days/Hours:</span>
                                                24 Hours
                                            </li>
                                        </ul>
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-5 -->
                                <div class="col-md-3">
                                    <div class="widget">
                                        <h4 class="widget-title">My Account</h4>

                                        <ul class="links">
                                            <li><a href="">About Us</a></li>
                                            <li><a href="">Contact Us</a></li>
                                            <li><a href="">My Account</a></li>
                                            <li><a href="">Orders History</a></li>
                                            <li><a href="">Advanced Search</a></li>
                                            <li><a href="" class="login-link">Login</a></li>
                                        </ul>
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-3 -->

                                <div class="col-md-5">
                                    <div class="widget">
                                        <h4 class="widget-title">Main Features</h4>
                                        
                                        <ul class="links">
                                            <li><a href="">Cheap SHopping</a></li>
                                        </ul>
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .col-lg-8 -->

                        <div class="col-lg-4">
                            <div class="widget widget-sletter">
                                <h4 class="widget-title">Subscribe sletter</h4>
                                <p>Get all the latest information on Events,Sales and Offers. Sign up for sletter today</p>
                                <form action="#">
                                    <input type="email" class="form-control" placeholder="Email address" required>

                                    <input type="submit" class="btn" value="Subscribe">
                                </form>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom">
                    <p class="footer-copyright">Glorious Colthens. &copy;  <?php echo date("Y") ?>.  All Rights Reserved</p>
                    <img src="assets/images/payments.png" alt="payment methods" class="footer-payments">

                    <div class="social-icons">
                        <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                        <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" target="_blank"><i class="icon-linkedin"></i></a>
                    </div><!-- End .social-icons -->
                </div><!-- End .footer-bottom -->
            </div><!-- End .containr -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active"><a href="./">Home</a></li>
                    <li><a href="" class="sf-with-ul"> Categories</a>
                        <ul>
                            <?php
                            $cate = $db->prepare("SELECT * FROM products_category ORDER BY category_name asc  ");
                            $cate->execute();
                            while($see_cate = $cate->fetch()){?><li>
                                <a href="see-product-by-category.php?category_name=<?php echo $see_cate['category_name'] ?> "><?php echo $see_cate['category_name'] ?> 
                                </a> </li><?php
                            } ?>
                            
                        </ul>
                    </li>
                    <li><a href="" class="sf-with-ul">Brands</a>
                        <ul>
                            <?php
                                $cate = $db->prepare("SELECT * FROM manufacturer ORDER BY manufacturer_name ASC");
                                $cate->execute();
                                while($see_cate = $cate->fetch()){?><li>
                                    <a href="brand-products.php?brand_name=<?php echo $see_cate['manufacturer_name'] ?>"><?php 
                                        echo $see_cate['manufacturer_name'] ?> 
                                    </a></li><?php
                                } ?>
                            
                        </ul>
                    </li>
                    <li><a href="" class="sf-with-ul">Features</a>
                        <ul>
                            <?php
                                $cate = $db->prepare("SELECT * FROM merchant ORDER BY merchant_name ASC");
                                $cate->execute();
                                while($see_cate = $cate->fetch()){?><li>
                                    <a href="merchants-products.php?merchant_name=<?php echo $see_cate['merchant_name'];?>"><?php 
                                        echo $see_cate['merchant_name'] ?> 
                                    </a></li><?php
                                } ?>
                            
                        </ul>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- <div class="sletter-popup mfp-hide" id="sletter-popup-form" style="background-image: url(assets/images/sletter_popup_bg.jpg)">
        <div class="sletter-popup-content">
            <img src="assets/images/logo-black.png" alt="Logo" class="logo-sletter">
            <h2>BE THE FIRST TO KNOW</h2>
            <p>Subscribe to the Porto eCommerce sletter to receive timely updates from your favorite products.</p>
            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="sletter-email" name="sletter-email" placeholder="Email address" required>
                    <input type="submit" class="btn" value="Go!">
                </div><!-- End .from-group -->
            </form>
            <div class="sletter-subscribe">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div><!-- End .sletter-popup-content -->
    </div><!-- End .sletter-popup -->
 -->
    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
    <script type="text/javascript" src="assets/drift-master/dist/Drift.js"></script>
    <script type="text/javascript" src="assets/Toast/js/Toast.min.js"></script>
    
    <?php 

    if(isset($_SESSION['success'])){
        $message = $_SESSION['success']; ?>
        <script type="text/javascript">
              new Toast({ message: '<?php echo $message; ?>', type: 'success' });
        </script><?php 
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        $message = $_SESSION['error'];  ?>   
        <script type="text/javascript">
              new Toast({ message: '<?php echo $message; ?>', type: 'danger' });
        </script><?php 
        unset($_SESSION['error']);
    } ?>
</body>

</html>