<?php
    require 'includes/header.php';
    //require 'includes/banner.php';
    $totalItems =  count($productDetails->getAllProductsPublish());
    $itemsPerPage = 30;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);
    $listingProduct = $productDetails->getPaginateProductsPublish($start, $itemsPerPage);
    $listingProduct2 = $productDetails->getPaginateListProductsPublish($start, $itemsPerPage);
    $listingProduct3 = $productDetails->getPaginateListCateProductsPublish($start, $itemsPerPage);
?>
<main class="main">
    <div class="container">
        <div class="row">      
            <div class="col-lg-9">
                <div class="boxed-slider owl-carousel owl-carousel-lazy owl-theme owl-theme-light mb-3">
                    <div class="category-slide">
                        <div class="slide-bg owl-lazy"  data-src="assets/images/banners/sporting.jpg"></div><!-- End .slide-bg -->
                        <div class="banner boxed-slide-content offset-1">
                            <h2 class="banner-subtitle">check out over <span><?php echo $totalItems * 10 ?>+</span></h2>
                            <h1 class="banner-title">
                                INCREDIBLE deals
                            </h1>
                            <a href="./" class="btn btn-dark">Shop Now</a>
                        </div><!-- End .home-slide-content -->
                    </div><!-- End .home-slide -->

                    <div class="category-slide">
                        <div class="slide-bg owl-lazy"  data-src="assets/images/banners/home-appliances.png"></div><!-- End .slide-bg -->
                        <div class="banner boxed-slide-content offset-1">
                            <h2 class="banner-subtitle">check out over <span><?php echo $totalItems *20 ?>+</span></h2>
                            <h1 class="banner-title">
                                INCREDIBLE deals
                            </h1>
                            <a href="./" class="btn btn-dark">Shop Now</a>
                        </div><!-- End .home-slide-content -->
                    </div><!-- End .home-slide -->
                    <div class="category-slide">
                        <div class="slide-bg owl-lazy"  data-src="assets/images/banners/cas.jpg"></div><!-- End .slide-bg -->
                        <div class="banner boxed-slide-content offset-1">
                            <h2 class="banner-subtitle">check out over <span><?php echo $totalItems * 40 ?>+</span></h2>
                            <h1 class="banner-title">
                                INCREDIBLE deals
                            </h1>
                            <a href="./" class="btn btn-dark">Shop Now</a>
                        </div><!-- End .home-slide-content -->
                    </div><!-- End .home-slide -->

                    <div class="category-slide">
                        <div class="slide-bg owl-lazy"  data-src="assets/images/banners/new_shorts_news_story_pic_2018.png"></div><!-- End .slide-bg -->
                        <div class="banner boxed-slide-content offset-1">
                            <h2 class="banner-subtitle">check out over <span><?php echo $totalItems * 50 ?>+</span></h2>
                            <h1 class="banner-title">
                                INCREDIBLE deals
                            </h1>
                            <a href="./" class="btn btn-dark">Shop Now</a>
                        </div><!-- End .home-slide-content -->
                    </div><!-- End .home-slide -->
                </div><!-- End .home-slider -->
                <div class="info-boxes-container">
                    <div class="container-fluid">
                        <div class="info-box">
                            <i class="icon-shipping"></i>
                            <div class="info-box-content">
                                <h4>FREE SHIPPING & RETURN</h4>
                                <p style="color: white">100% Shipping Guarantee</h4>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->
                        <div class="info-box">
                            <i class="icon-us-dollar"></i>

                            <div class="info-box-content">
                                <h4>MONEY BACK GUARANTEE</h4>
                                <p style="color: white">100% money back guarantee</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->
                        <div class="info-box">
                            <i class="icon-support"></i>

                            <div class="info-box-content">
                                <h4>ONLINE SUPPORT 24/7</h4>
                                <p style="color: white">Lorem ipsum dolor sit amet.</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .info-boxes-container -->
               <nav class="toolbox horizontal-filter filter-sorts">
                    <div class="filter-toggle">
                        <span>Filters:</span>
                        <a href=#>&nbsp;</a>
                    </div>

                    <div class="sidebar-overlay"></div>
                    <aside class="toolbox-left sidebar-shop mobile-sidebar">
                        
                        <div class="toolbox-item toolbox-sort price-sort select-custom">
                            <a class="sort-menu-trigger" href="#">Sort By Price</a>
                            <form action="sort-product-by-price.php" class="filter-price-form" method="POST">
                                <label>Min price</label>
                                <input type="number" class="input-price" name="product_price" placeholder="Enter Price in Naira e.g 1000" minlength="3" />
                                <input type="hidden" name="brand_name">
                                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                <div class="filter-price-action mt-0" align="center">
                                    <button type="submit" class="btn btn-primary">Get The Products</button>
                                </div>
                            </form>
                        </div><!-- End .toolbox-item -->

                    </aside><!-- End .toolbox-left -->

                    <div class="toolbox-item ml-lg-auto">
                        <div class="toolbox-item toolbox-show">
                            <label>Showing <?php echo $totalItems ?> of <?php echo $itemsPerPage ?> results</label>
                        </div><!-- End .toolbox-item -->
                        <div class="layout-modes">
                            <a href="./" class="layout-btn btn-grid" title="Grid">
                                <i class="icon-mode-grid"></i>
                            </a>
                            
                        </div><!-- End .layout-modes -->
                    </div>
                </nav>
                <div class="product-wrapper">
                    <div class="row row-sm category-grid"><?php 
                        foreach($listingProduct as $featureProduct){ 
                            $product_number = $featureProduct['product_number'];
                            $ragzProduct = $productDetails->getProductsDet($product_number);
                            $ragzProductDetails = $productDetails->getProductsDetails($product_number);
                            $category_id = $ragzProduct['category_id'];
                            $cateDetails = $productsCate->getCategoryDetailsId($category_id);
                            $category_name = $cateDetails['category_name'];
                            $manufacturer_id = $ragzProduct['manufacturer_id'];
                            $gettingManu = $db->prepare("SELECT * FROM manufacturer WHERE manufacturer_id=:manufacturer_id");
                            $arr = array(':manufacturer_id'=>$manufacturer_id);
                            $gettingManu->execute($arr); ?>
                            <div class="col-6 col-md-4 col-xl-4" align="center">
                                <div class="grid-product">
                                    <figure class="product-image-container">
                                        
                                        <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                            <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $ragzProduct['product_name']; ?>" style="width: 150px; height: 150px;" />
                                        </a>
                                        <a href="product-quick-view.php?product_number=<?php echo $product_number ?>" class="btn-quickview">Quick View</a><?php 
                                        $num = (5/100)*$ragzProductDetails['product_price'] + $ragzProductDetails['product_price'];
                                        $num2= (20/100)*$ragzProductDetails['product_price'];
                                        $adding = $num2 + $ragzProductDetails['product_price'];
                                        $comp = (1- $adding /$num) * 100;
                                        $round = round($comp); ?>
                                        <span class="product-label label-sale"> <?php echo $round ?></span>
                                    </figure>
                                    <div class="product-details">
                                        <div class="ratings-container" style="color: red">
                                            <h6><b><?php 
                                            while($see_manu = $gettingManu->fetch()){ 
                                                echo $see_manu['manufacturer_name']; 
                                            } ?></b></h6>
                                        </div>
                                        <h2 class="product-title">
                                            <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $ragzProduct['product_name']; ?></a>
                                        </h2>
                                        <div class="price-box">
                                            <span class="old-price" style="color: red"><?php 
                                                $num = (5/100)*$ragzProductDetails['product_price'] + $ragzProductDetails['product_price'];
                                                $num2= (20/100)*$ragzProductDetails['product_price'];
                                                $adding = $num2 + $ragzProductDetails['product_price'];
                                                number_format($ragzProductDetails['product_price']); ?> 
                                                 &#8358;<?php echo number_format($adding) ?>   
                                            </span>
                                            <span class="product-price" style="color: green">&#8358;<?php echo number_format($num) ?></span>
                                        </div><!-- End .price-box -->
                                        <form action="handlers/cart/addToCart.php" method="get">
                                            <div class="product-grid-action">
                                                <input type="hidden" name="sizes" value="<?php echo $ragzProductDetails['product_size']; ?>">
                                                <input type="hidden" name="merchant_number" value="<?php echo $ragzProductDetails['merchant_number']; ?>">
                                                <input type="hidden" name="product_price" value="<?php echo $ragzProductDetails['product_price'] ?>">
                                                <input type="hidden" name="product_number" value="<?php echo $product_number; ?>">
                                                <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                                
                                                <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist">
                                                    <span>Wishlist</span>
                                                </a>

                                                <button type="submit" class="btn btn-danger" value="Add To Cart" data-toggle="<?php echo $ragzProduct['product_name']; ?>" data-original-title="Add to cart"> ADD TO CART</button>

                                                <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Compare' ?>" class="paction add-compare" title="Compare">
                                                    <span>Compare</span>
                                                </a>
                                            </div>
                                        </form> 
                                    </div><!-- End .product-details -->
                                </div><!-- End .product -->
                            </div><!-- End .col-xl-3 -->  <?php 
                        } ?> 
                    </div>
                </div><!-- End .row -->
                <div class="toolbox-item toolbox-show">
                   <label>Showing <?php echo $totalItems ?> of <?php echo $itemsPerPage ?> results</label>
                </div><!-- End .toolbox-item -->       
                <nav class="toolbox toolbox-pagination">
                    <div class="col-md-12">
                        <?php 
                        if($totalItems > 1){ ?>
                            <div class="col-md-6" align=""><?php
                                if($page != $totalPages){ ?>
                                    <div >
                                        <a href="brand-products.php?brand_name=<?php echo $brand_name ?>&&page=<?php echo $page + 1;?>" class="btn btn-primary">NEXT PAGE <i class="icon-angle-right"></i>
                                        </a>
                                    </div><?php
                                }  ?>
                            </div>
                            <div class="col-md-6" style="margin-left: 750px;"><?php
                                if($page != 1){ ?>
                                    <div style="margin-top: -30px">
                                       <a href="brand-products.php?brand_name=<?php echo $brand_name ?>&&page=<?php echo $page - 1;?>" class="btn btn-success">
                                            PREVIOUS PAGE <i class="icon-angle-left"></i> 
                                        </a>
                                    </div><?php 
                                }?>
                            </div><?php
                        }    ?>                   
                    </div> 
                </nav>
        
                <div class="container"><h2 class="subtitle text-center"><span>PRODUCT MERCHANT</span></h2>
                    <div class="featured-products owl-carousel owl-theme owl-nav-top" style="margin-top: ">
                        <?php 
                        $getting = $db->prepare("SELECT * FROM merchant ORDER BY merchant_id desc");
                        $getting->execute();
                        while($see = $getting->fetch()){ 
                            $merchant_number = $see['merchant_number'];
                            $trace = $productDetails->countMerchantProductPublish($merchant_number); ?>
                            <a href="merchants-products.php?merchant_name=<?php echo $see['merchant_name']; ?>" class="partner">
                                <img src="<?php echo 'assets/images/merchant/'. $see['merchant_logo'] ?>" alt="<?php echo $see['merchant_name'] ?>" style="width: 100; height: 100px;">
                            </a><?php
                        } ?>
                    </div><!-- End .featured-products -->
                </div>
                <div class="container products-body">
                    <div class="product-single-tabs" style="margin-top:">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">New Arrivals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Featured Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Popular Demands</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                <div class="product-wrapper">
                    				<div class="row row-sm category-grid"><?php 
                                        foreach($listingProduct as $featureProduct){ 
                                            $product_number = $featureProduct['product_number'];
                                            $ragzProduct = $productDetails->getProductsDet($product_number);
                                            $ragzProductDetails = $productDetails->getProductsDetails($product_number);
                                            $category_id = $ragzProduct['category_id'];
                                            $cateDetails = $productsCate->getCategoryDetailsId($category_id);
                                            $category_name = $cateDetails['category_name'];
                                            $manufacturer_id = $ragzProduct['manufacturer_id'];
                                            $gettingManu = $db->prepare("SELECT * FROM manufacturer WHERE manufacturer_id=:manufacturer_id");
                                            $arr = array(':manufacturer_id'=>$manufacturer_id);
                                            $gettingManu->execute($arr); ?>
                                            <div class="col-6 col-md-4 col-xl-3" align="center">
                                                <div class="product">
                                                    <figure class="product-image-container">
                                                        <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                                            <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $ragzProduct['product_name']; ?>" style="width: 150px; height: 150px;" />
                                                        </a>
                                                        <a href="product-quick-view.php?product_number=<?php echo $product_number ?>" class="btn-quickview">Quick View</a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <div class="ratings-container" style="color: red">
                                                            <?php 
                                                            while($see_manu = $gettingManu->fetch()){ 
                                                                echo $see_manu['manufacturer_name']; 
                                                            } ?>
                                                        </div>
                                                        <h2 class="product-title">
                                                            <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $ragzProduct['product_name']; ?></a>
                                                        </h2>
                                                        <span class="old-price" style="color: red"><?php 
                                                            $num = (15/100)*$ragzProductDetails['product_price'];
                                                            $adding = $num + $ragzProductDetails['product_price'];
                                                             number_format($ragzProductDetails['product_price']); ?>    
                                                        </span>
                                                        <span class="product-price" style="color: green">&#8358;<?php echo number_format($adding) ?></span>
                                                        <form action="handlers/cart/addToCart.php" method="get">
                                                            <div class="product-action" align="center">
                                                                <input type="hidden" name="sizes" value="<?php echo $ragzProductDetails['product_size']; ?>">
                                                                <input type="hidden" name="product_price" value="<?php echo $ragzProductDetails['product_price'] ?>">
                                                                <input type="hidden" name="product_number" value="<?php echo $product_number; ?>">
                                                                <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                                                
                                                                <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist">
                                                                    <span>Wishlist</span>
                                                                </a>

                                                                <button type="submit" class="btn btn-danger" value="Add To Cart" data-toggle="<?php echo $ragzProduct['product_name']; ?>" data-original-title="Add to cart">ADD TO CART</button>

                                                                <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Compare' ?>" class="paction add-compare" title="Compare">
                                                                    <span>Compare</span>
                                                                </a>
                                                                
                                                            </div>
                                                        </form>
                                                        
                                                    </div><!-- End .product-details -->
                                                </div><!-- End .product -->
                                            </div><!-- End .col-xl-3 --><?php 
                                        } ?>

                                    </div><!-- End .row -->
                                </div><!-- End .product-desc-content -->
                            </div><!-- End .tab-pane -->

                            <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                                <div class="product-wrapper">
                    				<div class="row row-sm category-grid"><?php 
                                        foreach($listingProduct2 as $featureProduct){ 
                                            $product_number = $featureProduct['product_number'];
                                            $ragzProduct = $productDetails->getProductsDet($product_number);
                                            $ragzProductDetails = $productDetails->getProductsDetails($product_number);
                                            $category_id = $ragzProduct['category_id'];
                                            $cateDetails = $productsCate->getCategoryDetailsId($category_id);
                                            $category_name = $cateDetails['category_name'];
                                            $manufacturer_id = $ragzProduct['manufacturer_id'];
                                            $gettingManu = $db->prepare("SELECT * FROM manufacturer WHERE manufacturer_id=:manufacturer_id");
                                            $arr = array(':manufacturer_id'=>$manufacturer_id);
                                            $gettingManu->execute($arr); ?>
                                            <div class="col-6 col-md-4 col-xl-3" align="center">
                                                <div class="product">
                                                    <figure class="product-image-container">
                                                        <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                                            <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $ragzProduct['product_name']; ?>" style="width: 150px; height: 150px;" />
                                                        </a>
                                                        <a href="product-quick-view.php?product_number=<?php echo $product_number ?>" class="btn-quickview">Quick View</a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <div class="ratings-container" style="color: red">
                                                            <?php 
                                                            while($see_manu = $gettingManu->fetch()){ 
                                                                echo $see_manu['manufacturer_name']; 
                                                            } ?>
                                                        </div>
                                                        <h2 class="product-title">
                                                            <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $ragzProduct['product_name']; ?></a>
                                                        </h2>
                                                        <span class="old-price" style="color: red"><?php $num = (15/100)*$ragzProductDetails['product_price'];
                                                            $adding = $num + $ragzProductDetails['product_price'];
                                                             number_format($ragzProductDetails['product_price']); ?>    
                                                        </span>
                                                        <span class="product-price" style="color: green">&#8358;<?php echo number_format($adding) ?></span>
                                                        <form action="handlers/cart/addToCart.php" method="get">
                                                            <div class="product-action" align="center">
                                                                <input type="hidden" name="sizes" value="<?php echo $ragzProductDetails['product_size']; ?>">
                                                                <input type="hidden" name="product_price" value="<?php echo $ragzProductDetails['product_price'] ?>">
                                                                <input type="hidden" name="product_number" value="<?php echo $product_number; ?>">
                                                                <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                                                
                                                                <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist">
                                                                    <span>Wishlist</span>
                                                                </a>

                                                                <button type="submit" class="btn btn-danger" value="Add To Cart" data-toggle="<?php echo $ragzProduct['product_name']; ?>" data-original-title="Add to cart">ADD TO CART</button>

                                                                <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Compare' ?>" class="paction add-compare" title="Compare">
                                                                    <span>Compare</span>
                                                                </a>
                                                                
                                                            </div>
                                                        </form>
                                                        
                                                    </div><!-- End .product-details -->
                                                </div><!-- End .product -->
                                            </div><!-- End .col-xl-3 --><?php 
                                        } ?>

                                    </div><!-- End .row -->
                                </div><!-- End .product-tags-content -->
                            </div><!-- End .tab-pane -->

                            <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                               <div class="product-wrapper">
                    				<div class="row row-sm category-grid">
                                        <div class="row row-sm"><?php 
                                            foreach($listingProduct3 as $featureProduct){ 
                                                $product_number = $featureProduct['product_number'];
                                                $ragzProduct = $productDetails->getProductsDet($product_number);
                                                $ragzProductDetails = $productDetails->getProductsDetails($product_number);
                                                $category_id = $ragzProduct['category_id'];
                                                $cateDetails = $productsCate->getCategoryDetailsId($category_id);
                                                $category_name = $cateDetails['category_name'];
                                                $manufacturer_id = $ragzProduct['manufacturer_id'];
                                                $gettingManu = $db->prepare("SELECT * FROM manufacturer WHERE manufacturer_id=:manufacturer_id");
                                                $arr = array(':manufacturer_id'=>$manufacturer_id);
                                                $gettingManu->execute($arr); ?>
                                                <div class="col-6 col-md-4 col-xl-3" align="center">
                                                    <div class="product">
                                                        <figure class="product-image-container">
                                                            <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                                                <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $ragzProduct['product_name']; ?>" style="width: 150px; height: 150px;" />
                                                            </a>
                                                            <a href="product-quick-view.php?product_number=<?php echo $product_number ?>" class="btn-quickview">Quick View</a>
                                                        </figure>
                                                        <div class="product-details">
                                                            <div class="ratings-container" style="color: red">
                                                                <?php 
                                                                while($see_manu = $gettingManu->fetch()){ 
                                                                    echo $see_manu['manufacturer_name']; 
                                                                } ?>
                                                            </div>
                                                            <h2 class="product-title">
                                                                <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $ragzProduct['product_name']; ?></a>
                                                            </h2>
                                                            <span class="old-price" style="color: red"><?php $num = (15/100)*$ragzProductDetails['product_price'];
                                                                $adding = $num + $ragzProductDetails['product_price'];
                                                                 number_format($ragzProductDetails['product_price']); ?>    
                                                            </span>
                                                            <span class="product-price" style="color: green">&#8358;<?php echo number_format($adding) ?></span>
                                                            <form action="handlers/cart/addToCart.php" method="get">
                                                                <div class="product-action" align="center">
                                                                    <input type="hidden" name="sizes" value="<?php echo $ragzProductDetails['product_size']; ?>">
                                                                    <input type="hidden" name="product_price" value="<?php echo $ragzProductDetails['product_price'] ?>">
                                                                    <input type="hidden" name="product_number" value="<?php echo $product_number; ?>">
                                                                    <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                                                    
                                                                    <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist">
                                                                    <span>Wishlist</span>
                                                                    </a>

                                                                    <button type="submit" class="btn btn-danger" value="Add To Cart" data-toggle="<?php echo $ragzProduct['product_name']; ?>" data-original-title="Add to cart">ADD TO CART</button>

                                                                    <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Compare' ?>" class="paction add-compare" title="Compare">
                                                                        <span>Compare</span>
                                                                    </a>
                                                                    
                                                                </div>
                                                            </form>
                                                            
                                                        </div><!-- End .product-details -->
                                                    </div><!-- End .product -->
                                                </div><!-- End .col-xl-3 --><?php 
                                            } ?>

                                        </div><!-- End .row -->
                                    </div><!-- End .add-product-review -->
                                </div><!-- End .product-reviews-content -->
                            </div><!-- End .tab-pane -->
                        </div><!-- End .tab-content -->
                        <div class="toolbox-item toolbox-show">
                           <label>Showing <?php echo $totalItems ?> of <?php echo $itemsPerPage ?> results</label>
                        </div><!-- End .toolbox-item -->       
                        <nav class="toolbox toolbox-pagination">
                            <div class="col-md-12">
                                <?php 
                                if($totalItems > 1){ ?>
                                    <div class="col-md-6" align=""><?php
                                        if($page != $totalPages){ ?>
                                            <div >
                                                <a href="index.php?page=<?php echo $page + 1;?>" class="btn btn-primary">NEXT PAGE <i class="icon-angle-right"></i>
                                                </a>
                                            </div><?php
                                        }  ?>
                                    </div>
                                    <div class="col-md-6" style="margin-left: 750px;"><?php
                                        if($page != 1){ ?>
                                            <div style="margin-top: -30px">
                                               <a href="index.php?page=<?php echo $page - 1;?>" class="btn btn-success">
                                                    PREVIOUS PAGE <i class="icon-angle-left"></i> 
                                                </a>
                                            </div><?php 
                                        }?>
                                    </div><?php
                                }    ?>                   
                            </div> 
                        </nav>
                    </div>
                </div>
                <div class="container"><h2 class="subtitle text-center"><span>PRODUCT BRANDS</span></h2>
                    <div class="featured-products owl-carousel owl-theme owl-nav-top" style="margin-top: ">
                        <?php 
                        $getting = $db->prepare("SELECT * FROM manufacturer ORDER BY manufacturer_name asc");
                        $getting->execute();
                        while($see = $getting->fetch()){ 
                            $brand_name = $see['manufacturer_name'];
                             ?>
                            <a href="brand-products.php?brand_name=<?php echo $brand_name ?>" class="partner">
                                <img src="<?php echo 'manufacturer-logo/'. $see['manufacturer_logo'] ?>" alt="<?php echo $brand_name ?>" style="width: 100; height: 100px;">
                            </a><?php
                        } ?>
                    </div><!-- End .featured-products -->
                </div>
            </div><!-- End .col-lg-9 -->

            <?php require 'includes/aside.php'; ?>
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->
<div class="mb-5"></div><!-- margin -->

   
</main><!-- End .main -->

<?php require 'includes/footer.php'; ?>