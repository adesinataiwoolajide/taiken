<?php
    require 'includes/header.php';
    require 'includes/banner.php';
    $totalItems =  count($productDetails->getAllProductsPublish());
    $itemsPerPage = 30;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);
    $listingProduct = $productDetails->getPaginateProductsPublish($start, $itemsPerPage);
    $listingProduct2 = $productDetails->getPaginateListProductsPublish($start, $itemsPerPage);
    $listingProduct3 = $productDetails->getPaginateListCateProductsPublish($start, $itemsPerPage);
?>
<div class="container">
    <div class="info-boxes-container">
        <div class="container-fluid">
            <div class="info-box">
                <i class="icon-shipping"></i>
                <div class="info-box-content">
                    <h4>FREE SHIPPING & RETURN</h4>
                    <p>Free shipping on all orders over #10000.</p>
                </div><!-- End .info-box-content -->
            </div><!-- End .info-box -->
            <div class="info-box">
                <i class="icon-us-dollar"></i>

                <div class="info-box-content">
                    <h4>MONEY BACK GUARANTEE</h4>
                    <p>100% money back guarantee</p>
                </div><!-- End .info-box-content -->
            </div><!-- End .info-box -->
            <div class="info-box">
                <i class="icon-support"></i>

                <div class="info-box-content">
                    <h4>ONLINE SUPPORT 24/7</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div><!-- End .info-box-content -->
            </div><!-- End .info-box -->
        </div><!-- End .container-fluid -->
    </div><!-- End .info-boxes-container -->
    <?php
    if($productDetails->checkAllProductsPublish()){ ?>
        <div class="col-md-12">
            <p style="color: red" align="center"><?php echo "No Product is Available For Sale At The Moment, Please Try Again Later" ?></p>
        </div><?php
    }else{ ?>
        <div class="container products-body">

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
                            <input type="hidden" name="brand_name" value="<?php echo $brand_name ?>">
                            <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                            <div class="filter-price-action mt-0" align="center">
                                <button type="submit" class="btn btn-primary">Get The Products</button>
                            </div>
                        </form>
                    </div><!-- End .toolbox-item -->

                </aside><!-- End .toolbox-left -->

                <div class="toolbox-item ml-lg-auto">
                    <div class="toolbox-item toolbox-show show-count">
                         
                    </div><!-- End .toolbox-item -->

                    <div class="layout-modes">
                        <a href="./" class="layout-btn btn-grid" title="Grid">
                            <i class="icon-mode-grid"></i>
                        </a>
                        
                    </div><!-- End .layout-modes -->
                </div>
            </nav>
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
                            <div class="product-desc-content">
                                <div class="row row-sm"><?php 
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
                                                        <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $product_name; ?>" style="width: 150px; height: 150px;" />
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
                                                            <input type="hidden" name="sizes" value="<?php echo $ragzProduct['product_size'] ?>">
                                                            <input type="hidden" name="product_price" value="<?php echo $ragzProductDetails['product_price'] ?>">
                                                            <input type="hidden" name="product_number" value="<?php echo $product_number; ?>">
                                                            <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                                            
                                                            <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist">
                                                                <span>Wishlist</span>
                                                            </a>

                                                            <button type="submit" class="btn btn-primary" value="Add To Cart" data-toggle="<?php echo $ragzProductDetails['product_name']; ?>" data-original-title="Add to cart"> ADD TO CART</button>

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
                            <div class="product-tags-content">
                                <div class="row row-sm"><?php 
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
                                                        <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $product_name; ?>" style="width: 150px; height: 150px;" />
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
                                                            <input type="hidden" name="sizes" value="<?php echo $ragzProduct['product_size'] ?>">
                                                            <input type="hidden" name="product_price" value="<?php echo $ragzProductDetails['product_price'] ?>">
                                                            <input type="hidden" name="product_number" value="<?php echo $product_number; ?>">
                                                            <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                                            
                                                            <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist">
                                                                <span>Wishlist</span>
                                                            </a>

                                                            <button type="submit" class="btn btn-primary" value="Add To Cart" data-toggle="<?php echo $ragzProductDetails['product_name']; ?>" data-original-title="Add to cart"> ADD TO CART</button>

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
                            <div class="product-reviews-content">
                                
                                <div class="add-product-review">
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
                                                            <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $product_name; ?>" style="width: 150px; height: 150px;" />
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
                                                                <input type="hidden" name="sizes" value="<?php echo $ragzProduct['product_size'] ?>">
                                                                <input type="hidden" name="product_price" value="<?php echo $ragzProductDetails['product_price'] ?>">
                                                                <input type="hidden" name="product_number" value="<?php echo $product_number; ?>">
                                                                <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                                                
                                                                <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist">
                                                                <span>Wishlist</span>
                                                                </a>

                                                                <button type="submit" class="btn btn-primary" value="Add To Cart" data-toggle="<?php echo $ragzProductDetails['product_name']; ?>" data-original-title="Add to cart"> ADD TO CART</button>

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
                </div><!-- End .product-single-tabs -->
            </div>
            
            <div class="toolbox-item toolbox-show">
               <label>Showing <?php echo $itemsPerPage ?> of <?php echo $totalItems ?> results</label>
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
        </div><!-- End .container --><?php
    } ?>
     <div class="partners-container">
        <div class="container"><h2 class="subtitle text-center"><span>BRANDS</span></h2>
            <div class="partners-carousel owl-carousel owl-theme"><?php 
                $getting = $db->prepare("SELECT * FROM manufacturer ORDER BY manufacturer_name asc");
                $getting->execute();
                while($see = $getting->fetch()){ 
                    $brand_name = $see['manufacturer_name'];
                     ?>
                    <a href="brand-products.php?brand_name=<?php echo $brand_name ?>" class="partner">
                        <img src="<?php echo 'manufacturer-logo/'. $see['manufacturer_logo'] ?>" alt="<?php echo $merchant_name ?>" style="width: 100; height: 100px;">
                    </a><?php
                } ?>
               
            </div><!-- End .partners-carousel -->
        </div><!-- End .container -->
    </div><!-- End .partners-container -->

    <div class="mb-5"></div><!-- margin -->
    <h2 class="subtitle">
        <span>Featured Products</span>
    </h2>
    
    <div class="featured-products owl-carousel owl-theme owl-nav-top"><?php 
        foreach($listProduct as $featureProduct){ 
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
            <div class="product" style="" align="center">
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
                    </div><!-- End .product-container -->
                    <h2 class="product-title">
                        <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php 
                            $cut= $ragzProduct['product_name']; echo substr($cut, 0,10)  ?>    
                        </a>
                    </h2>
                    <div class="price-box">
                        <span class="old-price" style="color: red"><?php $num = (15/100)*$ragzProductDetails['product_price'];
                            $adding = $num + $ragzProductDetails['product_price'];
                             number_format($ragzProductDetails['product_price']); ?>    
                        </span>
                        <span class="product-price" style="color: green">&#8358;<?php echo number_format($adding) ?></span>
                    </div><!-- End .price-box -->

                    <form action="handlers/cart/addToCart.php" method="get">
                        <div class="product-action" align="center">
                            <input type="hidden" name="sizes" value="<?php echo $ragzProduct['product_size'] ?>">
                            <input type="hidden" name="product_price" value="<?php echo $ragzProductDetails['product_price'] ?>">
                            <input type="hidden" name="product_number" value="<?php echo $product_number; ?>">
                            <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                            <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist">
                                <span>Wishlist</span>
                            </a>

                            <button type="submit" class="btn btn-primary" value="Add To Cart" data-toggle="<?php echo $ragzProductDetails['product_name']; ?>" data-original-title="Add to cart"> ADD TO CART</button>

                            <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Compare' ?>" class="paction add-compare" title="Compare">
                                <span>Compare</span>
                            </a>
                        </div>
                    </form>
                </div><!-- End .product-details -->
            </div><!-- End .product --> <?php 
        } ?>
    </div><!-- End .featured-products -->
