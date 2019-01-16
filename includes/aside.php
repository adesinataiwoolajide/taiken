    <aside class="sidebar-shop col-lg-3 order-lg-first">
        <div class="sidebar-wrapper">
            <div class="widget widget-featured">
                <h3 class="widget-title">New Arrivals</h3>
                
                <div class="widget-body">
                    <div class="owl-carousel widget-featured-products"><?php 
                        $prod = $db->prepare("SELECT * FROM products ORDER BY product_id DESC LIMIT 0,3");
                        $prod->execute(); ?>
                        <div class="featured-col"><?php 
                            while($seeAside = $prod->fetch()){
                                $product_number = $seeAside['product_number'];
                                $ragzProduct = $productDetails->getProductsDet($product_number);
                                $ragzProductDetails = $productDetails->getProductsDetails($product_number); ?>
                                <div class="product product-sm">
                                    <figure class="product-image-container">
                                        <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                            <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $ragzProduct['product_name']; ?>" style="width: 100px; height: 90px;" alt="<?php echo $ragzProduct['product_name']; ?>">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $ragzProduct['product_name']; ?></a>
                                        </h2>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price"><?php $num = (15/100)*$ragzProductDetails['product_price'];
                                                $adding = $num + $ragzProductDetails['product_price'];
                                                number_format($ragzProductDetails['product_price']);
                                                $num2=(40/100)*$ragzProductDetails['product_price'] + $ragzProductDetails['product_price'];
                                                $adding = $num + $ragzProductDetails['product_price'];
                                                number_format($ragzProductDetails['product_price']); ?> 
                                                <span class="old-price">&#8358;<?php echo number_format($num2) ?></span>
                                                <span class="product-price">&#8358;<?php echo number_format($adding) ?></span>
                                            </span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .product --><?php 
                            }?> 

                        </div><!-- End .featured-col -->

                        <div class="featured-col"><?php 
                        $prod = $db->prepare("SELECT * FROM products ORDER BY product_price asc LIMIT 0,3");
                        $prod->execute(); ?>
                        <div class="featured-col"><?php 
                            while($seeAside = $prod->fetch()){
                                $product_number = $seeAside['product_number'];
                                $ragzProduct = $productDetails->getProductsDet($product_number);
                                $ragzProductDetails = $productDetails->getProductsDetails($product_number); ?>
                                <div class="product product-sm">
                                    <figure class="product-image-container">
                                        <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                            <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $ragzProduct['product_name']; ?>" style="width: 100px; height: 90px;" alt="<?php echo $ragzProduct['product_name']; ?>">
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $ragzProduct['product_name']; ?></a>
                                        </h2>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price"><?php $num = (15/100)*$ragzProductDetails['product_price'];
                                                $adding = $num + $ragzProductDetails['product_price'];
                                                number_format($ragzProductDetails['product_price']);
                                                $num2=(40/100)*$ragzProductDetails['product_price'] + $ragzProductDetails['product_price'];
                                                $adding = $num + $ragzProductDetails['product_price'];
                                                number_format($ragzProductDetails['product_price']); ?> 
                                                <span class="old-price">&#8358;<?php echo number_format($num2) ?></span>
                                                <span class="product-price">&#8358;<?php echo number_format($adding) ?></span>
                                            </span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .product --><?php 
                            }?> 

                        </div><!-- End .featured-col -->
                    </div><!-- End .widget-featured-slider -->
                </div><!-- End .widget-body -->
            </div><!-- End .widget -->
            <div class="widget">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-body-6" role="button" aria-expanded="true" aria-controls="widget-body-6">Product Brands</a>
                </h3>

                <div class="collapse show" id="widget-body-6">
                    <div class="widget-body">
                        <ul class="cat-list"><?php
                            $cate = $db->prepare("SELECT * FROM manufacturer ORDER BY manufacturer_name ASC");
                            $cate->execute();
                            while($see_cate = $cate->fetch()){?><li>
                                <a href="brand-products.php?brand_name=<?php echo $see_cate['manufacturer_name'] ?>"><?php 
                                    echo $see_cate['manufacturer_name'] ?> 
                                </a></li><?php
                            } ?>
                        </ul>
                    </div><!-- End .widget-body -->
                </div><!-- End .collapse -->
            </div><!-- End .widget -->

            <div class="widget">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Product Category</a>
                </h3>
                <div class="collapse show" id="widget-body-2">
                    <div class="widget-body">
                        <ul class="cat-list"><?php
                            $cate = $db->prepare("SELECT * FROM products_category ORDER BY category_id DESC LIMIT 0,15 ");
                            $cate->execute();
                            while($see_cate = $cate->fetch()){?><li>
                                <li><a href="see-product-by-category.php?category_name=<?php echo $see_cate['category_name'] ?> "><?php echo $see_cate['category_name'] ?> 
                                </a> </li><?php
                            } ?>
                        </ul>
                    </div><!-- End .widget-body -->
                </div><!-- End .collapse -->
            </div><!-- End .widget -->
            <div class="widget">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Product Types</a>
                </h3>

                <div class="collapse show" id="widget-body-3">
                    <div class="widget-body">
                        <ul class="cat-list"><?php
                            $cate = $db->prepare("SELECT * FROM product_type ORDER BY type_name desc  LIMIT 0,15");
                            $cate->execute();
                            while($see_cate = $cate->fetch()){?><li>
                                <li><a href=""><?php echo $see_cate['type_name'] ?> 
                                </a> </li><?php
                            } ?>
                        </ul>
                    </div><!-- End .widget-body -->
                </div><!-- End .collapse -->
            </div><!-- End .widget -->

            <div class="widget">
                <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true" aria-controls="widget-body-5">Product Merchant</a>
                </h3>

                <div class="collapse show" id="widget-body-5">
                    <div class="widget-body">
                        <ul class="cat-list"><?php
                            $cate = $db->prepare("SELECT * FROM merchant ORDER BY merchant_id desc  LIMIT 0,15");
                            $cate->execute(); 
                            while($see_cate = $cate->fetch()){?><li>
                                <a href="merchants-products.php?merchant_name=<?php echo $see_cate['merchant_name'] ?>"><?php 
                                    echo $see_cate['merchant_name'] ?> 
                                </a></li><?php
                            } ?>
                        </ul>
                    </div><!-- End .widget-body -->
                </div><!-- End .collapse -->
            </div><!-- End .widget -->

        </div><!-- End .sidebar-wrapper -->
    </aside><!-- End .col-lg-3 -->