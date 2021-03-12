<?php
    include 'header.php';
    include 'includes/portfolio-controllers.php';
    if ( !isset($_SESSION['id']) ) {
        header('location: login.php');
        exit();
    }
?>
    <!--Login Form Section-->
    <div class="container app-main-inner">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <h1 class="text-center">Edit Portfolio Item</h1>
                <?php if ( !empty($successMessage) ): ?>
                    <div class="form-success alert alert-success"> <?php echo $successMessage; ?> </div>
			    <?php endif; ?>
                <?php if ( !empty($addErr) ): ?>
                    <div class="alert alert-danger"> <?php echo $addErr ; ?> </div>
                <?php endif; ?>
                <form action="edit-portfolio-item.php?editid=<?php echo $_GET['editid']; ?>" method="POST" enctype="multipart/form-data">

                <div class="mb-3 portfolio-edit">
                    <p>Existing Portfolio image</p>
                    <img src="../assets/img/<?php echo $image; ?>" alt="<?php echo $portTitle ; ?>">
                </div>
                <input type="hidden" name="portfolio-id" value="<?php echo $portfolioId ;?>">
                <input type="hidden" name="port-image-curr" value="<?php echo $image ;?>">
                <div class="mb-3">
                    <label for="port-image" class="form-label">Upload New Portfolio Image</label>
                    <input class="form-control" type="file" id="port-image" name="port-image"  >
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
                    <textarea id="port-desc" class="form-control" rows="5" name="port-desc" ><?php echo $portDesc ; ?></textarea>
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
                    <input type="submit" class="btn btn-primary app-btn" value="Update Portfolio" name="edit-portfolio">  
                </div>
                </form>

            </div>
        </div>
    </div>

    </div>



<?php
    include 'footer.php';
?>