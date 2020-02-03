<?php
require_once './connect.php';
session_start();

if (isset($_GET['update']) && isset($_GET['id'])) {
    
    $id = $_GET['id'];

    if ($_GET['op'] == '-') {
        $_SESSION['cart'][$id]['count'] = (int)$_SESSION['cart'][$id]['count'] - 1 ;
        $_SESSION['cart'][$id]['total'] = (int)$_SESSION['cart'][$id]['count'] * (int) $_SESSION['cart'][$id]['price'];
        
        if((int)$_SESSION['cart'][$id]['count'] == 0){
            unset($_SESSION['cart'][$id]);
        }

    } else{

        $_SESSION['cart'][$id]['count'] = 1 + (int)$_SESSION['cart'][$id]['count'];
        $_SESSION['cart'][$id]['total'] = (int)$_SESSION['cart'][$id]['count'] * (int) $_SESSION['cart'][$id]['price'];
    }

    header("Location: basket.php");
}

if (isset($_GET['delete']) && isset($_GET['id'])) {

    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    header("Location: basket.php");
}

if (isset($_GET['delete_all'])) {

    unset($_SESSION['cart']);
    header("Location: basket.php");
}

if (isset($_GET['confrim'])) {

    $orderJSON = json_encode($_SESSION['cart']);
    $sql = "INSERT INTO tb_order(product_order) VALUE ('$orderJSON') ";

    $insert_order = mysqli_query($con, $sql);

    if (true) {
        unset($_SESSION['cart']);
        echo "
        <script>
            if(confirm('สั่งซื้อสินค้าเสร็จสิ้น')) location.replace = 'basket.php'
            else location.replace = 'basket.php'
        </script>";
    } else {
        echo "<script>alert('สั่งซื้อสินค้าผิดพลาด')</script>";
        header("Location: basket.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        .list-member {
            padding: 20px;
            background-color: #333;
            text-align: center;

            border-radius: 5px;
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include_once("./menu.php") ?>
        <div>
            <h1 style="color: #333">ตะกร้าสินค้า</h1>
        </div>
        <div class="list-member">
            <table style="margin: 0 auto; width: 80%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา/ชิ้นละ</th>
                        <th>ราคารวม</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($_SESSION["cart"])) : ?>
                        <?php foreach ($_SESSION["cart"] as $key => $value) : ?>
                            <form method="get">
                                <tr>
                                    <td><?= $key ?></td>
                                    <td><?= $value["name"] ?></td>
                                    <td style="display: flex; justify-content: space-around; align-items: center">

                                        <a href="?id=<?= $value['id'] ?>&op=-&update" class="btn danger"> - </a>
                                        <p><?= $value["count"] ?></p>
                                        <a href="?id=<?= $value['id'] ?>&op=+&update" class="btn success"> + </a>

                                    </td>
                                    <td><?= $value['price'] ?></td>
                                    <td><?= $value['total'] ?></td>
                                    <td>
                                        <a href="?delete&id=<?= $value['id'] ?>" class="btn danger">ลบ</a>
                                    </td>
                                </tr>
                            </form>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div style="margin-top: 10px">
                <a href="?confrim" class="btn success">ยืนยันการสั่งซื้อ</a>
                <a href="?delete_all" class="btn danger">ยกเลิกรายการ</a>
            </div>
        </div>
    </div>
</body>

</html>
<?php 
    mysqli_close($con);
?>