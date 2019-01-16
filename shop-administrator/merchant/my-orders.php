<?php
    session_start();
    include("../header.php");
    include("../side-bar.php");
    require '../../libs_dev/products/products_class.php';
    require '../../libs_dev/merchant/merchant_class.php';
    require_once '../../dev_class/register/customer_registration_class.php';
    $merchantDetails = new productMerchant($db);
    $productDetails = new ragzNationProducts($db);
    $productOrder = new customerOrders($db);
    $customerRegister = new newCustomerRegistration($db);
    
    $merchant_email = $_SESSION['user_name'];
    $myDetails = $merchantDetails->gettingMerchantEmailDelatils($merchant_email);
    $merchant_number = $myDetails['merchant_number'];
    $merchant_name = $myDetails['merchant_name'];
    $details = $merchantDetails->gettingMerchantDelatils($merchant_number);
    $merchant_email = $details['merchant_email'];
    $users = $merchant_email;
    $admin = $register->gettingUserDetails($users);
 
    $totalItems =  count($productDetails->getProducts($merchant_number));
    $itemsPerPage = 20;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);
    $seeProdcut = $productDetails->getMerchantProductsDet($merchant_number, $start, $itemsPerPage);

    // $orderList = $productOrder->gettingAlThelProductOrders(); 
?>
<ul class="breadcrumb">
    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>    
    <li><a href="my-products-list.php"><i class="fa fa-list"></i>All <?php echo $merchant_name ?> Products</p></a></li>                    
    <li><a href="merchant-details.php?merchant_number=<?php echo $merchant_number?>"><i class="fa fa-list"></i><?php echo $merchant_name ?> Details</p></a></li> 
    <li><a href="my-unpublish-products.php?merchant_number=<?php echo $merchant_number?>"><i class="fa fa-ban"></i> Un-Publish Product</p></a></li>     
    <li><a href="my-published-products.php?merchant_number=<?php echo $merchant_number?>"><i class="fa fa-cloud"></i> Published Product</p></a></li>  
    <li class="active"><?php echo $merchant_name ?> Product List</li>   
</ul>
<!-- END BREADCRUMB -->                       
<?php
if((isset($_SESSION['success'])) OR ((isset($_SESSION['error'])) === true)){ ?>
    <div class="alert alert-info" align="center">
        <button class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
     <?php include("../includes/feed-back.php"); ?>
    </div><?php 
}  ?> 
<!-- PAGE CONTENT WRAPPER -->

    <div class="page-content-wrap"><div class="row">
        <div class="col-md-12"> <?php 
            $level = $productDetails->gettingAllOrders(); 
            if(count($level)==0){ ?>
              <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><p style="color: red" align="center">Your Order List is Empty</p></h3>
                    </div>
                </div><?php 
            } else{ ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $merchant_name; ?> Please Preview Your Orders Below </h3>
                        <?php include("../table-modal.php"); ?>
                    </div>
                    <div class="panel-body">
                        <table id="customers2" class="table datatable"> 
                            <thead align="center">
                               <tr>
                                    <th>S/N</th>
                                    <th>Order Number</th>
                                    <th>Payment Refrence</th>
                                    <th>Customer Name</th>
                                    <th>Product Name</th>
                                    <th>Paid Status</th>
                                    <th>Sub Total</th>
                                    <th>Shipping Charges</th> 
                                    <th>Amount</th>
                                    <th>More Details</th> 
                                </tr>
                            </thead>
                            <tfoot align="center">
                                <tr>
                                    <th>S/N</th>
                                    <th>Order Number</th>
                                    <th>Payment Refrence</th>
                                    <th>Customer Name</th>
                                    <th>Product Name</th>
                                    <th>Paid Status</th>
                                    <th>Sub Total</th>
                                    <th>Shipping Charges</th> 
                                    <th>Amount</th>
                                    <th>More Details</th> 
                                </tr>
                            </tfoot>

                            <tbody><?php
                                $y =1;
                                
                               // $level = $productDetails->getAllProductsPublish();
                                foreach($level as $new_level) {
                                    $order_id = $new_level['order_id'];
                                    $product_number = $new_level['product_id'];
                                    $odd = $productOrder->getMerchantProducts($order_id);
                                    $merchant = $productOrder->getMerchProducts($merchant_number, $product_number);
                                    $reg_number = $odd['customer_id'];
                                    $depo = $customerRegister->getUserDetails($reg_number);
                                    $ragzProduct = $productDetails->getProductsDet($product_number); ?>
                                    <tr>
                                        <td> <?php echo $y ?></td>
                                        <td><?php echo $order_id ?></td>
                                        <td><?php echo $odd['paystack_reference'] ?> </td>
                                        <td><?php echo $depo['full_name'] ?> </td>
                                        <td><?php echo $ragzProduct['product_name'] ?></td>
                                        <td> <?php echo $odd['paid_status'] ?></td>
                                        <td>&#8358;<?php echo number_format($odd['subtotal'])?> </td>
                                        <td>&#8358;<?php echo number_format($odd['shipping_charge']) ?> </td>
                                        <td>&#8358;<?php echo number_format($odd['amount']) ?> </td>
                                        <td></td>
                                    </tr><?php 
                                    $y++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div><?php 
            } ?>
        </div>
    </div>    
                 
</div>        

<?php
    include("../log-out-modal.php");
    include("../table-footer.php");
	//include("../footer.php");
?>