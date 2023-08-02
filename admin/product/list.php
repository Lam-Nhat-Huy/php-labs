<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản Phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4> <img src="./admin/images/list-1497-svgrepo-com.svg" alt=""> DANH SÁCH SẢN PHẨM</h4>
                <!-- Button trigger modal -->
                <div class="action-btn">
                    <a href="./index.php?pages=category&action=list" class="btn btn-outline-warning">Phân loại</a>
                    <a href="./index.php?pages=product&action=list" class="btn btn-outline-success">Sản Phẩm</a>
                    <a href="./index.php?pages=users&action=list" class="btn btn-outline-primary">Người dùng</a>
                    <a href="./index.php?pages=product&action=add" class="btn btn-outline-danger">Thêm</a>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_product = mysqli_query($conn, "SELECT p.id as id, p.name as name, c.note as category, p.price as price, p.quantity as quantity, p.image as image FROM category c, products p WHERE c.id=p.category_id; ");
                        while ($row = mysqli_fetch_array($select_product)) {
                        ?>
                            <tr style="vertical-align: middle;">
                                <td>
                                    <?= $row['id'] ?>
                                </td>
                                <td>
                                    <?= $row['name'] ?>
                                </td>
                                <td>
                                    <?= $row['category'] ?>
                                </td>
                                <td>
                                    <?= $row['price'] ?>
                                </td>
                                <td>
                                    <?= $row['quantity'] ?>
                                </td>
                                <td>
                                    <img src="./admin/images/<?= $row['image'] ?>" alt="" width="100">
                                </td>

                                <td class="d-flex justify-content-evenly p-4">
                                    <a href="./index.php?pages=product&action=edit&id=<?= $row['id'] ?>" class="btn btn-info btn-sm"><img src="./admin/images/edit-1-svgrepo-com.svg" alt=""></a>
                                    <form action="./index.php?pages=product&action=delete" method="post">
                                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa? ')" type="submit" class="btn btn-danger btn-sm" name="deleteProduct" value="<?= $row['id'] ?>"><img src="./admin/images/delete-2-svgrepo-com.svg" alt=""></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php
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