<?php
require_once "../config/config.php"
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Lab 5</title>
</head>

<body>

    <div class="container">

        <div class="login-box">
            <?php
            if (isset($_POST['btnLogin'])) {
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'");
                if (mysqli_num_rows($select) > 0) {
                    header('Location: /index.php?pages=users&action=list');
                } else {
                    header('Location: login.php');
                }
            }
            ?>


            <h1 class="mb-5">Login</h1>
            <form action="" method="POST">
                <input class="form-control" type="text" placeholder="Nhập Tài Khoản" name="email"><br>
                <input class="form-control" type="password" placeholder="Nhập Mật Khẩu" name="password"><br>
                <button class="btn btn-success" type="submit" name="btnLogin">Đăng Nhập</button>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>





</body>

</html>