<?php 
    include_once("includes/header.php"); 
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $count = count($cart);
    }else{
        $count = 0;
    }
    if(!isset($_SESSION['id'])){ ?>
        <script>
            window.location=('login.php');
        </script><?php 
        $_SESSION['error'] = "Please Register Or Login into Your Account"; 
    }
    if(!isset($_SESSION['transactionId'])){
        $_SESSION['transactionId'] = $general->generateRandomHash(16);   
    }
    $reg_number = $_SESSION['reg_number'];
    $shippingDetails = $register->gettingShippinCustomerAddress($reg_number);
    $count = count($shippingDetails); 
    $new = $register->gettingShippinCustomerAddress($reg_number) ?>

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./"><i class="icon-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="icon-cart"></i><a href="checkout.php"> Checkout</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="icon-cogs"></i><a href="shipping-address.php"> Shipping Address</a></li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <ul class="checkout-progress-bar">
                    <li class="active">
                        <span>Shipping</span>
                    </li>
                    <li>
                        <span>Review &amp; Payments</span>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="handlers/orders/saveOrder.php" method="post" id="self">
                            <ul class="checkout-steps">
                                <li><?php 
                                    //if($count){
                                    foreach ($new as$getAddress ){ ?>
                                        <h2 class="step-title">Shipping Address</h2>

                                        <div class="shipping-step-addresses">
                                            <div class="shipping-step-addresses">
                                            <strong>
                                                
                                                <div class="shipping-address-box active">
                                                    <h3>Shipping Address</h3>
                                                    <address>
                                                        FUll Name: <?php echo $_SESSION['name']; ?> <br>
                                                        Phone Number: <?php echo $getAddress['phone'] ?> <br>
                                                        Address: <?php echo $getAddress['address'] ?> <br>
                                                        Opposite: <?php echo $getAddress['landmark'] ?> <br>
                                                        Nearest City: <?php echo $getAddress['city'] ?> <br>
                                                        State of Residence:<?php echo $getAddress['state'] ?> <br>
                                                    </address>
                                                </div><!-- End .shipping-address-box -->
                                            </strong>
                                        
                                            
                                            <div class="shipping-address-box danger active" >
                                                <?php
                                                if(isset($_SESSION['cart'])){ 
                                                    $cart = $_SESSION['cart'];
                                                    $count = count($cart);
                                                    $reg_number = $_SESSION['reg_number'];
                                                    $shipLocation = $register->getShippinCusgAddress($reg_number); 
                                                    $state = $shipLocation['state']; 
                                                    $shipAmount = $register->getShippinLocationMoney($state); 
                                                    $shippingFee = $shipAmount['charge']; ?>
                                                    <h3 align="center" style="color: green"><strong>Your Transaction Summary </strong></h3>
                                                    <table class="table table-totals"> 
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Shipping Fee </strong></td>
                                                                <td><strong>&#8358;<?php echo number_format($shippingFee) ?></strong></td>
                                                            </tr>

                                                            <tr>
                                                                <td><strong>Product Amount </strong></td>
                                                                <td><strong>&#8358;<?php echo number_format(array_sum($total)+0);?></strong></td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td><strong>Order Total</strong></td>
                                                                <td>&#8358;<?php echo number_format(array_sum($total)+$shippingFee);?></td>
                                                            </tr>
                                                        </tfoot>
                                                        <tfoot>
                                                            <tr>
                                                                <td><strong>Transaction ID</strong></td>
                                                                <td><?php echo $_SESSION['transactionId'];?></td>
                                                            </tr>
                                                        </tfoot>

                                                    </table>
                                                   
                                                    <?php
                                                }else{
                                                    $count = 0; ?>
                                                     <div class="checkout-methods">
                                                        <h3 style="color: red">Please Login or Register</h3>
                                                        <a href="checkout.php" class="btn btn-block btn-sm btn-success">Go to Checkout</a>
                                                        <a href="shipping-address.php" class="btn btn-block btn-sm btn-danger">Add Shipping Address</a>
                                                        <a href="./" class="btn btn-block btn-sm btn-primary">Continue SHopping</a>   
                                                    </div><!-- End .checkout-methods --><?php
                                                } ?>
                                            </div><!-- End .shipping-address-box -->
                                            <div class="shipping-address-box active" >
                                                <h3 align="center" style="color: green">Select Your Option</h3>
                                                 <div class="checkout-methods">   
                                                    <a href="./" class="btn btn-block btn-sm btn-primary">Continue Shopping</a>   
                                                </div><!-- End .checkout-methods -->
                                                
                                                <h5 align="center">Add New Shipping Address ?</h5>
                                                <a href="" class="btn btn-block btn-sm btn-danger" data-toggle="modal" data-target="#addressModal">+ New Shipping Address</a>
                                            </div><!-- End .shipping-address-box -->
                                        </div><!-- End .shipping-step-addresses -->
                                        <?php 
                                   }
                                    //} ?>
                                </li>
                            </ul>
                            <input type="hidden" name="total" value="<?php echo $over = Cart::getTotalQuantity($_SESSION['cart'])[1] + $shippingFee; ?>">
                            <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['user_name']; ?>">
                            <input type="hidden" name="subtotal" value="<?php echo Cart::getTotalQuantity($_SESSION['cart'])[1]; ?>"  >
                            <input type="hidden" name="transactionId" value="<?php echo $_SESSION['transactionId'] ?>">
                            <input type="hidden" name="shipping_charge" id="shipping" value="<?php echo $shippingFee; ?>">
                            <div class="col-lg-12" >
                                <h3 align="center" style="color: green">Payment Methods</h3>
                                <button name="submit2" id="submit2" class="btn btn-block btn-sm btn-success">Payment On Delivery</button>
                                <button class="btn btn-block btn-sm btn-primary" id="submit">Online Payment</button><br>
                                
                            </div><!-- End .shipping-address-box -->
                            
                        </form>
                    </div><!-- End .col-lg-8 -->

                
                </div><!-- End .row -->

               
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->
        <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Change Shipping Address</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                    <div class="modal-body">
                        <?php 
                        if($count){
                            foreach ($shippingDetails as$getAddress ){ ?>
                                <form action="handlers/shipping/update-shipping-address.php" method="POST">
                                    <div class="form-group required-field" >
                                        <label>Phone Number </label>
                                        <input type="number" name="phone" value="<?php echo $getAddress['phone'] ?>" class="form-control" required>
                                        <span style="color: red">** This Field is Required ** </span>
                                    </div><!-- End .form-group -->

                                    <div class="form-group required-field">
                                        <label>Opposite, Next to or Near by </label>
                                        <input type="text" name="landmark" value="<?php echo $getAddress['landmark'] ?>" class="form-control" required>
                                        <span style="color: red">** This Field is Required ** </span>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label>State </label><?php 
                                        $zone = $db->prepare("SELECT * FROM shipping_zone ORDER BY state ASC");
                                        $zone->execute(); ?>
                                        <select class="form-control" name="state" required>
                                            <option value="<?php echo $getAddress['state'] ?>"><?php echo $getAddress['state'] ?> </option>
                                            <option value=""></option><?php 
                                            $zone = $db->prepare("SELECT * FROM shipping_zone ORDER BY state ASC");
                                            $zone->execute(); 
                                            while($see_state = $zone->fetch()){ ?>
                                                <option value="<?php echo $see_state['state']; ?>"><?php echo $see_state['state']; ?></option><?php  
                                            } ?>

                                        </select>
                                        <span style="color: red">** This Field is Required ** </span>
                                    </div><!-- End .form-group -->
                                     
                                    <div class="form-group required-field">
                                        <label>Street Address </label>
                                        <textarea type="text" class="form-control" name="address" required><?php echo $getAddress['address'] ?> </textarea>
                                        <span style="color: red">** This Field is Required ** </span>
                                    </div><!-- End .form-group -->
                                    <input type="hidden" name="customer_id" value="<?php echo $getAddress['customer_id'] ?>">
                                   
                                    <div class="form-group required-field" align="center">
                                        <button class="btn btn-primary" name="update-address">UPDATE SHIPPING/DELIVERY ADDRESS</button>
                                    </div><!-- End .form-group -->
                                   
                                </form><?php 
                            }

                        }else{ ?>
                            <form action="handlers/shipping/add-shipping-address.php" method="POST">
                                <div class="form-group required-field" >
                                    <label>Phone Number </label>
                                    <input type="number" name="phone" class="form-control" required>
                                    <span style="color: red">** This Field is Required ** </span>
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Opposite, Next to or Near by </label>
                                    <input type="text" name="landmark" class="form-control" required>
                                    <span style="color: red">** This Field is Required ** </span>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>State </label><?php 
                                    $zone = $db->prepare("SELECT * FROM shipping_zone ORDER BY state ASC");
                                    $zone->execute(); ?>
                                    <select class="form-control" name="state" required>
                                        <option value="">-- Select Your City or State --</option>
                                        <option value=""> </option><?php
                                        while($see_state = $zone->fetch()){ ?>
                                            <option value="<?php echo $see_state['state']; ?>"><?php echo $see_state['state']; ?></option><?php  
                                        } ?>
                                    </select>
                                    <span style="color: red">** This Field is Required ** </span>
                                </div><!-- End .form-group -->
                                 
                                <div class="form-group required-field">
                                    <label>Street Address </label>
                                    <textarea type="text" class="form-control" name="address" required> </textarea>
                                    <span style="color: red">** This Field is Required ** </span>
                                </div><!-- End .form-group -->

                               
                                <div class="form-group required-field" align="center">
                                    <button class="btn btn-primary" name="add-address">ADD SHIPPING/DELIVERY ADDRESS</button>
                                </div><!-- End .form-group -->
                               
                            </form><?php
                        } ?>
                        
                    </div><!-- End .modal-body -->
                </div><!-- End .modal-content -->
            </div><!-- End .modal-dialog -->
        </div>

        <?php require_once 'includes/footer.php'; ?>