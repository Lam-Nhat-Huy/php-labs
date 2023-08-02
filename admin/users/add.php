<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới người dùng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h4>Thêm mới người dùng</h4>
        <form method="post" class="row g-3 needs-validation was-validated">
            <div class="col-md-6">
                <label for="role_id" class="form-label">Phân quyền</label>
                <select class="form-select" name="role_id" required aria-label=".form-select-sm example">
                    <!-- <option>Vui lòng chọn loại người dùng</option> -->
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="username" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" name="username" required>
                <div class="invalid-feedback">
                    Họ tên không được để trống.
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
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="number" class="form-control" name="phone" required>
                <div class="invalid-feedback">
                    Số điện thoại không được để trống.
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
                <label for="cccd" class="form-label">CCCD</label>
                <input type="number" class="form-control" name="cccd" required>
                <div class="invalid-feedback">
                    Cccd không được để trống.
                </div>
            </div>
            <div class="col-md-6">
                <label for="gender" class="form-label">Giới tính</label>
                <select class="form-select" name="gender" required aria-label=".form-select-sm example">
                    <option>Nam</option>
                    <option>Nữ</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="date" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" name="date" required>
                <div class="invalid-feedback">
                    Ngày sinh không được bỏ trống.
                </div>
            </div>
            <div class="col-md-12">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" name="password" required>
                <div class="invalid-feedback">
                    Mật khẩu không được bỏ trống.
                </div>
            </div>
            <div class="col-12">
                <a href="/index?pages=users&action=list" type="button" class="btn btn-secondary">Hủy</a>
                <button class="btn btn-success" name="addUser">Thêm</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>


<?php
if (isset($_POST['addUser'])) {
    $role_id = mysqli_real_escape_string($conn, $_POST['role_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $cccd = mysqli_real_escape_string($conn, $_POST['cccd']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($username) && !empty($email) && !empty($phone) && !empty($address) && !empty($cccd) && !empty($gender) && !empty($password) && !empty($role_id)) {
        $query = mysqli_query($conn, "INSERT INTO users (role_id, username, email, phone, address, cccd, gender, date, password) VALUES ('$role_id', '$username', '$email', '$phone', '$address', '$cccd', '$gender', '$date', '$password')");
        header('Location: ./index.php?pages=users&action=list');
        mysqli_close($conn);
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Thêm mới không thành công!
            </div>';
    }
}
?>
<?php ob_end_flush(); ?>