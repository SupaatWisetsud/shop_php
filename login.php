<?php 

    if(isset($_SESSION['user_id'])) header("Location: index.php");

    session_start();
    require './connect.php';

    if(isset($_POST['btn_submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tb_member WHERE username = '$username' AND password = '$password' LIMIT 1 ";

        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result)){
            //ล็อกอินผ่าน
            $_SESSION["user_id"] = mysqli_fetch_assoc($result)["id"];

            header("Location: index.php");

        }else{
            //ล็อกอินไม่ผ่าน
            echo "<script>alert('Username หรือ Password ท่านไม่ถูกต้อง!')</script>";
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
</head>
<body>
    <h1>จัดทำโดย นาย ศุภอรรถ วิเศษสุด</h1>
    <h1>เปิดเป็น Open source ให้เพื่อนๆโหลดไปใช้ได้แล้วนะครับ</h1>
    <h1>ล็อกอินอยู่ตรงนี่นะ...</h1>
    <h1>
        <pre>
            |
            |
            |
            V
        </pre>
    </h1>
    <form method="post">
        <div>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="btn_submit">Sign in</button>
        </div>
    </form>
</body>
</html>
<?php 
    mysqli_close($con);
?>