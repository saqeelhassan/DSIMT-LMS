<?php
    include "includes/Header.php";
    include "includes/Navbar.php";
?>

<!-- start Registration section -->
<section class="login section" style="margin-top: -30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Register</h4>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="margin-5px-bottom" type="email" id="exampleInputEmail1"  placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="margin-5px-bottom" type="text" id="exampleInputName1"  placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="margin-5px-bottom" type="text" id="Username1" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="margin-5px-bottom" type="password" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="button">
                                <button type="submit" class="btn">Register</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="login.php">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Registration section -->

<?php
    include "includes/Footer.php";
    include "includes/Script.php";
?>