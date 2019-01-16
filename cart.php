<?php 
    include_once("includes/header.php"); 
     if(!isset($_SESSION['id'])){ ?>
       
        <script>
            window.location=('login.php');
        </script><?php 
        $_SESSION['error'] = "Please Register Or Login into Your Account"; 
    }
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $count = count($cart);
        $reg_number = $_SESSION['reg_number'];
        $shipLocation = $register->getShippinCusgAddress($reg_number); 
        $state = $shipLocation['state']; 
        $shipAmount = $register->getShippinLocationMoney($state); 
        $shippingFee = $shipAmount['charge'];
    }else{
        $count = 0;
        $shippingFee=0;
    }

    if(!isset($_SESSION['transactionId'])){
        $_SESSION['transactionId'] = $general->generateRandomHash(16);   
    }
?>
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="icon-cart"></i> Shopping Cart </li>
                    </ol>
                </div><!-- End .container -->
            </nav>
            <div class="container">
                <div class="row"><?php
                    if($count > 0){ ?>
                        <div class="col-lg-8">
                            <div class="cart-table-container">
                                <table class="table table-cart">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th class="product-col">Product Image</th>
                                            <th class="price-col">Product Name</th>
                                            
                                            <th class="qty-col">Price</th>
                                            <!-- <th class="qty-col">Qty</th> -->
                                            <th class="qty-col">Brand</th>
                                            <th>Size</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php
                                        $total = array();
                                        $y =1;
                                        foreach($cart as $item){  
                                            $product_number = $item['product_number'];
                                            $ragzProduct = $productDetails->getProductsDet($product_number);
                                            $ragzProductDetails = $productDetails->getProductsDetails($product_number);
                                            $manufacturer_id = $ragzProduct['manufacturer_id'];
                                            $manuDetails = $productDetails->getRagzManufacturerDetails($manufacturer_id);
                                            $manufacturer_name = $manuDetails['manufacturer_name']; ?>
                                            <tr>
                                                <td><?php echo $y; ?></td>
                                                <td class="product-thumbnail">
                                                   <img src="<?php echo "assets/images/products-images/large-image/".$ragzProduct['product_image'] ?>" alt="product" width="30" height="20">
                                                </td>
                                                <td class="product-name">
                                                    <span><?php echo ucwords($item['name']); ?> </span>
                                                </td>
                                                
                                                <td class="product-quantity">
                                                    &#8358;<?php echo number_format($ragzProductDetails['product_price']) ?>
                                                </td> <?php 
                                                    $price =$ragzProductDetails['product_price'];
                                                    $cal = $price * $item['quantity'];
                                                    array_push($total, $price); ?> 
                                                <td>
                                                    <?php echo $manufacturer_name ?>
                                                </td>
                                                <td>
                                                    <?php $sizeArray = explode(",", $ragzProductDetails['product_size']);?>
                                                    <?php 
                                                    if(count($sizeArray)){?>
                                                        <select names="sizes" id="size" class="form-control" required>  
                                                            <?php foreach($sizeArray as $size){?>
                                                                <option value="<?php echo trim($size); ?>"><?php echo $size; ?></option>
                                                            <?php }?>
                                                        </select><?php 
                                                    } ?>
                                                </td>
                                                 
                                                <td class="product-remove">
                                                    <a href="handlers/cart/removeFromCart.php?product_number=<?php echo $product_number?>"><i class="btn-remove"></i></a>
                                                </td>
                                            </tr><?php 
                                            $y++; 
                                        } ?>         
                                    </tbody>
                                </table>
                            </div>
                                     
                        </div><!-- End .col-lg-8 -->

                        <div class="col-lg-4">
                            <div class="cart-summary">
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
                                    
                                </div><!-- End .checkout-methods -->
                               
                            </div><!-- End .cart-summary -->
                        </div><!-- End .col-lg-4 --><?php 

                    }else{ ?>
                        <div class="col-lg-12">
                            <h3 align="center"><p style="color: red" align="center"> Your Shopping Cart is Empty</p></h3>
                        </div><?php 
                    } ?>
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->

        <?php require_once 'includes/footer.php'; ?>