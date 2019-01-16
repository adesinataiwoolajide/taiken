<?php
    require 'includes/header.php'; 
?>
    <main class="main">
         <div class="container">
            <div class="row">      
                <div class="col-lg-9">
                    <div class="banner banner-cat" style="background-image: url('assets/images/banners/newwatch.jpg');">
                        <div class="banner-content container">
                            <h2 class="banner-subtitle">CHECK OVER <span>1000+</span></h2>
                            <h1 class="banner-title">
                                INCREDIBLE 
                            </h1>
                            <a href="brand-products.php?brand_name=<?php echo $brand_name ?>" class="btn btn-primary">Shop Now</a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div>
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
                    </div>
                </div>
            </aside>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./"><i class="icon-home"></i> Home</a></li>
                    <li class="breadcrumb-item" class="active"><a href=""><i class="icon-mode-grid"></i>Product By Price
                    <li class="breadcrumb-item active" aria-current="page">Sort Products By Price</li>
                </ol>
            </div><!-- End .container -->
        </nav><?php
        if($_POST){
            $product_price = $_POST['product_price'];

            // if($productDetails->getCategoryCHeckPriceProductsManu($product_price)){
            //     $useThis = $productDetails->getAllProductsPriceManu($product_price, $start, $itemsPerPage);
            //     $_POST['return'];
            //     $_SESSION['error'] = "No Products is Found with The Selected Price";
            //     $all_purpose->redirect($return);
            // }else{

            $totalItems =  count($productDetails->getAllProductsListPrice($product_price));
            $itemsPerPage = 30;
            $page = isset($_GET['page']) ? ($_GET['page']) : 1;
            $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
            $totalPages = ceil($totalItems / $itemsPerPage); 
            $useHere = $productDetails->getAllProductsListPrice($product_price, $start, $itemsPerPage);
            if($totalItems > 0){ ?>
                <div class="container products-body">
                    <nav class="toolbox horizontal-filter filter-sorts">
                        <div class="filter-toggle">
                            <span>Filters:</span>
                            <a href=#>&nbsp;</a>
                        </div>

                        <div class="sidebar-overlay"></div>
                        <aside class="toolbox-left sidebar-shop mobile-sidebar">
                            
                            <div class="toolbox-item toolbox-sort price-sort select-custom">
                                <a class="sort-menu-trigger" href="#">Price</a>
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
                                 <label>Showing <?php echo $totalItems ?> of <?php echo $itemsPerPage ?> results</label>
                            </div><!-- End .toolbox-item -->

                            <div class="layout-modes">
                                 <a href="brand-productslist.php?brand_name=<?php echo $brand_name ?>" class="layout-btn btn-grid" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                </a>
                                <a href="brand-productslist.php?brand_name=<?php echo $brand_name ?>" class="layout-btn btn-list active" title="List">
                                    <i class="icon-mode-list"></i>
                                </a>
                            </div><!-- End .layout-modes -->
                        </div>
                    </nav>

                    <div class="product-wrapper">
                        <div class="row row-sm category-grid"><?php 
                            foreach($useHere as $listProduct){ 
                                $product_number = $listProduct['product_number'];
                                $ragzProduct = $productDetails->getProductsDet($product_number);
                                $ragzProductDetails = $productDetails->getProductsDetails($product_number);
                                $deta = $productDetails->getTrippleProductsDet($product_number);
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
                                            <div class="ratings-container">
                                                <?php 
                                                while($see_manu = $gettingManu->fetch()){ 
                                                    echo $see_manu['manufacturer_name']; 
                                                } ?>
                                            </div>
                                            <h2 class="product-title">
                                                <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $deta['product_name']; ?></a>
                                            </h2>
                                             <div class="price-box">
                                                <span class="old-price">&#8358;<?php 
                                                $num = (5/100)*$ragzProductDetails['product_price'] + $ragzProductDetails['product_price'];
                                                $num2= (20/100)*$ragzProductDetails['product_price'];
                                                $adding = $num2 + $ragzProductDetails['product_price'];
                                                $comp = (1- $adding /$num) * 100;
                                                $round = round($comp); ?>
                                                <span class="product-label label-sale"> <?php echo $round ?></span>
                                            </div><!-- End .price-box -->
                                            <form action="handlers/cart/addToCart.php" method="get">
                                                <div class="product-action" align="center">
                                                    <input type="hidden" name="sizes" value="<?php echo $ragzProductDetails['product_size'] ?>">
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
                                            
                                        </div><!-- End .product-details -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-xl-3 --><?php 
                            } ?>

                        </div><!-- End .row -->
                    </div>
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
                </div><!-- End .container --><?php

           }else{ ?>

                <p style="color: red" align="center">No Products is Found with The Selected Price</p><?php
                $_SESSION['error'] = "No Products is Found with The Selected Price";
           }
        }else{
            $return = $_POST['return'];
            $_SESSION['error'] = "Please Select Your Price Below";
            $all_purpose->redirect($return);
        }?>
    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->
<?php require 'includes/footer.php'; ?>