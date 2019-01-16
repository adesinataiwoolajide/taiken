<aside class="sidebar col-lg-3">
    <div class="widget widget-dashboard">
        
        <ul class="list"><?php 
            if(isset($_SESSION['user_name'])){ ?>
                <li class="active"><a href="my-dashboard.php">My Dashboard</a></li>
                <li class="active"><a href="shipping-address.php">Shipping Address</a></li>
                <li class="active"><a href="my-orders.php">My Orders</a></li>
                <li class="active"><a href="checkout.php">Check Out</a></li>
                <li class="active"><a href="change-password.php">Change Password</a></li>
                <li class="active"><a href="my-wishlist.php">My Wish List</a></li>
                <li class="active"><a href="my-comparedlist.php">My Compared List</a></li>
                <li class="active"><a href="logout.php"><i class="fa fa-lock"></i> Log Out</a></li> <?php
            }else{ ?>
                <li class="active"><a href="register.php">Register</a></li>
                <li class="active"><a href="login.php">Login</a></li>
                <li class="active"><a href="forgot-password.php">Forget Password</a></li>
                <li class="active"><a href="">Account Information</a></li>
                <li class="active"><a href="">Address Book</a></li>
                <li class="active"><a href="">My Orders</a></li>
                <li class="active"><a href="">Billing Agreements</a></li>
                <li class="active"><a href="">Track Orders</a></li>
                <?php
            } ?>
            
        </ul>
    </div><!-- End .widget -->
</aside><!-- End .col-lg-3 -->