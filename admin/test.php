if ( !isset($_SESSION['id'])) {
    header('location:'. BASE_URL . '/login.php');
    exit();
}


if ( isset( $_GET['logout'] ) ) {
    session_destroy();
    unset( $_SESSION['id'] );
    header('location:'. BASE_URL . '/login.php');
    exit();
}