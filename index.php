<?php
include './config/config.php';

if (isset($_GET['pages'])) {
    switch ($_GET['pages']) {

        case 'login':
            include './admin/login.php';
            break;

        case 'users':
            switch ($_GET['action']) {
                case 'list':
                    include './admin/users/list.php';
                    break;
                case 'add':
                    include './admin/users/add.php';
                    break;
                case 'edit':
                    include './admin/users/edit.php';
                    break;
                case 'delete':
                    include './admin/users/delete.php';
                    break;
                default:
                    include './admin/users/list.php';
                    break;
            }
            break;

        case 'product':
            switch ($_GET['action']) {
                case 'list':
                    include './admin/product/list.php';
                    break;
                case 'add':
                    include './admin/product/add.php';
                    break;
                case 'edit':
                    include './admin/product/edit.php';
                    break;
                case 'delete':
                    include './admin/product/delete.php';
                    break;
                default:
                    include './admin/product/list.php';
                    break;
            }
            break;

        case 'category':
            switch ($_GET['action']) {
                case 'list':
                    include './admin/category/list.php';
                    break;
                case 'add':
                    include './admin/category/add.php';
                    break;
                case 'edit':
                    include './admin/category/edit.php';
                    break;
                case 'delete':
                    include './admin/category/delete.php';
                    break;
                default:
                    include './admin/category/list.php';
                    break;
            }
            break;

        case 'order':
            switch ($_GET['action']) {
                case 'list':
                    include './admin/order/list.php';
                    break;
                case 'add':
                    include './admin/order/add.php';
                    break;
                case 'edit':
                    include './admin/order/edit.php';
                    break;
                case 'delete':
                    include './admin/order/delete.php';
                    break;
                default:
                    include './admin/order/list.php';
                    break;
            }
            break;

        case 'home':
            switch ($_GET['action']) {
                case 'home':
                    include './product/home.php';
                    break;
                case 'detail':
                    include './product/product_detail.php';
                    break;
                default:
                    include './product/homep.php';
                    break;
            }
            break;
        default:
            break;
    }
}
