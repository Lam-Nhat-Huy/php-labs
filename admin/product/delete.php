<?php
if (isset($_POST['deleteProduct'])) {
    $user_id = $_POST['deleteProduct'];
    $query = "DELETE FROM products WHERE id = $user_id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        header('Location: ./index.php?pages=product&action=list');
    }
}
