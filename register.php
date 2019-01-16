<?php 
    include_once("includes/header.php"); 
?>
        <main class="main">
           
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-last dashboard-content" style="margin-top: -40px;">
                       
                        <div class="mb-4">
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card">
                                    <div class="card-header" align="center" style="color: green">
                                        Please Fill The Below Form To Register Your Account
                                    </div><!-- End .card-header -->

                                    <div class="card-body">
                                        <form action="handlers/registration/process-registration.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Full Name</label>
                                                    <address>
                                                        <input type="text" name="full_name" required="" class="form-control" placeholder="Please Enter Your Name">
                                                    </address>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>User Name</label>
                                                    <address>
                                                        <input type="email" name="user_name" required="" class="form-control" placeholder="Please Enter Your User Name">
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
                                                <div class="col-md-12" align="center">
                                                    <button type="submit" name="register" class="btn btn-success">REGISTER YOUR ACCOUNT</button>
                                                    <a href="login.php" class="btn btn-primary">LOGIN YOUR ACCOUNT</a>
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