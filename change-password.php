<?php
    include_once("includes/header.php"); 
?>
    <main class="main">

        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last dashboard-content" style="margin-top: -10px;">
                    
                    <div class="mb-4"></div><!-- margin -->
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="card">
                                <div class="card-header">
                                    Please Fill The Below Form To Retrieve Your Account
                                </div><!-- End .card-header -->

                                <div class="card-body">
                                     <form action="handlers/registration/update-account.php" method="post">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                                <address>
                                                    <input type="text" name="user_name" required="" class="form-control" placeholder="Please Enter Your User Name" value="<?php echo $_SESSION['name'] ?>">
                                                </address>
                                            </div>
                                            <div class="col-md-6">
                                                <label>User Name</label>
                                                <address>
                                                    <input type="text" name="user_name" required="" class="form-control" placeholder="Please Enter Your User Name" readonly value="<?php echo $_SESSION['user_name'] ?>">
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
                                                <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name'] ?>">
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