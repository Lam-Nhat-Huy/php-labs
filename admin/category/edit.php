<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h4>Chỉnh sửa sản phẩm</h4>
        <?php
        $category_id = mysqli_real_escape_string($conn, $_GET['id']);
        $query = mysqli_query($conn, "SELECT * FROM category WHERE id = '$category_id'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <form method="post" action="" class="row g-3 needs-validation was-validated">
                <input type="hidden" name="category_id" value="<?= $row['id'] ?>">
                <div class="col-md-12">
                    <label for="username" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="username" required value="<?= $row['name'] ?>">
                    <div class="invalid-feedback">
                        Sản phẩm không được để trống.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="note" class="form-label">Ghi chú</label>
                    <input type="text" class="form-control" name="note" required value="<?= $row['note'] ?>">
                    <div class="invalid-feedback">
                        Ghi chú không được để trống.
                    </div>
                </div>
                <div class="col-12">
                    <a href="/index?pages=category&action=list" type="button" class="btn btn-secondary">Hủy</a>
                    <button class="btn btn-success" type="submit" name="editCategory">Lưu</button>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<?php
if (isset($_POST['editCategory'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);

    $update_time = date('Y-m-d H:i:s');
    date_default_timezone_set('Asia/Ho_Chi_Minh');


    $query = mysqli_query($conn, "UPDATE category SET name='$username', note='$note', update_at='$update_time' WHERE id='$category_id'");
    if ($query) {
        header('Location: ./index.php?pages=category&action=list');
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Chỉnh sửa không thành công!
            </div>';
    }
}
?>

<?php ob_end_flush(); ?>