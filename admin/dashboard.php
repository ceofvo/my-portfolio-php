<?php
    include 'header.php';
?>
    <!--Dashboard Data-->
    <div class="container app-main">
        <div class="row">
            <div class="col-sm">

                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $totalUsers; ?> </h5>
                    </div>
                </div>

            </div>
            <div class="col-sm">

                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Messages</div>
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $totalMessages; ?> </h5>
                    </div>
                </div>

            </div>
            <div class="col-sm">

                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Portfolio Items</div>
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $totalPortfolioItems; ?> </h5>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
    include 'footer.php';
?>