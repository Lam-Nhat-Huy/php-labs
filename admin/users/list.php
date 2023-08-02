<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Người dùng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4> <img src="./admin/images/list-1497-svgrepo-com.svg" alt=""> DANH SÁCH NGƯỜI DÙNG</h4>
                <!-- Button trigger modal -->
                <div class="action-btn">
                    <a href="./index.php?pages=category&action=list" class="btn btn-outline-warning">Phân loại</a>
                    <a href="./index.php?pages=product&action=list" class="btn btn-outline-success">Sản Phẩm</a>
                    <a href="./index.php?pages=users&action=list" class="btn btn-outline-primary">Người dùng</a>
                    <a href="./index.php?pages=users&action=add" class="btn btn-outline-danger">Thêm</a>
                    <a href="./admin/login.php" class="btn btn-outline-dark" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất? ')">Đăng xuất</a>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Căn cước công dân</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Chức vụ</th>

                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_user = mysqli_query($conn, 'SELECT * FROM `users`  ORDER BY `username` DESC ');
                        if (mysqli_num_rows($query_user) > 0) {
                            while ($fetch_user = mysqli_fetch_array($query_user)) {
                        ?>
                                <tr style="vertical-align: middle;">
                                    <td>
                                        <?= $fetch_user['id'] ?>
                                    </td>
                                    <td>
                                        <?= $fetch_user['username'] ?>
                                    </td>
                                    <td>
                                        <?= $fetch_user['email'] ?>
                                    </td>
                                    <td>
                                        <?= $fetch_user['phone'] ?>
                                    </td>
                                    <td>
                                        <?= $fetch_user['address'] ?>
                                    </td>
                                    <td>
                                        <?= $fetch_user['cccd'] ?>
                                    </td>
                                    <td>
                                        <?= $fetch_user['gender'] ?>
                                    </td>
                                    <td>
                                        <?= $fetch_user['date'] ?>
                                    </td>
                                    <td>
                                        <?= $fetch_user['role_id'] == 1 ? 'Quản Trị (Admin)' : 'Khách hàng (User)' ?>
                                    </td>

                                    <td class="d-flex justify-content-evenly">
                                        <a href="./index.php?pages=users&action=edit&id=<?= $fetch_user['id'] ?>" class="btn btn-info btn-sm"><img src="./admin/images/edit-1-svgrepo-com.svg" alt=""></a>
                                        <form action="./index.php?pages=users&action=delete" method="post">
                                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa? ')" type="submit" class="btn btn-danger btn-sm" name="deleteUser" value="<?= $fetch_user['id'] ?>"><img src="./admin/images/delete-2-svgrepo-com.svg" alt=""></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>