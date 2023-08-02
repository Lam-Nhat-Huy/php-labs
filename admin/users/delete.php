<?php
if (isset($_POST['deleteUser'])) {
    $user_id = $_POST['deleteUser'];
    $query = "DELETE FROM users WHERE id = $user_id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        header('Location: ./index.php?pages=users&action=list');
    }
}
