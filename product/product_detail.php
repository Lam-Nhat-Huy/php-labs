<?php
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $row = mysqli_fetch_array($sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="/product/css/main.css">

</head>

<body>

    <div class="container">

        <div class="card">
            <a href="./index.php?pages=home&action=home" class="btn btn-danger btn-sm">Trở về</a>
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                <img src="/admin/images/<?= $row['image'] ?>" alt="" width="200" style="margin-left: -10px;">
                            </div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM products WHERE category_id=" . $row['category_id']);
                            if (mysqli_num_rows($sql) > 0) {
                                while ($rows = mysqli_fetch_array($sql)) {
                            ?>
                                    <li><a data-target="#pic-5" data-toggle="tab"><img src="/admin/images/<?= $rows['image'] ?>" /></a></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title"><?= $row['name'] ?></h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <p class="product-description"><?= $row['description'] ?></p>
                        <h4 class="price">Giá : <span><?= $row['price'] ?></span></h4>
                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="button">Thêm vào giỏ hàng</button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>