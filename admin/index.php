<?php require_once('inc/header.php');?>
<div class="row">
        <div class="col-lg-4 m-auto">
        <div class="card mt-5">
            <div class="card-header">
            <h3>DFLAB ADMIN LOGIN</h3>
            </div>
            <?php
                login_system();
                display_message(); 
             ?>
            <div class="card-body">
                <form method="POST">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input type="text" class="form-control mb-2" placeholder="enter admin username/email" name="username">
                    <br>
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input type="password" class="form-control" id="inputp" placeholder="enter admin password" name="password">
                    <br>
                    <!-- An element to toggle between password visibility -->
			        <input type="checkbox" onclick="myFunction()"> Show Password</input>
                    <script>
                    function myFunction() {
                    var x = document.getElementById("inputp");
                    if (x.type === "password")
                    {
                    x.type = "text";
                    }
                    else 
                    {
                    x.type = "password";
                    }
                    }
                    </script>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" name="btn_login">Login</button>
            </div>
            <div class="card-footer m-auto">
                <span>Or login with</span>
            </div>
            <div class="text-center social-auth m-b-20">
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
            </div>
            <div class="text-center">Not a member?
                <a class="color-blue" href="register.html">Create account</a>
            </div>
        </form>
        </div>
    </div>
<?php require_once('inc/footer.php'); ?>