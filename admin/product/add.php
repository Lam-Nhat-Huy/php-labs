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
        <h4>Thêm mới sản phẩm</h4>
        <form method="post" class="row g-3 needs-validation was-validated" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="username" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="username" required>
                <div class="invalid-feedback">
                    Họ tên không được để trống.
                </div>
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">Giá</label>
                <input type="number" class="form-control" name="price" required>
                <div class="invalid-feedback">
                    Giá không được để trống.
                </div>
            </div>
            <div class="col-md-6">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" class="form-control" name="quantity" required>
                <div class="invalid-feedback">
                    Số lượng không được để trống.
                </div>
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" id="" cols="84" rows="2"></textarea>
                <div class="invalid-feedback">
                    Mô tả không được để trống.
                </div>
            </div>
            <div class="col-md-12">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" name="image" required>
                <div class="invalid-feedback">
                    Hình ảnh không được để trống.
                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label">Thể loại</label>
                <select class="form-select" name="category_id" required aria-label=".form-select-sm exampl  e">
                    <?php
                    $select_category_id = mysqli_query($conn, "SELECT * FROM category");
                    if (mysqli_num_rows($select_category_id) > 0) {
                        while ($row = mysqli_fetch_array($select_category_id)) {
                    ?>
                            <option value="<?= $row['id'] ?>"><?= $row['note'] ?> </option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <div class="invalid-feedback">
                    Thể loại không được để trống.
                </div>

            </div>


            <div class="col-12">
                <a href="/index?pages=product&action=list" type="button" class="btn btn-secondary">Hủy</a>
                <button class="btn btn-success" name="addProduct">Thêm</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>


<?php
if (isset($_POST['addProduct'])) {
    $username = $_POST['username'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $category_id = $_POST['category_id'];

    if (!empty($username) && !empty($price) && !empty($quantity) && !empty($description)  && !empty($image) && !empty($category_id)) {
        $query = mysqli_query($conn, "INSERT INTO products (name, price, quantity, description, image, category_id) VALUES ('$username', '$price', '$quantity', '$description', '$image', '$category_id') ");
        header('Location: ./index.php?pages=product&action=list');
        mysqli_close($conn);
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Thêm mới không thành công!
            </div>';
    }
}
?>
<?php ob_end_flush(); ?>