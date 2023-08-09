<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới đơn hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h4>Thêm mới đơn hàng</h4>
        <form action="" method="post" class="row g-3 needs-validation was-validated">

            <div class="col-md-6">
                <label for="username" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" name="username" required>
                <div class="invalid-feedback">
                    Họ tên không được để trống.
                </div>
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="number" class="form-control" name="phone" required>
                <div class="invalid-feedback">
                    Số điện thoại không được để trống.
                </div>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" required>
                <div class="invalid-feedback">
                    Email không được để trống.
                </div>
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="address" required>
                <div class="invalid-feedback">
                    Địa chỉ không được để trống.
                </div>
            </div>
            <div class="col-md-6">
                <label for="note" class="form-label">Ghi chú</label>
                <input type="text" class="form-control" name="note" required>
                <div class="invalid-feedback">
                    Ghi chú không được để trống.
                </div>
            </div>
            <div class="col-md-6">
                <label for="total" class="form-label">Số lượng</label>
                <input type="text" class="form-control" name="total" required>
                <div class="invalid-feedback">
                    Số lượng không được để trống.
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Thể loại</label>
                <select class="form-select" name="user_id" required aria-label=".form-select-sm exampl  e">
                    <?php
                    $select_user_id = mysqli_query($conn, "SELECT * FROM users");
                    if (mysqli_num_rows($select_user_id) > 0) {
                        while ($row = mysqli_fetch_array($select_user_id)) {
                    ?>
                            <option value="<?= $row['id'] ?>"><?= $row['username'] ?> </option>
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
                <a href="/index?pages=order&action=list" type="button" class="btn btn-secondary">Hủy</a>
                <button class="btn btn-success" name="orderBtn">Thêm</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['orderBtn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $total = mysqli_real_escape_string($conn, $_POST['total']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    if (!empty($username) && !empty($phone) && !empty($email) && !empty($address) && !empty($note) && !empty($total) && !empty($user_id)) {
        $query = mysqli_query($conn, "INSERT INTO orders (customer_name, customer_phone, customer_email, customer_address, note, total, user_id) VALUES ('$username', '$phone', '$email', '$address', '$note', '$total', '$user_id')");
        header('Location: ./index.php?pages=order&action=list');
    }
}
?>

<?php ob_end_flush(); ?>