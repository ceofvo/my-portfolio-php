<?php
    include 'header.php';
    include 'includes/message-controllers.php';
    if ( !isset($_SESSION['id']) ) {
        header('location: login.php');
        exit();
    }
?>
    <!--Display All Messages in a table format-->
    <div class="container app-main-inner">
    <h1 class="text-center my-5">All Messages</h1>
        <table class="table table-success table-striped mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fullname</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
            </tr>
            </thead>
            <tbody>
            <?php while ( $row = $result->fetch_assoc() ): ?>                
            <tr>
                <td><?php echo $tableNum ; ?></td>
                <td><?php echo $row['fullname'] ; ?></td>
                <td><?php echo $row['email'] ; ?></td>
                <td><?php echo $row['phone_no'] ; ?></td>
                <td><?php echo $row['subject'] ; ?></td>
                <td><?php echo $row['message_body'] ; ?></td>
            </tr>
            <?php $tableNum++; ?>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>



<?php
    include 'footer.php';
?>