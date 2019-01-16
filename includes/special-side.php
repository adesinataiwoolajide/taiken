    <div class="header-bottom">
        <div class="container">
            <div class="header-left">
                <div class="main-dropdown-menu show is-stuck">
                    <li class="active"><a href="./"><i class="icon-home"></i>Home</a></li>
                    
                </div><!-- End .main-dropdown-menu -->
            </div><!-- End .header-left -->
            <div class="header-right">
                <div class="custom-link-menu"><?php
                    $cate = $db->prepare("SELECT * FROM products_category ORDER BY category_id desc LIMIT 0,5");
                    $cate->execute();
                    while($see_cate = $cate->fetch()){?>
                        <a href="see-product-by-category.php?category_name=<?php echo $see_cate['category_name'] ?> "><?php echo $see_cate['category_name'] ?> 
                        </a> <?php
                    } ?>
                </div><!-- End .custom-link-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->