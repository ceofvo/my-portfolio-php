<?php
    include 'header.php';
    include 'includes/portfolio-controllers.php';
    if ( !isset($_SESSION['id']) ) {
        header('location: login.php');
        exit();
    }

    //unset success message after deleting item
    if( isset($_SESSION['timeout']) ) {
        if (  time() > ($_SESSION['timeout'] + 3 )){
            unset($_SESSION['success']);
            unset($_SESSION['timeout']);
        } 
    }
?>
    <!--Display All Portfolio Items in a table format-->
    <div class="container app-main-inner">
        <h1 class="text-center mt-5">All Portfolio Items</h1>
        <div class="row justify-content-center">
            <div class="col-sm-4 text-center">
                <a href="add-portfolio-item.php" class="btn btn-primary">+ Add New Project Item</a>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-sm-4 my-3">
            <?php if ( isset($_SESSION['success']) ): ?>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $_SESSION['success']; ?>
                </div>
            <?php endif; ?>
            </div>
        </div>

        <div class="row">
        <?php while ( $row = $result->fetch_assoc() ): ?>  
            <div class="col-sm-4 mb-5">
            <div class="card portfolio-card">
                <img src="../assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                    <p class="card-text"><?php echo $row['description']; ?></p>
                    <a href="<?php echo $row['url']; ?>" class="btn btn-primary" target="_blank">View Project</a>
                </div>
                <hr>
                <div class="card-body">
                    <a href="edit-portfolio-item.php?editid=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit </a>
                    <a href="includes/delete-controllers.php?delid=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</a>
                </div>
            </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
<?php
    include 'footer.php';
?>