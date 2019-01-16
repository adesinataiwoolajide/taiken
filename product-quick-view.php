<?php
    include_once("connection/connection.php");
    require 'libs_dev/products/products_class.php';
    $productsCate = new ragzNationProductsCategory($db);
    $productDetails = new ragzNationProducts($db);
    $product_number = $_GET['product_number'];
    $ragzProduct = $productDetails->getProductsDet($product_number);
    $ragzProductDetails = $productDetails->getProductsDetails($product_number);
    $category_id = $ragzProduct['category_id'];
    $cateDetails = $productsCate->getCategoryDetailsId($category_id);
    $category_name = $cateDetails['category_name'];
    $manufacturer_id = $ragzProduct['manufacturer_id'];
    $manuDetails = $productDetails->getRagzManufacturerDetails($manufacturer_id);
    $manufacturer_name = $manuDetails['manufacturer_name']; 
?>
<div class="product-single-container product-single-default product-quick-view container">
    <div class="row">
        <div class="col-lg-6 col-md-6 product-single-gallery">
            <div class="product-slider-container product-item">
                <div class="product-single-carousel owl-carousel owl-theme" align="center">
                    <div class="product-item">
                        <img class="product-details.php?product_number=<?php echo $product_number ?>" src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" data-zoom-image="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" style="width:300px; height: 250px;"/>
                    </div>
                    <div class="product-item">
                        <img class="product-details.php?product_number=<?php echo $product_number ?>" src="<?php echo "assets/images/products-images/thumbnail/".$ragzProductDetails['product_thumbnail'] ?>" data-zoom-image="<?php echo "assets/images/products-images/thumbnail/".$ragzProductDetails['product_thumbnail'] ?>" style="width:300px; height: 250px;"/>
                    </div>
                    <div class="product-item">
                        <img class="product-details.php?product_number=<?php echo $product_number ?>" src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" data-zoom-image="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" style="width:300px; height: 250px;"/>
                    </div>
                    <div class="product-item">
                        <img class="product-details.php?product_number=<?php echo $product_number ?>" src="<?php echo "assets/images/products-images/thumbnail/".$ragzProductDetails['product_thumbnail'] ?>" data-zoom-image="<?php echo "assets/images/products-images/thumbnail/".$ragzProductDetails['product_thumbnail'] ?>" style="width:300px; height: 250px;"/>
                    </div>
                </div>
                <!-- End .product-single-carousel -->
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

        <div class="col-lg-6 col-md-6">
            <div class="product-single-details">
                <h1 class="product-title"><?php echo $ragzProduct['product_name'] ?></h1>

                <div class="ratings-container">
                    <div class="product-sale">
                        <span class="product-label label-sale">-20%</span>
                    </div><!-- End .product-ratings -->

                    
                </div><!-- End .product-container -->

                <div class="price-box">
                    <span class="old-price">&#8358;<?php $num = (30/100)*$ragzProductDetails['product_price'];
                    $adding = $num + $ragzProductDetails['product_price'];
                    echo number_format($adding) ?></span>
                    <span class="product-price">&#8358;<?php echo number_format($ragzProductDetails['product_price']);?></span>
                </div><!-- End .price-box -->

                <div class="product-desc">
                    <p><?php echo $ragzProductDetails['product_description'] ?></p>
                </div><!-- End .product-desc -->
                <div class="product-filters-container">
                    <div class="product-single-filter" style="margin-top: ">
                        <p>Category: <?php echo $category_name ?></p><br>  
                    </div><!-- End .product-single-filter -->
                    
                    <div class="product-single-filter">
                        <p>Available Quantity : <?php echo $ragzProductDetails['quantity'] ?></p>
                        <p>Available Size : <?php echo $ragzProductDetails['product_size'] ?></p>
                    </div><!-- End .product-single-filter -->
                    
                </div><!-- End .product-filters-container -->
                    
                <form action="handlers/cart/addToCart.php" method="get">
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
                    </div>
                </form>
            </div><!-- End .product-single-details -->
        </div><!-- End .col-lg-5 -->
    </div><!-- End .row -->
</div><!-- End .product-single-container -->