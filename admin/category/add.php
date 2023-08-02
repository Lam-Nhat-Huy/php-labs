<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h4>Thêm mới người dùng</h4>
        <form method="post" class="row g-3 needs-validation was-validated">
            <div class="col-md-12">
                <label for="username" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="username" required>
                <div class="invalid-feedback">
                    Sản phẩm không được để trống.
                </div>
            </div>
            <div class="col-md-12">
                <label for="note" class="form-label">Ghi chú</label>
                <input type="text" class="form-control" name="note" required>
                <div class="invalid-feedback">
                    Ghi chú không được để trống.
                </div>
            </div>
            <div class="col-12">
                <a href="/index?pages=users&action=list" type="button" class="btn btn-secondary">Hủy</a>
                <button class="btn btn-success" name="addCategory">Thêm</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>


<?php
if (isset($_POST['addCategory'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);


    if (!empty($username) && !empty($note)) {
        $query = mysqli_query($conn, "INSERT INTO category (name, note) VALUES ('$username', '$note')");
        header('Location: ./index.php?pages=category&action=list');
        mysqli_close($conn);
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Thêm mới không thành công!
            </div>';
    }
}
?>
<?php ob_end_flush(); ?>