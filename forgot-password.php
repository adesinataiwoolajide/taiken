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
                                    <form action="handlers/registration/retrieve-password.php" method="POST">
                                        <div class="row">
                                            
                                            <div class="col-md-9">
                                                <label>User Name</label>
                                                <address>
                                                    <input type="text" name="user_name" required="" class="form-control" placeholder="Please Enter Your User Name">
                                                </address>
                                            </div>
                                            <div class="col-md-3">
                                                <label></label>
                                                <address>
                                                    <button type="submit" class="btn btn-success" name="retrieve-password">GET YOUR DETAILS</button>
                                                    
                                                </address>
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