<?php
if (isset($_POST['deleteCategory'])) {
    $category_id = $_POST['deleteCategory'];
    $query = "DELETE FROM category WHERE id = $category_id";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        header('Location: ./index.php?pages=category&action=list');
    }
}
