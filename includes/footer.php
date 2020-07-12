<!-- Footer Section Start -->
<div id="footer">
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
            
                <h4>Pages</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="checkout.php">My Account</a></li>
                </ul><!-- ul Finish -->
                
                <hr>
                
                <h4>User Section</h4>
                
                <ul><!-- ul Begin -->
                    <li>
                        <?php

                            if(!isset($_SESSION['customer_email'])) {
                                echo "<a href='./checkout.php'>Login</a>";
                            } else {
                                echo "<a href='customer-profile/my_account.php?my_orders'>My Account</a>";
                            }

                        ?>
                    </li>
                    <li><a href="customer_register.php">Register</a></li>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
            
            </div><!-- col-sm-6 col-md-3 Finish -->
        
        <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
        
            <h4>Top Products Categories</h4>
            
            <ul><!-- ul Begin -->

                <?php getProductCategories(); ?>

            </ul><!-- ul Finish -->
            
            <hr class="hidden-md hidden-lg">
        
        </div><!-- col-sm-6 col-md-3 Finish -->
        
        <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
        
            <h4>Find Us</h4>
            
            <p><!-- p Start -->
            
                <strong>Full-Stack Web-Dev</strong>
                <br/>Chawttashari Road
                <br/>Mehadibagh Lane
                <br/>+880-1915464958
                <br/>sonjoy.john@gmail.com
                <br/><strong>Mr. Sonjoy</strong>
            
            </p><!-- p Finish -->
            
            <a href="contact.php">Check Our Contact Page</a>
            
            <hr class="hidden-md hidden-lg">
        
        </div><!-- col-sm-6 col-md-3 Finish -->
        
        <div class="col-sm-6 col-md-3">
            
            <h4>Get The News</h4>
            
            <p class="text-muted">
                Dont miss our latest update products.
            </p>
            
            <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=Your Feed ID', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><!-- form begin -->
                <div class="input-group"><!-- input-group begin -->
                
                    <input type="text" class="form-control" name="email">
                    <input type="hidden" value="online_shop" name="uri" />
                    <input type="hidden" name="loc" value="en_US" />
                    
                    <span class="input-group-btn"><!-- input-group-btn begin -->
                    
                    <input type="submit" value="subscribe" class="btn btn-primary">
                    
                    </span><!-- input-group-btn Finish -->
                
                </div><!-- input-group Finish -->
            </form><!-- form Finish -->
            
            <hr>
            
            <h4>Keep In Touch</h4>
            
            <p class="social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-envelope"></i></a>
            </p>
            
        </div>
        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div>

<div id="copyright" style="border-bottom: 5px solid #4CAF50;"><!-- #copyright Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-6"><!-- col-md-6 Begin -->

            <p class="pull-left" style=" font-size: 14px;">&copy; Copyright by Online Shop 2018-2019. All Rights Reserved</p>

        </div><!-- col-md-6 Finish -->
        <div class="col-md-6"><!-- col-md-6 Begin -->

            <p class="pull-right" style=" font-size: 14px;">Web Design & Develop by: <a href="#" style="color: #F59F02;">Sonjoy-WebDev</a></p>

        </div><!-- col-md-6 Finish -->
    </div><!-- container Finish -->
</div><!-- #copyright Finish -->
<!-- Footer Section End -->