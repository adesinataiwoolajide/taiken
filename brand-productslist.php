<?php
    require 'includes/header.php';
    $brand_name = $_GET['brand_name'];
    $cateDetails = $productDetails->getRagzManufacturerNameDetails($brand_name);
    $manufacturer_id = $cateDetails['manufacturer_id'];
    $totalItems =  count($productDetails->getAllProductsManuList($manufacturer_id));
    $itemsPerPage = 10;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);
    $seeProdcut = $productDetails->getCategoryProductsManu($manufacturer_id, $start, $itemsPerPage);
?>
<main class="main">
    <div class="container">
        <div class="row">      
            <div class="col-lg-9">
                <div class="banner banner-cat" style="background-image: url('assets/images/banners/newwatch.jpg');">
                    <div class="banner-content container">
                        <h2 class="banner-subtitle">CHECK OVER <span><?php echo $totalItems *20 ?>+</span></h2>
                        <h1 class="banner-title">
                            <?php echo $brand_name ?> 
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
                                $prod = $db->prepare("SELECT * FROM products ORDER BY product_price desc LIMIT 0,3");
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
                <li class="breadcrumb-item"><a href="./"> <i class="icon-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="brand-productslist.php?brand_name=<?php echo $brand_name ?>"><i class="icon-mode-list"></i>List <?php echo $brand_name ?></a></li>
                <li class="breadcrumb-item" class="active"><a href="brand-products.php?brand_name=<?php echo $brand_name ?>"><i class="icon-mode-grid"></i><?php echo $brand_name ?></a></li>
                
        <li class="breadcrumb-item active" aria-current="page">Products Categories List</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <?php
    if($productDetails->getCategoryCHeckProductsManu($manufacturer_id)){ ?>
        <div class="col-md-12">
            <p style="color: red" align="center"><?php echo "No Product is Available For $brand_name At The Moment, Please Try Again Later" ?></p>
        </div><?php
    }else{ ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <nav class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-item toolbox-sort">
                                <div class="select-custom">
                                    <select name="orderby" class="form-control">
                                        <option value="menu_order" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div><!-- End .select-custom -->

                                <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending Direction</span></a>
                            </div><!-- End .toolbox-item -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-item toolbox-show">
                            <label>Showing 1–9 of 60 results</label>
                        </div><!-- End .toolbox-item -->
                        <div class="layout-modes">
                            <a href="brand-productslist.php?brand_name=<?php echo $brand_name ?>" class="layout-btn btn-list active" title="List">
                                <i class="icon-mode-list"></i>
                            </a>
                            <a href="brand-products.php?brand_name=<?php echo $brand_name ?>" class="layout-btn btn-grid" title="Grid">
                                <i class="icon-mode-grid"></i>
                            </a> 
                        </div>
                    </nav>
                    <?php 
                   
                    foreach($seeProdcut as $listProduct){ 
                        $product_number = $listProduct['product_number'];
                        $deta = $productDetails->getTrippleProductsDet($product_number);
                        $ragzProduct = $productDetails->getProductsDet($product_number);
                        $ragzProductDetails = $productDetails->getProductsDetails($product_number);
                        $gettingManu = $db->prepare("SELECT * FROM manufacturer WHERE manufacturer_id=:manufacturer_id");
                        $arr = array(':manufacturer_id'=>$manufacturer_id);
                        $gettingManu->execute($arr);
                        ?>
                        <div class="product product-list">
                            <figure class="product-image-container">
                                <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                    <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $deta['product_name'] ?>" style="width: ; height: 200px;">
                                </a>
                                <a href="product-quick-view.php?product_number=<?php echo $product_number ?>" class="btn-quickview">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <h2 class="product-title">
                                    <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $deta['product_name']; ?></a>
                                </h2>
                                <div class="ratings-container" style="color: red">
                                    <?php 
                                    while($see_manu = $gettingManu->fetch()){
                                        echo $see_manu['manufacturer_name']; 
                                    } ?>
                                </div><!-- End .product-container -->
                                <div class="product-desc">
                                    <p><?php echo $ragzProductDetails['product_description'] ?><a href="product-details.php?product_number=<?php echo $product_number ?>">Learn More</a></p>
                                </div><!-- End .product-desc -->
                                <span class="old-price" style="color: red"><?php $num = (15/100)*$ragzProductDetails['product_price'];
                                    $adding = $num + $ragzProductDetails['product_price'];
                                    number_format($ragzProductDetails['product_price']); ?>    
                                </span>
                                <span class="product-price" style="color: green">&#8358;<?php echo number_format($adding) ?></span>

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
                        </div><!-- End .product --><?php 
                    } ?>
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
                                        <a href="brand-productslist.php?brand_name=<?php echo $brand_name ?>&&page=<?php echo $page + 1;?>" class="btn btn-primary">NEXT PAGE <i class="icon-angle-right"></i>
                                        </a>
                                    </div><?php
                                }  ?>
                            </div>
                            <div class="col-md-6" style="margin-left: 750px;"><?php
                                if($page != 1){ ?>
                                    <div style="margin-top: -30px">
                                       <a href="brand-productslist.php?brand_name=<?php echo $brand_name ?>&&page=<?php echo $page - 1;?>" class="btn btn-success">
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
            </div><!-- End .col-lg-9 -->
            <?php require 'includes/aside.php'; ?>
            </div><!-- End .row -->
        </div><!-- End .container --><?php 
    } ?>

    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->
<?php require 'includes/footer.php'; ?>