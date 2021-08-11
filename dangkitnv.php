<?php

    session_start();
    include('ketnoi.php');
    $un = $_SESSION['username'];

    $result = $conn->query("SELECT * FROM thongtintnv WHERE tendangnhap='$un'");
    $row = mysqli_fetch_assoc($result);
    $idtnv = $row['idtnv'];

    header('Content-Type: text/html; charset=UTF-8');

    $ca1 = $_POST['txtC1'];
    $ca2 = $_POST['txtC2'];
    $ca3 = $_POST['txtC3'];
    $ca4 = $_POST['txtC4'];
    $ca5 = $_POST['txtC5'];
    $ca6 = $_POST['txtC6'];
    $ca7 = $_POST['txtC7'];
    $ca8 = $_POST['txtC8'];
    $ca9 = $_POST['txtC9'];
    $ca10 = $_POST['txtC10'];
    $ca11 = $_POST['txtC11'];
    $ca12 = $_POST['txtC12'];   
             
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Đang xử lí</title>
        <link type="text/css" rel="stylesheet" href="form.css"/>
        <script src="https://kit.fontawesome.com/6854c68889.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1 class="logo">
     		<i class="fas fa-dog"></i>
     		Animal Shelter
        </h1>
        <div class="container">
            <?php
                if (!$ca1 && !$ca2 && !$ca3 && !$ca4 && !$ca5 && !$ca6 && !$ca7 && !$ca8 && !$ca9 && !$ca10 && !$ca11 && !$ca12){
                    echo "<p>Hãy nhập ít nhất một ca làm việc</p> <a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }

                $count = 0;

                $result = $conn->query("INSERT INTO tnv(idtnv)
                VALUES ($idtnv)");

                if($ca1){
                    $result = $conn->query("UPDATE tnv
                    SET ca1=$ca1
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca2){
                    $result = $conn->query("UPDATE tnv
                    SET ca2=$ca2
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca3){
                    $result = $conn->query("UPDATE tnv
                    SET ca3=$ca3
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca4){
                    $result = $conn->query("UPDATE tnv
                    SET ca4=$ca4
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca5){
                    $result = $conn->query("UPDATE tnv
                    SET ca5=$ca5
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca6){
                    $result = $conn->query("UPDATE tnv
                    SET ca6=$ca6
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca7){
                    $result = $conn->query("UPDATE tnv
                    SET ca7=$ca7
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca8){
                    $result = $conn->query("UPDATE tnv
                    SET ca8=$ca8
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca9){
                    $result = $conn->query("UPDATE tnv
                    SET ca9=$ca9
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca10){
                    $result = $conn->query("UPDATE tnv
                    SET ca10=$ca10
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca11){
                    $result = $conn->query("UPDATE tnv
                    SET ca11=$ca11
                    WHERE idtnv=$idtnv");
                    $count++;
                }

                if($ca12){
                    $result = $conn->query("UPDATE tnv
                    SET ca12=$ca12
                    WHERE idtnv=$idtnv");
                    $count++;
                }
                echo "<p>Bạn đã đăng kí $count ca làm việc.</p> <a href='xulicapnhat.php'><button>Thử lại</button></a>"
            ?>
        </div>
        <footer>
            <div class="footer_cont center_row">
                <p>2021 &copy Animal Rescue</p>
                <div>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
                
            </div>
        </footer>
    </body>
</html>