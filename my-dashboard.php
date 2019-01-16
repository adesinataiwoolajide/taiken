<?php 
    include_once("includes/header.php"); 
?>
        <main class="main">
            
            <div class="container">
                <div class="row"><?php 
                    if(isset($_SESSION['id'])){ 
                        $reg_number = $_SESSION['reg_number'];
                        
                        $new = $register->gettingShippinCustomerAddress($reg_number);
                        $shippingDetails = $register->gettingShippinCustomerAddress($reg_number); ?>
                       
                        <div class="col-lg-9 order-lg-last dashboard-content">
                            <div class="alert alert-success alert-intro" role="alert">
                                <p align="center"><?php echo $_SESSION['name'] ?> Welcome To Your Dashboard. </p>
                            </div><!-- End .alert -->
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Contact Information
                                            <a href="#" class="card-edit">Edit</a>
                                        </div><!-- End .card-header -->

                                        
                                        <?php
                                            foreach ($new as$getAddress ){ ?>
                                               <div class="card-body">
                                                   <p> 
                                                        Phone Number: <?php echo $getAddress['phone'] ?></br>
                                                        Address: <?php echo $getAddress['address'] ?></br>
                                                        Opposite: <?php echo $getAddress['landmark'] ?></br>
                                                        Nearest City: <?php echo $getAddress['city'] ?></br>
                                                        State of Residence:<?php echo $getAddress['state'] ?>
                                                        
                                                    </p>
                                                </div><?php 
                                            } ?>
                                    </div><!-- End .card -->

                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Shipping Address
                                            <a href="" class="card-edit" data-toggle="modal" data-target="#addressModal">+ Edit </a>
                                        </div><!-- End .card-header -->

                                        <?php
                                            foreach ($new as$getAddress ){ ?>
                                               <div class="card-body">
                                                   <p> 
                                                        Phone Number: <?php echo $getAddress['phone'] ?></br>
                                                        Address: <?php echo $getAddress['address'] ?></br>
                                                        Opposite: <?php echo $getAddress['landmark'] ?></br>
                                                        Nearest City: <?php echo $getAddress['city'] ?></br>
                                                        State of Residence:<?php echo $getAddress['state'] ?>
                                                        
                                                    </p>
                                                </div><?php 
                                            } ?>
                                    </div><!-- End .card -->
                                </div><!-- End .col-md-6 -->

                            </div><!-- End .row -->
                            <div class="col-lg-12 order-lg-last dashboard-content">
                            
                                <div class="card">
                                    <div class="card-header">
                                        Address Book
                                        <a href="" class="card-edit">Register</a>
                                    </div><!-- End .card-header -->

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="">My Billing Address</h4>
                                                <address>
                                                    You have not set a default billing address.<br>
                                                    <a href="#">Edit Address</a>
                                                </address>
                                            </div>
                                            <div class="col-md-6">
                                                <h4 class="">Default Shipping Address</h4>
                                                <address>
                                                    You have not set a default shipping address.<br>
                                                    <a href="">Edit Address</a>
                                                </address>
                                            </div>
                                        </div>
                                    </div><!-- End .card-body -->
                                </div><!-- End .card -->
                            </div><!-- End .col-lg-9 -->
                               
                        </div><!-- End .col-lg-9 -->
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
                        </div><?php 
                    }else{ ?>
                        <div class="col-lg-9 order-lg-last dashboard-content">
                            
                            <div class="mb-4"></div><!-- margin -->
                            <h3>Account Information</h3>
                            <div class="card">
                                <div class="card-header">
                                    Address Book
                                    <a href="" class="card-edit">Register</a>
                                </div><!-- End .card-header -->

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="">My Billing Address</h4>
                                            <address>
                                                You have not set a default billing address.<br>
                                                <a href="#">Edit Address</a>
                                            </address>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="">Default Shipping Address</h4>
                                            <address>
                                                You have not set a default shipping address.<br>
                                                <a href="">Edit Address</a>
                                            </address>
                                        </div>
                                    </div>
                                </div><!-- End .card-body -->
                            </div><!-- End .card -->
                        </div><!-- End .col-lg-9 --><?php
                    }
                    require_once 'includes/dashside.php'; ?>
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->
    <?php require_once 'includes/footer.php'; ?>