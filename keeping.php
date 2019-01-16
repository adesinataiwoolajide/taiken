<?php
    require 'includes/header.php';
    $category_name = $_GET['category_name'];
    $cateDetails = $productsCate->getCategoryDetailsName($category_name);
    $category_id = $cateDetails['category_id'];
    $totalItems =  count($productDetails->getAllProductsCategoryList($category_id));
    $itemsPerPage = 30;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);
    $seeProdcut = $productDetails->getCategoryProductsDeta($category_id, $start, $itemsPerPage);
?>
<main class="main">
    <div class="boxed-slider owl-carousel owl-carousel-lazy owl-theme owl-theme-light mb-3"><?php 
        if($category_name == "WRIST WATCH"){ ?>
            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/watch-banner.jpg" data-src="assets/images/banners/watch-banner.jpg" style="height: 450px"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals for <br> <?php echo $category_name ?>
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide -->

            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/watch 2.jpg" data-src="assets/images/banners/watch 2.jpg" style="height: "></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide --><?php
        }elseif($category_id == "SPORT WEARS"){?>
            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/bsports-wear-transparent-1030.png" data-src="assets/images/banners/sports-wear-transparent-1030.png"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals for <br> <?php echo $category_name ?>
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide -->

            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/new_shorts_news_story_pic_2018.png" data-src="assets/images/banners/new_shorts_news_story_pic_2018.png"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide --><?php

        }elseif($category_name == "CASUAL WEARS"){?>
            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/casual.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals for <br> <?php echo $category_name ?>
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide -->

            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/casual2.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide --><?php
            
        }elseif($category_name == "SNICKERS"){?>
            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/snickers.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals for <br> <?php echo $category_name ?>
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide -->

            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/sniickers2.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide --><?php
            
        }elseif($category_name == "TRADITIONAL ATTAIRE"){?>
            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/trad.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1" style="text-decoration-color: white">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals for <br> <?php echo $category_name ?>
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide -->

            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/trad 2.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide --><?php
            
        }elseif($category_name == "HOME APPLIANCES"){?>
            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/home-appliances.png" style="height: auto;"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals for <br> <?php echo $category_name ?>
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide -->

            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/lg-home-appliances-home-household.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide --><?php
            
        }elseif($category_name == "PHONES AND COMPUTERS"){?>
            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/phonesandlaptop.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals for <br> <?php echo $category_name ?>
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide -->

            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/phonelap2.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide --><?php

        }elseif($category_name == "SHOES AND BAGS"){ ?>
            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/shoes and bags.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals for <br> <?php echo $category_name ?>
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide -->

            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/shoes and bags2.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide --><?php
        }else{ ?>
            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/banner-5.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals for <br> <?php echo $category_name ?>
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide -->

            <div class="category-slide">
                <div class="slide-bg owl-lazy" src="assets/images/banners/banner-top-full.jpg" data-src="assets/images/banners/banner-3.jpg"></div><!-- End .slide-bg -->
                <div class="banner boxed-slide-content offset-1">
                    <h2 class="banner-subtitle">check out over <span>200+</span></h2>
                    <h1 class="banner-title">
                        INCREDIBLE deals
                    </h1>
                    <a href="#" class="btn btn-dark">Shop Now</a>
                </div><!-- End .boxed-slide-content -->
            </div><!-- End .category-slide --><?php
        } ?>

        
    </div><!-- End .boxed-slider -->
   
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./"><i class="icon-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="see-product-by-category.php?category_name=<?php echo $category_name ?>"><?php echo $category_name ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Products Categories</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container products-body">
        <nav class="toolbox horizontal-filter filter-sorts">
            <div class="filter-toggle">
                <span>Filters:</span>
                <a href=#>&nbsp;</a>
            </div>

            <div class="sidebar-overlay"></div>
            <aside class="toolbox-left sidebar-shop mobile-sidebar">
                <div class="toolbox-item toolbox-sort select-custom">
                    <a class="sort-menu-trigger" href="#">Size</a>
                    <ul class="sort-list">
                        <li>Extra Large</li>
                        <li>Large</li>
                        <li>Medium</li>
                        <li>Small</li>
                    </ul>
                </div><!-- End .toolbox-item -->

                <div class="toolbox-item toolbox-sort select-custom">
                    <a class="sort-menu-trigger" href="#">Color</a>
                    <ul class="sort-list">
                        <li>Black</li>
                        <li>Blue</li>
                        <li>Brown</li>
                        <li>Green</li>
                        <li>Indigo</li>
                        <li>Light Blue</li>
                        <li>Red</li>
                        <li>Yellow</li>
                    </ul>
                </div><!-- End .toolbox-item -->

                <div class="toolbox-item toolbox-sort price-sort select-custom">
                    <a class="sort-menu-trigger" href="#">Price</a>
                    <form class="filter-price-form">
                        <div>Price: <span>$55.00</span> — <span>$111.00</span></div>
                        <label>Min price</label>
                        <input class="input-price" name="min_price"/>
                        <label>Max price</label>
                        <input class="input-price" name="max_price"/>
                        <div class="filter-price-action mt-0">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div><!-- End .toolbox-item -->

            </aside><!-- End .toolbox-left -->

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
            </div><!-- End .toolbox-item -->

            <div class="toolbox-item ml-lg-auto">
                <div class="toolbox-item toolbox-show show-count">
                    <label>Showing <?php echo $totalItems ?> of <?php echo $itemsPerPage ?> results</label>
                </div><!-- End .toolbox-item -->

                <div class="layout-modes">
                    <a href="see-product-by-category.php?category_name=<?php echo $category_name ?>" class="layout-btn btn-grid" title="Grid">
                        <i class="icon-mode-grid"></i>
                    </a>
                    <a href="see-product-by-categorylist.php?category_name=<?php echo $category_name ?>" class="layout-btn btn-list active" title="List">
                        <i class="icon-mode-list"></i>
                    </a>
                </div><!-- End .layout-modes -->
            </div>
        </nav>

        <div class="row row-sm"><?php 
            foreach($seeProdcut as $listProduct){ 
                $product_number = $listProduct['product_number'];
                $deta = $productDetails->getTrippleProductsDet($product_number);
                $ragzProductDetails = $productDetails->getProductsDetails($product_number);
                $ragzProduct = $productDetails->getProductsDet($product_number); 
                $manufacturer_id = $deta['manufacturer_id'];
                $gettingManu = $db->prepare("SELECT * FROM manufacturer WHERE manufacturer_id=:manufacturer_id");
                $arr = array(':manufacturer_id'=>$manufacturer_id);
                $gettingManu->execute($arr);?>
                <div class="col-6 col-md-4 col-xl-3" align="center">
                    <div class="product">
                        <figure class="product-image-container">
                            <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $deta['product_name']; ?>" style="width: 150px; height: 150px;" />
                            </a>
                            <a href="product-quick-view.php?product_number=<?php echo $product_number ?>" class="btn-quickview">Quick View</a>
                        </figure>
                        <div class="product-details">
                            <div class="ratings-container">
                                <?php 
                                while($see_manu = $gettingManu->fetch()){
                                    echo $see_manu['manufacturer_name']; 
                                } ?>
                            </div><!-- End .product-container -->
                            <h2 class="product-title">
                                <a href="product-details.php?product_number=<?php echo $product_number ?>"><?php echo $deta['product_name']; ?></a>
                            </h2>
                             <div class="price-box">
                                 <span class="old-price" style="color: red"><?php $num = (15/100)*$ragzProductDetails['product_price'];
                                    $adding = $num + $ragzProductDetails['product_price'];
                                     number_format($ragzProductDetails['product_price']); ?>    
                                </span>
                                <span class="product-price" style="color: green">&#8358;<?php echo number_format($adding) ?>
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
                                <a href="see-product-by-category.php?category_name=<?php echo $category_name ?>&&page=<?php echo $page + 1;?>" class="btn btn-primary">NEXT PAGE <i class="icon-angle-right"></i>
                                </a>
                            </div><?php
                        }  ?>
                    </div>
                    <div class="col-md-6" style="margin-left: 750px;"><?php
                        if($page != 1){ ?>
                            <div style="margin-top: -30px">
                               <a href="see-product-by-category.php?category_name=<?php echo $category_name ?>&&page=<?php echo $page - 1;?>" class="btn btn-success">
                                    PREVIOUS PAGE <i class="icon-angle-left"></i> 
                                </a>
                            </div><?php 
                        }?>
                    </div><?php
                }    ?>                   
            </div> 
        </nav>
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->
<?php require 'includes/footer.php'; ?>




