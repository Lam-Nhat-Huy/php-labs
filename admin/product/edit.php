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
        $user_id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$user_id'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <form method="post" class="row g-3 needs-validation was-validated" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?= $row['id'] ?>">

                <div class="col-md-6">
                    <label for="username" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="username" required value="<?= $row['name'] ?>">
                    <div class="invalid-feedback">
                        Họ tên không được để trống.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" class="form-control" name="price" required value="<?= $row['price'] ?>">
                    <div class="invalid-feedback">
                        Giá không được để trống.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="quantity" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" name="quantity" required value="<?= $row['quantity'] ?>">
                    <div class="invalid-feedback">
                        Số lượng không được để trống.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Mô tả</label>
                    <input type="text" class="form-control" name="description" required value="<?= $row['description'] ?>">
                    <div class="invalid-feedback">
                        Mô tả không được để trống.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" name="image" required value="<?= $row['image'] ?>">
                    <div class="invalid-feedback">
                        Hình ảnh không được để trống.
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="form-label">Category</label>
                    <input type="number" class="form-control" name="category_id" required value="<?= $row['category_id'] ?>">
                    <div class="invalid-feedback">
                        Id phân loại không được để trống.
                    </div>
                </div>


                <div class="col-12">
                    <a href="/index?pages=product&action=list" type="button" class="btn btn-secondary">Hủy</a>
                    <button class="btn btn-success" name="editProduct">Lưu</button>
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
if (isset($_POST['editProduct'])) {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $category_id = $_POST['category_id'];

    $query = mysqli_query($conn, "UPDATE products SET name='$username', price='$price', quantity='$quantity', description='$description', image='$image', category_id='$category_id' WHERE id='$user_id'");
    if ($query) {
        header('Location: ./index.php?pages=product&action=list');
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Chỉnh sửa không thành công!
            </div>';
    }
}
?>

<?php ob_end_flush(); ?>