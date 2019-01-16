    <div class="header-bottom">
        <div class="container">
            <div class="header-left">
                <div class="main-dropdown-menu show is-stuck">
                    <a href="#" class="menu-toggler">
                        <i class="icon-menu"></i>
                        Shop By Category
                    </a>
                    <nav class="main-nav">
                        <ul class="menu menu-vertical sf-arrows">
                            <li class="active"><a href="./"><i class="icon-home"></i>Home</a></li>
                            <li><a href="" class="sf-with-ul"><i class="icon-briefcase"></i>Products Categories</a>
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
                            <li>
                                <a href="category.html" class="sf-with-ul"><i class="icon-briefcase"></i>
                                    Categories</a>
                                <div class="megamenu megamenu-fixed-width">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="menu-title">
                                                        <a href="#">Products Categories<span class="tip tip-new">New!</span></a>
                                                    </div>
                                                    <ul>
                                                        <?php
                                                        $cate = $db->prepare("SELECT * FROM products_category ORDER BY category_name asc  ");
                                                        $cate->execute();
                                                        while($see_cate = $cate->fetch()){?><li>
                                                            <a href="see-product-by-category.php?category_name=<?php echo $see_cate['category_name'] ?> "><?php echo $see_cate['category_name'] ?> 
                                                            </a> </li><?php
                                                        } ?>
                                                        <li><a href="category-banner-full-width.html">Fullwidth Banner<span class="tip tip-hot">Hot!</span></a></li>
                                                        <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                                                        <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                                                        <li><a href="category.html">Left Sidebar</a></li>
                                                        <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                                                        <li><a href="category-flex-grid.html">Product Flex Grid</a></li>
                                                        <li><a href="category-horizontal-filter1.html">Horizontal Filter1</a></li>
                                                        <li><a href="category-horizontal-filter2.html">Horizontal Filter2</a></li>
                                                    </ul>
                                                </div><!-- End .col-lg-6 -->
                                               
                                            </div><!-- End .row -->
                                        </div><!-- End .col-lg-8 -->
                                       
                                    </div>
                                </div><!-- End .megamenu -->
                            </li>
                            <li class="megamenu-container">
                                <a href="product.html" class="sf-with-ul"><i class="icon-video"></i>Products</a>
                                <div class="megamenu">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="menu-title">
                                                        <a href="#">Variations</a>
                                                    </div>
                                                    <ul>
                                                        <li><a href="product.html">Horizontal Thumbnails</a></li>
                                                        <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                                        <li><a href="product.html">Inner Zoom</a></li>
                                                        <li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
                                                        <li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
                                                    </ul>
                                                </div><!-- End .col-lg-4 -->
                                                <div class="col-lg-4">
                                                    <div class="menu-title">
                                                        <a href="#">Variations</a>
                                                    </div>
                                                    <ul>
                                                        <li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
                                                        <li><a href="product-simple.html">Simple Product</a></li>
                                                        <li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
                                                    </ul>
                                                </div><!-- End .col-lg-4 -->
                                                <div class="col-lg-4">
                                                    <div class="menu-title">
                                                        <a href="#">Product Layout Types</a>
                                                    </div>
                                                    <ul>
                                                        <li><a href="product.html">Default Layout</a></li>
                                                        <li><a href="product-extended-layout.html">Extended Layout</a></li>
                                                        <li><a href="product-full-width.html">Full Width Layout</a></li>
                                                        <li><a href="product-grid-layout.html">Grid Images Layout</a></li>
                                                        <li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
                                                        <li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
                                                    </ul>
                                                </div><!-- End .col-lg-4 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .col-lg-8 -->
                                        <div class="col-lg-4">
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="assets/images/menu-banner.jpg" alt="Menu banner" class="product-promo">
                                                </a>
                                            </div><!-- End .banner -->
                                        </div><!-- End .col-lg-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu -->
                            </li>
                            <li>
                                <a href="#" class="sf-with-ul"><i class="icon-docs-inv"></i>Pages</a>

                                <ul>
                                    <li><a href="cart.html">Shopping Cart</a></li>
                                    <li><a href="#">Checkout</a>
                                        <ul>
                                            <li><a href="checkout-shipping.html">Checkout Shipping</a></li>
                                            <li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
                                            <li><a href="checkout-review.html">Checkout Review</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Dashboard</a>
                                        <ul>
                                            <li><a href="dashboard.html">Dashboard</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="single.html">Blog Post</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li><a href="#" class="login-link">Login</a></li>
                                    <li><a href="forgot-password.php">Forgot Password</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="sf-with-ul"><i class="icon-sliders"></i>Features</a>
                                <ul>
                                    <li><a href="#">Header Types</a></li>
                                    <li><a href="#">Footer Types</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="sf-with-ul"><i class="icon-sliders"></i>Brands</a>
                                <ul>
                                    <?php
                                        $cate = $db->prepare("SELECT * FROM manufacturer ORDER BY manufacturer_name ASC LIMIT 0,5");
                                        $cate->execute();
                                        while($see_cate = $cate->fetch()){?><li>
                                            <a href="brand-products.php?brand_name=<?php echo $see_cate['manufacturer_name'] ?>"><?php 
                                                echo $see_cate['manufacturer_name'] ?> 
                                            </a></li><?php
                                        } ?>
                                    
                                </ul>
                            </li>
                            
                        </ul>
                    </nav>
                </div><!-- End .main-dropdown-menu -->
            </div><!-- End .header-left -->
            <div class="header-right">
                <div class="custom-link-menu"><?php
                    $cate = $db->prepare("SELECT * FROM products_category ORDER BY category_id desc LIMIT 0,5");
                    $cate->execute();
                    while($see_cate = $cate->fetch()){?>
                        <a href="see-product-by-category.php?category_name=<?php echo $see_cate['category_name'] ?> "><?php echo $see_cate['category_name'] ?> 
                        </a> <?php
                    } ?>
                </div><!-- End .custom-link-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->