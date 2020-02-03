<?php
require './connect.php';
session_start();

$sql = "SELECT * FROM tb_order";

$result = mysqli_query($con, $sql);

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
        .list-order {
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
        <?php include_once './menu.php' ?>
        <div>
            <h1 style="color: #333">รายการการสั่งซื้อ</h1>
        </div>
        <div class="list-order">

            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <p style="color: white; margin-top: 5px"><?= $row['id'] ?>. รายการวันที่ <?= $row['date_order'] ?></p>
                <table style="margin: 0 auto; width: 80%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ชื่อสินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา/ชิ้นละ</th>
                            <th>ราคารวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $order = json_decode($row['product_order']);
                            foreach($order as $key => $value):
                        ?>
                        <tr>
                            <td><?= $value->id ?></td>
                            <td><?= $value->name ?></td>
                            <td><?= $value->count ?></td>
                            <td><?= $value->price ?></td>
                            <td><?= $value->total ?></td>
                        </tr>
                        <?php 
                            endforeach;
                        ?>
                    </tbody>
                </table>
            <?php endwhile; ?>


        </div>

    </div>
</body>

</html>
<?php 
    mysqli_close($con);
?>