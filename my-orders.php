<?php 
    include_once("includes/header.php"); 
?>
        <main class="main">
            
            <div class="container">
                <div class="row"><?php 
                    if(isset($_SESSION['id'])){ 
                        $reg_number = $_SESSION['reg_number'];
                        $customer_id = $reg_number;
                        $new = $register->gettingShippinCustomerAddress($reg_number);
                        $shippingDetails = $register->gettingShippinCustomerAddress($reg_number); 
                        $orders = $custOrder->getTheCustomersOrder($customer_id); ?>
                        
                        <div class="col-lg-9 order-lg-last dashboard-content">
                            <div class="alert alert-success alert-intro" role="alert">
                                <p align="center"><?php echo $_SESSION['name'] ?> Welcome To Your Order Dashboard. </p>
                            </div><!-- End .alert -->
                           
                            <div class="row">
                                <div class="col-md-12"> <?php
                                    if(count($orders)== 0){ ?>
                                        <div class="alert alert-danger alert-intro" role="alert">
                                           <h3> <p align="center" style="color: red">Your Order List is Empty</p></h3>   
                                        </div><!-- End .alert --><?php
                                    }else{ ?>
                                        <div class="card col-md-12">
                                            <div class="card-header">
                                                My Orders
                                                <a href="my-orders.php" class="card-edit">My Order List</a>
                                            </div><!-- End .card-header -->
                                           <div class="card-body">
                                                <table class="table table-responsive table-bordered" style="">
                                                    <thead>
                                                        <tr>
                                                            <th>S/N</th>
                                                            <th>Order Number</th>
                                                            <th>Amount</th>
                                                            <th>Total Order</th>
                                                            <th>Shipping Charges</th>
                                                            <th>Payment Refrence</th>
                                                            <th>Payment Status</th>
                                                            <th>Order Status</th>
                                                            <th>Order Details</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody><?php
                                                        $y=1;
                                                        foreach ($orders as$getOrder){ 
                                                            $order_id = $getOrder['order_id'];
                                                            $orderDetails = $custOrder->getTheCustomerOrderDetails($order_id);
                                                            $ode = $custOrder->getTheCustomersOrderList($order_id);
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $y ?></td>
                                                                <td><?php echo $order_id = $ode['order_id']; ?></td>
                                                                <td>&#8358;<?php echo number_format($ode['subtotal']); ?></td>
                                                                <td>&#8358;<?php echo number_format($ode['shipping_charge']); ?></td>
                                                                <td>&#8358;<?php echo number_format($ode['amount']); ?></td>
                                                                <td><?php echo $ode['paystack_reference']; ?></td>
                                                                <td><?php 
                                                                    $pay_status = $ode['paid_status'];
                                                                    $custOrder->interpretePayment($pay_status); ?>
                                                                        
                                                                </td>
                                                                <td><?php 
                                                                    $order_status = $ode['order_status'];
                                                                    $custOrder->interpreteOrder($order_status); ?>
                                                                    
                                                                </td>
                                                                <td><a href="order-details.php?order_number=<?php echo $order_id ?>">Details </td>
                                                            </tr>
                                                            <?php $y++;
                                                        } ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- End .card --><?php 
                                    } ?>
                                        
                                </div>
                            </div><!-- End .col-lg-9 -->
                               
                        </div><!-- End .col-lg-9 -->
                        <?php 
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