<?php
    include 'header.php';
?>
    <!--Login Form Section-->
    <div class="container app-main">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <h1 class="text-center">Login</h1>

                <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary app-btn" value="Login" name="login-submit">  
                </div>
                </form>
                <p> Don't have an account? <a href="register.php">Register Here</a></p>
            </div>
        </div>
    </div>
<?php
    include 'footer.php';
?>