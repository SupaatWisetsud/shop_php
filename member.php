<?php 
    require "./connect.php";
    session_start();
    
    $sql = "SELECT * FROM tb_member ";

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
        .list-member{
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
            <h1 style="color: #333">รายชื่อสมาชิก</h1>
        </div>
        <div class="list-member">
            <table style="margin: 0 auto; width: 80%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ชื่อ</th>
                        <th>อีเมลล์</th>
                        <th>เบอร์โทรศัพ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php 
    mysqli_close($con);
?>