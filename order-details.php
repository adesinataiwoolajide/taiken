<?php 
    include_once("includes/header.php"); 
    $order_id = $_GET['order_number'];
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
                                <div class="col-md-12"> 
                                    <div class="card col-md-12">
                                        <div class="card-header">
                                            My Order Details
                                            
                                            <a href="my-orders.php" class="card-edit">My Order List</a>

                                        </div><!-- End .card-header -->
                                       <div class="card-body">
                                            <table class="table table-responsive table-bordered" style="">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Order Number</th>
                                                        <th>Product Name</th>
                                                        <th>Order Amount</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody><?php
                                                    $y=1;
                                                    $orderDetails = $custOrder->getTheCustomerOrderDetails($order_id);
                                                    foreach ($orderDetails as $getOrder){ 
                                                        $ode = $custOrder->getAllCustomerOrderDetails($order_id);
                                                        $product_number = $getOrder['product_id'];
                                                        $ragzProduct = $productDetails->getProductsDet($product_number);
                                                        $ragzProductDetails = $productDetails->getProductsDetails($product_number); ?>
                                                        <tr>
                                                            <td><?php echo $y ?></td>
                                                            <td><?php echo $order_id = $ode['order_id']; ?></td>
                                                            <td><?php echo $ragzProduct['product_name']; ?></td>
                                                            <td>&#8358;<?php echo number_format($getOrder['amount']); ?></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>

                                                        <?php $y++;
                                                    } ?>
                                                    
                                                </tbody>
                                                <tbody><?php
                                                        foreach ($orders as$getOrder){ 
                                                            $order_id = $getOrder['order_id'];
                                                            $orderDetails = $custOrder->getTheCustomerOrderDetails($order_id);
                                                            $ode = $custOrder->getTheCustomersOrderList($order_id);
                                                            ?>
                                                            <tr>
                                                                <td>Sub Total: &#8358;<?php echo number_format($ode['subtotal']); ?></td>
                                                                <td>Shipping Charges&#8358;<?php echo number_format($ode['shipping_charge']); ?></td>
                                                                <td>Total Amount: &#8358;<?php echo number_format($ode['amount']); ?></td>
                                                                <td>Payment Refrence: <?php echo $ode['paystack_reference']; ?></td>
                                                                <td>Payment Status: <?php 
                                                                    $pay_status = $ode['paid_status'];
                                                                    $custOrder->interpretePayment($pay_status); ?>
                                                                        
                                                                </td>
                                                                <td>Order Status: <?php 
                                                                    $order_status = $ode['order_status'];
                                                                    $custOrder->interpreteOrder($order_status); ?>
                                                                    
                                                                </td>
                                                                
                                                            </tr>
                                                            <?php
                                                        } ?>
                                                        
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
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