<?php
    include 'header.php';
?>
    <!--Login Form Section-->
    <div class="container app-main">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <h1 class="text-center">Register</h1>

                <form action="register.php" method="POST">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ; ?>">
                    <?php if ( !empty($firstnameErr) ): ?>
                      <div class="form-errors"> <?php echo $firstnameErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ; ?>">
                    <?php if ( !empty($lastnameErr) ): ?>
                      <div class="form-errors"> <?php echo $lastnameErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ; ?>">
                    <?php if ( !empty($emailErr) ): ?>
                      <div class="form-errors"> <?php echo $emailErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ; ?>">
                    <?php if ( !empty($passwordErr) ): ?>
                      <div class="form-errors"> <?php echo $passwordErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary app-btn" value="Register" name="register-submit">  
                </div>
                </form>
                <p> Do you have an account? <a href="login.php">Login Here</a></p>
            </div>
        </div>
    </div>
<?php
    include 'footer.php';
?>