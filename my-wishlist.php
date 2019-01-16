<?php
    require 'includes/header.php';
    $reg_number = $_SESSION['reg_number'];
    $totalItems =  count($register->gettingWishList($reg_number));
    $seeProdcut = $register->gettingWishList($reg_number);
?>
<main class="main">
     <div class="banner banner-cat" style="background-image: url('assets/images/banners/banner-top-2.jpg');">
        <div class="banner-content container">
            <h2 class="banner-subtitle">CHECK OVER <span><?php echo $totalItems ?>+</span></h2>
            <h1 class="banner-title">
                INCREDIBLE 
            </h1>
            <a href="" class="btn btn-primary">Shop Now</a>
        </div><!-- End .banner-content -->
    </div><!-- End .banner -->
    
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./"> <i class="icon-home"></i> Home</a></li>
                <li class="breadcrumb-item" class="active"><a href="my-wishlist.php"><i class="icon-mode-grid"></i>My Wish List</a></li>
                
        <li class="breadcrumb-item active" aria-current="page">My Wish List Products</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <?php
    if($register->checkWishList($reg_number)){ ?>
        <div class="col-md-12">
            <p style="color: red" align="center"><?php echo $_SESSION['name']." Your Wishlist is Empty" ?></p>
        </div><?php
    }else{ ?>
        <div class="container products-body">
            <nav class="toolbox horizontal-filter filter-sorts">
                <div class="filter-toggle">
                    <span>Filters:</span>
                    <a href=#>&nbsp;</a>
                </div>

                <div class="sidebar-overlay"></div>
               

                <div class="toolbox-item ml-lg-auto">
                    <div class="toolbox-item toolbox-show show-count">
                         <label>Showing <?php echo $totalItems ?> results</label>
                    </div><!-- End .toolbox-item -->

                    <div class="layout-modes">
                         <a href="my-wishlist.php" class="layout-btn btn-grid" title="Grid">
                            <i class="icon-mode-grid"></i>
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
            <hr />
        </div>
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
        </div><!-- End .container --><?php 
    } ?>
    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->
<?php require 'includes/footer.php'; ?>