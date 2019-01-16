<?php 
    session_start();
    include_once("connection/connection.php");
    require 'libs_dev/products/products_class.php';
    require 'libs_dev/merchant/merchant_class.php';
    require 'dev_class/register/customer_registration_class.php';
    require 'dev_class/Cart.php';
    require 'dev_class/General.php';
    $productsCate = new ragzNationProductsCategory($db);
    $productDetails = new ragzNationProducts($db);
    $register = new newCustomerRegistration($db);
    $carting = new Cart();
    $general = new General();
    $merchantDetails = new productMerchant($db);
    $custOrder = new customersOrders($db);
    $listProduct = $productDetails->getAllProductsPublish();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Glorious Empire Clothens</title>
    <meta name="keywords" content="Cloths, Wrist Watch, Computers, ELectronics, Home Appliances">
    <meta name="description" content="Cloths, Wrist Watch, Computers, ELectronics, Home Appliances">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.ico">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/Toast/css/Toast.min.css">
</head>
<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left header-dropdowns">
                        <div class="header-dropdown">
                            <a href="#">USD</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown --><?php
                        if(isset($_SESSION['id'])){ 
                            $reg_number = $_SESSION['reg_number'];
                            $comp =  count($register->gettingCompared($reg_number));
                            $seeWish = $register->gettingWishListlLimit($reg_number);
                            $wish =  count($register->gettingWishList($reg_number));
                            $seeComp = $register->gettingComparedLimit($reg_number); ?>
                            <div class="dropdown compare-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" >
                                    <i class="icon-love"></i> Wish List (<?php echo $wish ?>)
                                </a><?php 
                                if($wish < 1){

                                }else{ ?>
                                    <div class="dropdown-menu" >
                                        <div class="dropdownmenu-wrapper">
                                            <ul class="compare-products"><?php 
                                                foreach($seeWish as $wishList){ 
                                                    $product_number = $wishList['product_number'];
                                                    $ragzProduct = $productDetails->getProductsDet($product_number);
                                                    $ragzProductDetails = $productDetails->getProductsDetails($product_number);

                                                    $deta = $productDetails->getTrippleProductsDet($product_number);
                                                    $ragzProduct = $productDetails->getProductsDet($product_number);
                                                    $manufacturer_id = $ragzProduct['manufacturer_id'];
                                                    $gettingManu = $db->prepare("SELECT * FROM manufacturer WHERE manufacturer_id=:manufacturer_id");
                                                    $arr = array(':manufacturer_id'=>$manufacturer_id);
                                                    $gettingManu->execute($arr); ?>
                                                    <li class="product">
                                                        <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php $num = (15/100)*$ragzProductDetails['product_price'];
                                                            $adding = $num + $ragzProductDetails['product_price'];
                                                            number_format($ragzProductDetails['product_price']); ?> &#8358;<?php echo number_format($adding) ?></a>
                                                        <h4 class="product-title"><a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $ragzProduct['product_name']; ?></a></h4>
                                                    </li>
                                                    <?php
                                                } ?>
                                                
                                            </ul>
                                            <div class="compare-actions">
                                                <a href="" class="action-link"></a>
                                                <a href="my-wishlist.php" class="btn btn-primary">Wish List</a>
                                            </div>
                                        </div>
                                    </div><!-- End .header-menu --> <?php 
                                } ?>
                            </div> | <!-- End .header-dropown -->
                            <div class="dropdown compare-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <i class="icon-retweet"></i> Compare (<?php echo $comp ?>)
                                </a> <?php

                                if($comp < 1){

                                }else{ ?>

                                    <div class="dropdown-menu" >
                                        <div class="dropdownmenu-wrapper">
                                            <ul class="compare-products"><?php 
                                                foreach($seeComp as $compList){ 
                                                    $product_number = $compList['product_number'];
                                                    $ragzProduct = $productDetails->getProductsDet($product_number);
                                                    $ragzProductDetails = $productDetails->getProductsDetails($product_number);

                                                    $deta = $productDetails->getTrippleProductsDet($product_number);
                                                    $ragzProduct = $productDetails->getProductsDet($product_number);
                                                    $manufacturer_id = $ragzProduct['manufacturer_id'];
                                                    $gettingManu = $db->prepare("SELECT * FROM manufacturer WHERE manufacturer_id=:manufacturer_id");
                                                    $arr = array(':manufacturer_id'=>$manufacturer_id);
                                                    $gettingManu->execute($arr); ?>
                                                    <li class="product">
                                                        <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php $num = (15/100)*$ragzProductDetails['product_price'];
                                                            $adding = $num + $ragzProductDetails['product_price'];
                                                            number_format($ragzProductDetails['product_price']); ?> &#8358;<?php echo number_format($adding) ?></a>
                                                        <h4 class="product-title"><a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $ragzProduct['product_name']; ?></a></h4>
                                                    </li>
                                                    <?php
                                                } ?>
                                            </ul>

                                            <div class="compare-actions">
                                                <a href="" class="action-link"></a>
                                                <a href="my-comparedlist.php" class="btn btn-primary">Compare List</a>
                                            </div>
                                        </div><!-- End .dropdownmenu-wrapper -->
                                    </div><!-- End .dropdown-menu --><?php 
                                } ?>
                            </div><!-- End .dropdown --><?php
                        }else{ ?>
                            <div class="header-dropdown">
                                <a href="">Wish List (0)</a>|
                                <a href="">Compared List (0)</a>
                                
                            </div><!-- End .header-dropown --><?php
                        } ?>
                        
                    </div><!-- End .header-left -->

                    <div class="header-right"> <?php
                      
                        if(!isset($_SESSION['id'])){ ?>
                            <p class="welcome-msg">WELCOME TO GLORIOUS EMPIRE CLOTHENS! </p>

                            <div class="header-dropdown dropdown-expanded">
                                <a href="#">Links</a>
                                <div class="header-menu">
                                    <ul>
                                        <li><a href="my-dashboard.php">DASHBOARD</a></li>
                                        <li><a href="my-orders.php">My Orders</a></li>
                                        <li><a href="login.php" class="">LOG IN</a></li>
                                        <li><a href="register.php" class="">REGISTER</a></li>
                                    </ul>
                                </div><!-- End .header-menu -->
                            </div><!-- End .header-dropown --><?php
                        }else{ ?>
                            <p class="welcome-msg"><?php echo $_SESSION['name']. " "; ?>WELCOME ! </p>
                            <div class="header-dropdown dropdown-expanded">
                                <a href="">Navigations</a>
                                <div class="header-menu">
                                    <ul>
                                        <li><a href="my-orders.php">MY ORDERS </a></li>
                                        <li><a href="">TRACK ORDERS </a></li>
                                        <li><a href="my-dashboard.php">MY DASHBOARD</a></li>
                                        <li><a href="logout.php">LOGOUT</a></li>
                                    </ul>
                                </div><!-- End .header-menu -->
                            </div><!-- End .header-dropown -->
                            <?php
                        } ?>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <a href="./" class="logo">
                            
                            <img src="assets/images/getit.jpg" alt="getit Logo" style="width: 150; height: 100px">
                            
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class=""><a href="./"> Home</a></li>
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
                                <li class="megamenu-container">
                                    <a href="" class="sf-with-ul">Products</a>
                                    <div class="megamenu">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="menu-title">
                                                            <a href="#">Variations</a>
                                                        </div>
                                                        <ul>
                                                            
                                                            <li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
                                                            
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
                                                            <
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
                                    <a href="#" class="sf-with-ul">Pages</a>

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
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="#" class="login-link">Login</a></li>
                                        <li><a href="forgot-password.html">Forgot Password</a></li>
                                    </ul>
                                </li>
                               
                            </ul>
                        </nav>

                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                    <div class="select-custom">
                                        <select id="cat" name="category_name">
                                            <option value="">All Categories</option>
                                            <option value=""> </option><?php
                                            $cate = $db->prepare("SELECT * FROM products_category ORDER BY category_name ASC");
                                            $cate->execute();
                                            while($see_cate = $cate->fetch()){?>
                                                <option value="<?php echo $see_cate['category_name'] ?>"><a href="see-product-by-category.php?category_name=<?php echo $see_cate['category_name'] ?> "><?php echo $see_cate['category_name'] ?></a></option> <?php
                                            } ?>
                                            
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <button class="btn" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>
                        <div class="header-contact">
                            <span style="color: white">Call us now</span>
                            <a href="tel:#"><strong>+2348138139333</strong></a>
                        </div><!-- End .header-contact -->

                        <div class="dropdown cart-dropdown">
                            <a href="" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <?php 
                                    if(isset($_SESSION['cart'])){ ?>
                                        <span class="cart-count"> <?php echo $totalGoodsinCart = Cart::getTotalQuantity($_SESSION['cart'])[0] ?><i class='fa fa-shopping-bag'></i>
                                        </span><?php 
                                    }else{ ?>
                                        <span class="cart-count"> 0 <i class='fa fa-shopping-bag'></i>
                                        </span><?php
                                    }
                                ?>
                                
                            </a>
                            <?php
                            if(isset($_SESSION['cart'])){
                                $cart = $_SESSION['cart'];
                                $count = count($cart);
                                if($count > 0){
                                    $total = array(); ?>
                                    <div class="dropdown-menu" >
                                        <div class="dropdownmenu-wrapper">
                                            <div class="dropdown-cart-products"><?php
                                                foreach($cart as $item){  
                                                    $product_number = $item['product_number'];
                                                    $ragzProduct = $productDetails->getProductsDet($product_number);
                                                    $ragzProductDetails = $productDetails->getProductsDetails($product_number);
                                                    $tripple = $productDetails->getTrippleProductsDet($product_number);
                                                    ?>
                                                    <div class="product">
                                                        <div class="product-details">
                                                            <h4 class="product-title">
                                                                <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $tripple['product_name']; ?></a>
                                                            </h4>
                                                               &#8358;<?php echo  $price =$ragzProductDetails['product_price'];
                                                               $cal = $ragzProductDetails['product_price'] * $item['quantity'];
                                                                array_push($total, $price); ?>
                                                           
                                                        </div><!-- End .product-details -->

                                                        <figure class="product-image-container">
                                                            <a href="product-details.php?product_number=<?php echo $product_number ?>">
                                                                <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="product" width="30" height="20">
                                                            </a>
                                                            <a href="handlers/cart/removeFromCart.php?product_number=<?php echo $product_number?>"" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a>
                                                        </figure>
                                                    </div><!-- End .product --><?php 
                                                } ?>
                                            </div>
                                        
                                            <div class="dropdown-cart-total">
                                                <span>Total</span>
                                                <span class="cart-total-price">&#8358;<?php echo number_format(array_sum($total));?></span>
                                            </div><!-- End .dropdown-cart-total -->

                                            <div class="dropdown-cart-action">
                                                <a href="cart.php" class="btn">View Cart</a>
                                                <a href="checkout.php" class="btn">Checkout</a>
                                            </div><!-- End .dropdown-cart-total -->
                                        </div><!-- End .dropdownmenu-wrapper --><?php
                                    }else{ ?>
                                        <p style="color: red"></p><?php 
                                    }
                                }else{ ?>
                                    <p style="color: red"></p><?php
                                } ?>
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->