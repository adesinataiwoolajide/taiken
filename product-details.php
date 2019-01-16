<?php
    require 'includes/header.php';
    $product_number = $_GET['product_number']; 
    $ragzProduct = $productDetails->getProductsDet($product_number);
    $ragzProductDetails = $productDetails->getProductsDetails($product_number);
    $category_id = $ragzProduct['category_id'];
    $cateDetails = $productsCate->getCategoryDetailsId($category_id);
    $category_name = $cateDetails['category_name'];
    $manufacturer_id = $ragzProduct['manufacturer_id'];
    $manuDetails = $productDetails->getRagzManufacturerDetails($manufacturer_id);
    $manufacturer_name = $manuDetails['manufacturer_name']; 
    $totalItems =  count($productDetails->getAllProductsCategoryList($category_id));
    $itemsPerPage = 30;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);
    $seeProdcut = $productDetails->getCategoryProductsDeta($category_id, $start, $itemsPerPage);
?>

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $_SERVER['REQUEST_URI'] ?>">Product Details</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $ragzProduct['product_name'] ?></li>
                    </ol>
                </div><!-- End .container -->
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-single-container product-single-default">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 product-single-gallery">
                                    <div class="product-slider-container product-item">
                                        <div class="product-single-carousel owl-carousel owl-theme" align="center">
                                            <div class="product-item">
                                                <img class="product-details.php?product_number=<?php echo $product_number ?>" src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" data-zoom-image="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" style="width:350px; height: 300px;"/>
                                            </div>
                                            <div class="product-item">
                                                <img class="product-details.php?product_number=<?php echo $product_number ?>" src="<?php echo "assets/images/products-images/thumbnail/".$ragzProductDetails['product_thumbnail'] ?>" data-zoom-image="<?php echo "assets/images/products-images/thumbnail/".$ragzProductDetails['product_thumbnail'] ?>" style="width:350px; height: 300px;"/>
                                            </div>
                                            <div class="product-item">
                                                <img class="product-details.php?product_number=<?php echo $product_number ?>" src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" data-zoom-image="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" style="width:350px; height: 300px;"/>
                                            </div>
                                            <div class="product-item">
                                                <img class="product-details.php?product_number=<?php echo $product_number ?>" src="<?php echo "assets/images/products-images/thumbnail/".$ragzProductDetails['product_thumbnail'] ?>" data-zoom-image="<?php echo "assets/images/products-images/thumbnail/".$ragzProductDetails['product_thumbnail'] ?>" style="width:350px; height: 300px;"/>
                                            </div>
                                        </div>
                                        <!-- End .product-single-carousel -->
                                        <span class="prod-full-screen">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </div>
                                    <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                        <div class="col-3 owl-dot">
                                            <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>"/>
                                        </div>
                                        <div class="col-3 owl-dot">
                                            <img src="<?php echo "assets/images/products-images/thumbnail/".$ragzProductDetails['product_thumbnail'] ?>"/>
                                        </div>
                                        <div class="col-3 owl-dot">
                                            <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>"/>
                                        </div>
                                        <div class="col-3 owl-dot">
                                            <img src="<?php echo "assets/images/products-images/thumbnail/".$ragzProductDetails['product_thumbnail'] ?>"/>
                                        </div>
                                    </div>
                                    
                                </div><!-- End .col-lg-7 -->
                               
                                <div class="col-lg-5 col-md-6">
                                    <div class="product-single-details">
                                        <ul class="checkout-steps" >
                                            <li>
                                                
                                                <div class="shipping-step-addresses">
                                                    <div class="shipping-step-addresses" style="width: 900px">
                                                        <strong>
                                                            
                                                            <div class="shipping-address-box active">
                                                                <form action="handlers/cart/addToCart.php" method="get">
                                                                    <h3><?php echo $ragzProduct['product_name'] ?></h3>
                                                                    <address>
                                                                       Price <?php 
                                                                       $num = (5/100)*$ragzProductDetails['product_price'] + $ragzProductDetails['product_price'];
                                                                            $num2= (20/100)*$ragzProductDetails['product_price'];
                                                                            $adding = $num2 + $ragzProductDetails['product_price'];
                                                                            number_format($ragzProductDetails['product_price']); ?> 
                                                                            
                                                                        <span class="old-price" style="color: red"> &#8358;<?php echo number_format($adding) ?></span>
                                                                        <span class="product-price" style="color: green">&#8358;<?php echo number_format($num) ?>
                                                                        </span>
                                                                        <br>
                                                                        <p>Quantity: <?php echo $qty = $ragzProductDetails['quantity'] ?></p><?php 
                                                                        if($qty ==0){ ?>
                                                                            <p style="color: red"> Out of Stock </p><?php
                                                                        }else{
                                                                            $sizeArray = explode(",", $ragzProductDetails['product_size']);
                                                                            if(count($sizeArray)){ ?>
                                                                             
                                                                                <div class="product-single-filter">
                                                                                    <h6>Sizes</h6>
                                                                                    <ul class="config-size-list"><?php 
                                                                                        foreach($sizeArray as $size){ 
                                                                                            if(($size == "Null") OR ($size == "") OR ($size == "NULL")){ ?>
                                                                                               <li class="active"><a href=""><?php echo "NULL" ?></a></li><?php
                                                                                            }else{ ?>
                                                                                                <li class="active"><a href=""><?php echo substr($size, 0,4); ?></a></li><?php 
                                                                                            }
                                                                                        } ?>
                                                                                    </ul>
                                                                                </div><!-- End .product-single-filter --><?php
                                                                            } ?>
                                                                        
                                                                            <div class="product-action" align="center">
                                                                                <input type="hidden" name="sizes" value="<?php echo $ragzProduct['product_size'] ?>">
                                                                                <input type="hidden" name="product_price" value="<?php echo $ragzProductDetails['product_price'] ?>">
                                                                                <input type="hidden" name="product_number" value="<?php echo $product_number; ?>">
                                                                                <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                                                                <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist">
                                                                                    <span>Wishlist</span>
                                                                                </a>

                                                                                <button type="submit" class="btn btn-danger" value="Add To Cart" data-toggle="<?php echo $ragzProductDetails['product_name']; ?>" data-original-title="Add to cart"> ADD TO CART</button>

                                                                                <a href="handlers/registration/addit.php?product_number=<?php echo $product_number?>&&action=<?php echo 'Compare' ?>" class="paction add-compare" title="Compare">
                                                                                    <span>Compare</span>
                                                                                </a>
                                                                            </div> <?php
                                                                        } ?>
                                                                        
                                                                        
                                                                    </form>
                                                                </address>
                                                            </div><!-- End .shipping-address-box -->
                                                        </strong>
                                                    </div>
                                                </div><!-- End .shipping-step-addresses -->
                                                        
                                            </li>
                                        </ul>
                                        
                                    </div><!-- End .product-single-details -->
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-single-container -->

                        <div class="product-single-tabs" style="margin-top:">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                    <div class="product-desc-content">
                                        <p><?php echo $ragzProductDetails['product_description'] ?></p>
                                        <ul>
                                            <li><i class="icon-ok"></i>Available Quantity : <?php echo $ragzProductDetails['quantity'] ?>
                                            </li>
                                            <li><i class="icon-ok"></i>Manufacturer: <?php echo $manufacturer_name ?>
                                            </li>
                                            <li><i class="icon-ok"></i>Available Quantity : <?php echo $ragzProductDetails['quantity'] ?>
                                            </li>
                                        </ul>
                                        
                                    </div><!-- End .product-desc-content -->
                                </div><!-- End .tab-pane -->

                                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                                    <div class="product-tags-content">
                                        <form action="#">
                                            <h4>Add Your Tags:</h4>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-sm" required>
                                                <input type="submit" class="btn btn-primary" value="Add Tags">
                                            </div><!-- End .form-group -->
                                        </form>
                                        <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                    </div><!-- End .product-tags-content -->
                                </div><!-- End .tab-pane -->

                                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                                    <div class="product-reviews-content">
                                        <div class="collateral-box">
                                            <ul>
                                                <li>Be the first to review this product</li>
                                            </ul>
                                        </div><!-- End .collateral-box -->

                                        <div class="add-product-review">
                                            <h3 class="text-uppercase heading-text-color font-weight-semibold">WRITE YOUR OWN REVIEW</h3>
                                            <p>How do you rate this product? *</p>

                                            
                                            </form>
                                        </div><!-- End .add-product-review -->
                                    </div><!-- End .product-reviews-content -->
                                </div><!-- End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .product-single-tabs -->
                    </div><!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
                    <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
                        <?php 
                        $merchant_number = $ragzProductDetails['merchant_number'];
                        $merchantProduct = $productDetails->getProductsUnPublishedProducts($merchant_number);
                        $details = $merchantDetails->gettingMerchantDelatils($merchant_number);
                        $dessendingProd = $productDetails->getDescProducts($merchant_number);
                        $assendingProd = $productDetails->getAscProducts($merchant_number);
                        $merchant_name = $details['merchant_name'];
                        $merchant_email = $details['merchant_email'];
                         ?>
                        <div class="sidebar-wrapper">
                           <div class="widget widget-banner">
                                <div class="">
                                    <a href="#">
                                        <img src="<?php echo 'assets/images/merchant/'. $details['merchant_logo'] ?>" alt="<?php echo $merchant_name ?>" style="width: 200; height: 200px;">
                                    </a>
                                </div><!-- End .banner -->
                            </div><!-- End .widget -->

                            <div class="widget widget-featured">
                                <h3 class="widget-title"><?php echo $merchant_name ?></h3>
                                
                                <div class="widget-body">
                                    <div class="owl-carousel widget-featured-products">
                                        <div class="featured-col"  align="center"><?php 
                                            foreach($dessendingProd as $seeDes){
                                                $product_number = $seeDes['product_number'];
                                                $nowDet =$productDetails->getProductsDet($product_number); ?>
                                                <div class="product product-sm">
                                                    <figure class="product-image-container">
                                                        <a href="product.details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                                            <img src="<?php echo "assets/images/products-images/large-image/".$nowDet['product_image'] ?>" style="width: 50px; height: 50px"/>
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h2 class="product-title">
                                                            <a href="product.details.php?product_number=<?php echo $product_number ?>"><?php echo $nowDet['product_name'] ?></a>
                                                        </h2>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                         <span class="old-price">&#8358;<?php $num =(20/100)*$seeDes['product_price'];
                                                            $adding = $num + $seeDes['product_price'];
                                                            echo number_format($adding) ?>     
                                                        </span>
                                                        <span class="product-price">&#8358;<?php echo number_format($seeDes['product_price']); ?></span>
                                                    </div><!-- End .product-details -->
                                                </div><!-- End .product --><?php                  
                                            } ?>
                                        </div><!-- End .featured-col -->
                                        <div class="featured-col"  align="center"><?php 
                                            foreach($assendingProd as $seeDes){
                                                $product_number = $seeDes['product_number'];
                                                $nowDet =$productDetails->getProductsDet($product_number); ?>
                                                <div class="product product-sm">
                                                    <figure class="product-image-container">
                                                        <a href="product.details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                                            <img src="<?php echo "assets/images/products-images/large-image/".$nowDet['product_image'] ?>" style="width: 50px; height: 50px"/>
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h2 class="product-title">
                                                            <a href="product.details.php?product_number=<?php echo $product_number ?>"><?php echo $nowDet['product_name'] ?></a>
                                                        </h2>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <span class="old-price">&#8358;<?php $num =(20/100)*$seeDes['product_price'];
                                                            $adding = $num + $seeDes['product_price'];
                                                            echo number_format($adding) ?>     
                                                        </span>
                                                        <span class="product-price">&#8358;<?php echo number_format($seeDes['product_price']); ?></span>
                                                    </div><!-- End .product-details -->
                                                </div><!-- End .product --><?php                  
                                            } ?>
                                        </div><!-- End .featured-col -->
                                    </div><!-- End .widget-featured-slider -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .widget -->

                            <div class="widget widget-info">
                                <ul>
                                    <li>
                                        <i class="icon-shipping"></i>
                                        <h4>FREE<br>SHIPPING </h4>
                                    </li>
                                    <li>
                                        <i class="icon-us-dollar"></i>
                                        <h4>100% MONEY<br>BACK GUARANTEE</h4>
                                    </li>
                                    <li>
                                        <i class="icon-online-support"></i>
                                        <h4>ONLINE<br>SUPPORT 24/7</h4>
                                    </li>
                                </ul>
                            </div><!-- End .widget -->
                        </div>
                    </aside><!-- End .col-md-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
            <div class="container products-body">
                <nav class="toolbox horizontal-filter filter-sorts">
                    <?php echo $category_name ?>
                    <div class="toolbox-item ml-lg-auto">
                <div class="toolbox-item toolbox-show show-count">
                    <label>Showing <?php echo $totalItems ?> of <?php echo $itemsPerPage ?> results</label>
                </div><!-- End .toolbox-item -->

                <div class="layout-modes">
                    <a href="see-product-by-category.php?category_name=<?php echo $category_name ?>" class="layout-btn btn-grid active" title="Grid">
                        <i class="icon-mode-grid"></i>
                    </a>
                    <a href="see-product-by-category.php?category_name=<?php echo $category_name ?>" class="layout-btn btn-list" title="List">
                        <i class="icon-mode-list"></i>
                    </a>
                </div><!-- End .layout-modes -->
            </div>
        </nav>
        <div class="product-wrapper">
            <div class="row row-sm category-grid"><?php 
                foreach($seeProdcut as $featureProduct){ 
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
                        <div class="grid-product">
                            <figure class="product-image-container">
                                
                                <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                    <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $ragzProduct['product_name']; ?>" style="width: 150px; height: 150px;" />
                                </a>
                                <a href="product-quick-view.php?product_number=<?php echo $product_number ?>" class="btn-quickview">Quick View</a>
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
                                        $num = (15/100)*$ragzProductDetails['product_price'];
                                        $num2=(40/100)*$ragzProductDetails['product_price'] + $ragzProductDetails['product_price'];
                                        $adding = $num + $ragzProductDetails['product_price'];
                                         number_format($ragzProductDetails['product_price']); ?> 
                                         &#8358;<?php echo number_format($num2) ?>   
                                    </span>
                                    <span class="product-price" style="color: green">&#8358;<?php echo number_format($adding) ?></span>
                                </div><!-- End .price-box -->
                                <form action="handlers/cart/addToCart.php" method="get">
                                    <div class="product-grid-action">
                                        <input type="hidden" name="sizes" value="<?php echo $ragzProductDetails['product_size']; ?>">
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
        <div class="container">
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
    </div><!-- End .featured-section -->

</main><!-- End .main -->
        <?php require 'includes/footer.php'; ?>