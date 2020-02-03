<?php if(!isset($_SESSION['user_id'])) header("Location: login.php"); ?>
<style>
    .menu {
        margin: 10px 0;
        background-color: #3498DB;
        border-radius: 5px;
        padding: 0 10px;
        box-shadow: 2px 2px 3px rgba(0,0,0,0.3);
        display: flex;
        justify-content: space-between
    }

    .menu > ul > a {
        text-decoration: none;
    }

    .menu > ul  a > li {
        display: inline-block;
        list-style: none;
        padding: 15px;
        color: white;
        transition: all .1s ease-in;
    }
    .menu > ul > a > li:hover{
        background-color: #2874A6;
        text-shadow: 2px 2px 8px white;
    }
</style>
<nav class="menu">
    <ul>
        <a href="index.php">
            <li>หน้าหลัก</li>
        </a>
        <a href="member.php">
            <li>
                รายชื่อสมาชิกของร้าน
            </li>
        </a>
        <a href="basket.php">
            <li>
                ตะกร้าสินค้า
            </li>
        </a>
        <a href="order.php">
            <li>
                รายการสั่งซื้อสินค้า
            </li>
        </a>
    </ul>
    <ul>
        <a href="logout.php">
            <li>ออกจากระบบ</li>
        </a>
    </ul>
</nav>