</div><!-- End .container -->

<div class="mb-5"></div><!-- margin -->
    <div class="partners-container">
        <div class="container"><h2 class="subtitle text-center"><span>OUR MERCHANTS</span></h2>
            <div class="partners-carousel owl-carousel owl-theme"><?php 
                $getting = $db->prepare("SELECT * FROM merchant ORDER BY merchant_id desc");
                $getting->execute();
                while($see = $getting->fetch()){ 
                    $merchant_number = $see['merchant_number'];
                    $trace = $productDetails->countMerchantProductPublish($merchant_number); ?>
                    <a href="merchants-products.php?merchant_name=<?php echo $see['merchant_name']; ?>" class="partner">
                        <img src="<?php echo 'assets/images/merchant/'. $see['merchant_logo'] ?>" alt="<?php echo $merchant_name ?>" style="width: 100; height: 100px;">
                    </a><?php
                } ?>
               
            </div><!-- End .partners-carousel -->
        </div><!-- End .container -->
    </div><!-- End .partners-container -->
    
    <div class="mb-5"></div><!-- margin -->

    <div class="container arrived-products">
        <h2 class="subtitle">
            <span>Just Arrived</span>
        </h2>

        <div class="row"><?php 
            foreach($listProduct as $seeProduct){ 
                $product_number = $seeProduct['product_number'];
                $ragzProduct = $productDetails->getProductsDet($product_number);
                $ragzProductDetails = $productDetails->getProductsDetails($product_number);
                $category_id = $ragzProduct['category_id'];
                $cateDetails = $productsCate->getCategoryDetailsId($category_id);
                $category_name = $cateDetails['category_name'];
                $manufacturer_id = $ragzProduct['manufacturer_id'];
                $manuDetails =$productDetails->getRagzManufacturerDetails($manufacturer_id);
                $manufacturer_name = $manuDetails['manufacturer_name']; ?> 
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="product product-overlay" align="center">
                        <figure class="product-image-container" >
                            <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $product_number; ?>" style="width: 150px; height: 150px;" />
                            </a>
                            <a href="product-quick-view.php?product_number=<?php echo $product_number ?>" class="btn-quickview">Quick View</a>
                            <form action="handlers/cart/addToCart.php" method="get">
                                <div class="product-action" align="center">
                                    <input type="hidden" name="sizes" value="<?php echo $ragzProduct['product_size'] ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $ragzProductDetails['product_price'] ?>">
                                    <input type="hidden" name="product_number" value="<?php echo $product_number; ?>">
                                    <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                    <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist">
                                        <span>Wishlist</span>
                                    </a>

                                    <button type="submit" class="btn btn-primary" value="Add To Cart" data-toggle="<?php echo $ragzProductDetails['product_name']; ?>" data-original-title="Add to cart"> ADD TO CART</button>

                                    <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Compare' ?>" class="paction add-compare" title="Compare">
                                        <span>Compare</span>
                                    </a>
                                </div>
                            </form>
                        </figure>
                        <div class="product-details">
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                </div><!-- End .product-ratings -->
                            </div><!-- End .product-container -->
                            <h2 class="product-title">
                                <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php 
                                    $cut= $ragzProduct['product_name'];
                                     echo substr($cut, 0,10)  ?>        
                                </a>
                            </h2>
                            <div class="price-box">
                                <span class="old-price">&#8358;<?php $num = (20/100)*$ragzProductDetails['product_price'];
                                    $adding = $num + $ragzProductDetails['product_price'];
                                    echo number_format($adding) ?>     
                                </span>
                                <span class="product-price">&#8358;<?php echo number_format($ragzProductDetails['product_price']); ?></span>
                            </div>
                        </div><!-- End .product-details -->
                    </div><!-- End .product -->
                </div><!-- End .col-xl-2 --><?php
            } ?>
               
        </div><!-- End .col-xl-2 -->
    </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-5"></div><!-- margin -->

    <div class="partners-container">
        <div class="container">
            <div class="partners-carousel owl-carousel owl-theme">
                <a href="#" class="partner">
                    <img src="assets/images/logos/1.png" alt="logo">
                </a>
                <a href="#" class="partner">
                    <img src="assets/images/logos/2.png" alt="logo">
                </a>
                <a href="#" class="partner">
                    <img src="assets/images/logos/3.png" alt="logo">
                </a>
                <a href="#" class="partner">
                    <img src="assets/images/logos/4.png" alt="logo">
                </a>
                <a href="#" class="partner">
                    <img src="assets/images/logos/5.png" alt="logo">
                </a>
                <a href="#" class="partner">
                    <img src="assets/images/logos/2.png" alt="logo">
                </a>
                <a href="#" class="partner">
                    <img src="assets/images/logos/1.png" alt="logo">
                </a>
            </div><!-- End .partners-carousel -->
        </div><!-- End .container -->
    </div><!-- End .partners-container -->
</main><!-- End .main -->

<?php require 'includes/footer.php'; ?>