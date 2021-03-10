<?php
    include 'header.php';
    include 'includes/portfolio-controllers.php';
?>
    <!--Login Form Section-->
    <div class="container app-main">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <h1 class="text-center">Add Portfolio Item</h1>
                <?php if ( !empty($addErr) ): ?>
                    <div class="alert alert-danger"> <?php echo $addErr ; ?> </div>
                <?php endif; ?>
                <form action="portfolio-item.php" method="POST">
                <div class="mb-3">
                    <label for="inv-image" class="form-control-label">Portfolio Image</label>
                    <input class="form-control" type="file" id="inv-image" name="inv-image" >
                    <?php if ( !empty($imageErr) ): ?>
                        <div class="form-errors"> <?php echo $imageErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="port-title" class="form-label">Portfolio Title</label>
                    <input type="text" class="form-control" id="port-title" name="port-title" value="<?php echo $portTitle ; ?>">
                    <?php if ( !empty($portTitleErr) ): ?>
                      <div class="form-errors"> <?php echo $portTitleErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="port-desc" class="form-label">Portfolio Description</label>
                    <input type="text" class="form-control" id="port-desc" name="port-desc" value="<?php echo $portDesc ; ?>">
                    <?php if ( !empty($portDescErr) ): ?>
                      <div class="form-errors"> <?php echo $portDescErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="port-url" class="form-label">Portfolio Url</label>
                    <input type="text" class="form-control" id="port-url" name="port-url" value="<?php echo $portUrl ; ?>">
                    <?php if ( !empty($portUrlErr) ): ?>
                      <div class="form-errors"> <?php echo $portUrlErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary app-btn" value="Add Portfolio" name="add-portfolio">  
                </div>
                </form>

            </div>
        </div>
    </div>

    </div>



<?php
    include 'footer.php';
?>