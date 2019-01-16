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

    $reg_number = $_SESSION['reg_number'];
    $shippingDetails = $register->gettingShippinCustomerAddress($reg_number);
    $counting = count($shippingDetails);
?>

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Shipping Address</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <ul class="checkout-progress-bar">
            <li class="active">
                <span>Shipping Address</span>
            </li>
           
        </ul>
        <div class="row">
            <div class="col-lg-8">
                <ul class="checkout-steps">
                    <li><?php 
                        if($counting > 0){
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
                                        <label>State </label>
                                        <select class="form-control" name="state" required>
                                            <option value="<?php echo $getAddress['state'] ?>"><?php echo $getAddress['state'] ?> </option>
                                            <option value=""></option><?php 
                                            $zone = $db->prepare("SELECT * FROM shipping_location_charge ORDER BY location ASC");
                                            $zone->execute(); 
                                            while($see_state = $zone->fetch()){ ?>
                                                <option value="<?php echo $see_state['location']; ?>"><?php echo $see_state['location']; ?></option><?php  
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
                                    <label>State </label>
                                    <select class="form-control" name="state" required>
                                        <option value="">-- Select Your City or State --</option>
                                        <option value=""> </option><?php 
                                        $zone = $db->prepare("SELECT * FROM shipping_location_charge ORDER BY location ASC");
                                        $zone->execute(); 
                                        while($see_state = $zone->fetch()){ ?>
                                            <option value="<?php echo $see_state['location']; ?>"><?php echo $see_state['location']; ?></option><?php  
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
                    </li>
                </ul>
            </div><!-- End .col-lg-8 -->
            <div class="col-lg-4">
                <div class="cart-summary"><?php
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
                        </table>
                        <div class="checkout-methods">
                            <a href="checkout.php" class="btn btn-block btn-sm btn-success">Go to Checkout</a>
                            <a href="shipping-address.php" class="btn btn-block btn-sm btn-danger">Add Shipping Address</a>
                            <a href="./" class="btn btn-block btn-sm btn-primary">Continue SHopping</a>   
                        </div><!-- End .checkout-methods --><?php
                    }else{
                        $count = 0; ?>
                         <div class="checkout-methods">
                            <a href="checkout.php" class="btn btn-block btn-sm btn-success">Go to Checkout</a>
                            <a href="shipping-address.php" class="btn btn-block btn-sm btn-danger">Add Shipping Address</a>
                            <a href="./" class="btn btn-block btn-sm btn-primary">Continue SHopping</a>   
                        </div><!-- End .checkout-methods --><?php
                    } ?>
                   
                </div><!-- End .cart-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->
<?php include ("includes/footer.php");?>           
       