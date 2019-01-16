<?php 
    include_once("includes/header.php"); 
    require_once 'includes/special-side.php';
    $user_name = $_GET['user_name'];
    $deel = $register->gettingUserCredential($user_name);
    $full_name = $deel['full_name'];
?>
        <main class="main">
           
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-last dashboard-content" style="margin-top: -10px;">
                       
                        <div class="mb-4"></div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card">
                                    <div class="card-header" align="center" style="color: green">
                                        Please Fill The Below Form To Register Your Account
                                    </div><!-- End .card-header -->
                                    <p style="color: green" align="center">Your Registration Number is <?php echo $deel['reg_number'] ?></p>
                                    <div class="card-body">
                                        <form action="handlers/registration/update-account.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Full Name</label>
                                                    <address>
                                                        <input type="text" name="full_name" required="" class="form-control" placeholder="Please Enter Your Name" value="<?php echo $full_name ?>">
                                                    </address>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>User Name/Registration Number</label>
                                                    <address>
                                                        <input type="email" name="user_name" class="form-control" placeholder="Please Enter Your User Name" value="<?php echo $user_name ?>" readonly>
                                                    </address>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label>Password</label>
                                                    <address>
                                                        <input type="password" name="password" required="" class="form-control" placeholder="Please Enter Your Password">
                                                    </address>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Repeat Password</label>
                                                    <address>
                                                        <input type="password" name="repeat" required="" class="form-control" placeholder="Please Repeat Your Password">
                                                    </address>
                                                </div>
                                                <input type="hidden" name="user_name" value="<?php echo $user_name ?>">
                                                <input type="hidden" name="return" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                                <div class="col-md-12" align="center">
                                                    <button type="submit" name="update-account" class="btn btn-success">UPDATE YOUR ACCOUNT</button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div><!-- End .card-body -->
                                </div><!-- End .card -->
                            </div><!-- End .col-md-6 -->

                            
                        </div><!-- End .row -->

                        
                    </div><!-- End .col-lg-9 -->
                    <?php include_once("includes/dashside.php") ?>
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->
    <?php require_once 'includes/footer.php'; ?>