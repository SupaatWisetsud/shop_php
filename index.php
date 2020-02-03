<?php
require './connect.php';
session_start();

$sql = "SELECT * FROM tb_product";
$result = mysqli_query($con, $sql);


if (isset($_GET['id']) && $_GET['id'] != '') {

    $id = $_GET['id'];
    $name = $_GET['name'];
    $price = $_GET['price'];

    if (isset($_SESSION["cart"][$id])) {

        $_SESSION["cart"][$id]['count'] = 1 + (int) $_SESSION["cart"][$id]['count'];
        $_SESSION["cart"][$id]['total'] = (int) $_SESSION["cart"][$id]['count'] * (int) $_SESSION["cart"][$id]['price'];

        header("Location: basket.php");
    } else {

        $_SESSION["cart"][$id]['id'] = $id;
        $_SESSION["cart"][$id]['name'] = $name;
        $_SESSION["cart"][$id]['count'] = 1;
        $_SESSION["cart"][$id]['price'] = $price;
        $_SESSION["cart"][$id]['total'] = $price;

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
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Document</title>
    <style>
        .show-product {
            background-color: #333;
            padding: 10px 20px;
            display: flex;
            flex-wrap: wrap;
            border-radius: 5px;
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);
        }

        .product {
            margin: 10px 23px;
            width: 300px;
            height: 350px;
            background-color: white;
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            border-radius: 5px
        }
        .click {
            text-decoration: none;
            color: #DC7633;
        }
        .click:hover{
            text-shadow: 2px 2px 8px #DC7633
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include_once("./menu.php") ?>
        <div>
            <h1 style="color: #333">หน้าแรก</h1>
        </div>
        <div class="show-product">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="product">
                    <img src="<?= $row['img'] ?>" alt="<?= $row['name'] ?>" width="100%" height="70%">
                    <div style="text-align: center">
                        <p style="font-size: 18px; word-wrap: break-word">
                            <?= $row['name'] ?>
                        </p>
                        <p>ราคา <?= $row['price'] ?> บาท</p>
                    </div>
                    <div style="text-align: end">
                        <a href="?id=<?= $row['id'] ?>&name=<?= $row['name'] ?>&price=<?= $row['price'] ?>" class="click">หยิบใส่ตระกร้า - > </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>
<?php 
    mysqli_close($con);
?>