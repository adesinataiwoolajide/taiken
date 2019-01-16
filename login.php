<?php
    include_once("includes/header.php"); 
    $_SESSION['error'] = "Please Register Or Login into Your Account"; 
?>
    <main class="main">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last dashboard-content">
                    <h2> User Login Form</h2>
                    
                    <div class="mb-4"></div><!-- margin -->
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="card">
                                <div class="card-header">
                                    Please Fill The Below Form To Login Your Account
                                </div><!-- End .card-header -->

                                <div class="card-body">
                                    
                                    <form action="handlers/registration/process-login.php" method="POST">
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <label>User Name</label>
                                                <address>
                                                    <input type="email" name="user_name" required="" class="form-control" placeholder="Please Enter Your User Name">
                                                </address>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Password</label>
                                                <address>
                                                    <input type="password" name="password" required="" class="form-control" placeholder="Please Enter Your Password">
                                                </address>
                                            </div>
                                            
                                            <div class="col-md-12" align="center">
                                                <button type="submit" class="btn btn-success" name="login">LOGIN TO YOUR ACCOUNT</button>
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