<?php
    require 'includes/header.php';
    $brand_name = $_GET['brand_name'];
    $cateDetails = $productDetails->getRagzManufacturerNameDetails($brand_name);
    $manufacturer_id = $cateDetails['manufacturer_id'];
    $totalItems =  count($productDetails->getAllProductsManuList($manufacturer_id));
    $itemsPerPage = 30;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);
    $seeProdcut = $productDetails->getCategoryProductsManu($manufacturer_id, $start, $itemsPerPage);
?>

<main class="main">
     <div class="banner banner-cat" style="background-image: url('assets/images/banners/brand.jpg');">
        <div class="banner-content container">
            <h2 class="banner-subtitle">CHECK OVER <span><?php echo $totalItems ?>+</span></h2>
            <h1 class="banner-title">
                INCREDIBLE <?php echo $brand_name ?>
            </h1>
            <a href="brand-products.php?brand_name=<?php echo $brand_name ?>" class="btn btn-primary">Shop Now</a>
        </div><!-- End .banner-content -->
    </div><!-- End .banner -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./"><i class="icon-home"></i> Home</a></li>
                <li class="breadcrumb-item" class="active"><a href="brand-products.php?brand_name=<?php echo $brand_name ?>"><i class="icon-mode-grid"></i><?php echo $brand_name ?></a></li>
                <li class="breadcrumb-item"><a href="brand-productslist.php?brand_name=<?php echo $brand_name ?>"><i class="icon-mode-list"></i>List <?php echo $brand_name ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Products Brands</li>
            </ol>
        </div><!-- End .container -->
    </nav><?php
    if($productDetails->getCategoryCHeckProductsManu($manufacturer_id)){ ?>
        <div class="col-md-12">
            <p style="color: red" align="center"><?php echo "No Product is Available For $brand_name At The Moment, Please Try Again Later" ?></p>
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
                        <a class="sort-menu-trigger" href="#">Price</a>
                        <form action="brand-product-by-price.php" class="filter-price-form" method="POST">
                            
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
                </div><!-- End .toolbox-item -->

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

            <div class="row row-sm"><?php 
                foreach($seeProdcut as $listProduct){ 
                    $product_number = $listProduct['product_number'];
                    $ragzProduct = $productDetails->getProductsDet($product_number);
                    $ragzProductDetails = $productDetails->getProductsDetails($product_number);

                    $deta = $productDetails->getTrippleProductsDet($product_number);
                    $ragzProduct = $productDetails->getProductsDet($product_number);
                    $manufacturer_id = $ragzProduct['manufacturer_id'];
                    $gettingManu = $db->prepare("SELECT * FROM manufacturer WHERE manufacturer_id=:manufacturer_id");
                    $arr = array(':manufacturer_id'=>$manufacturer_id);
                    $gettingManu->execute($arr); ?>
                    <div class="col-6 col-md-4 col-xl-3" align="center">
                        <div class="product">
                            <figure class="product-image-container">
                                <a href="product-details.php?product_number=<?php echo $product_number ?>" class="product-image">
                                    <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="<?php echo $deta['product_name'] ?>" style="width: 150px; height: 150px;" />
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
                                        <input type="hidden" name="sizes" value="<?php echo $ragzProductDetails['product_size'] ?>">
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
    } ?>
    

    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->
<?php require 'includes/footer.php'; ?>