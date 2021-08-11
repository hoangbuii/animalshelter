<?php 
    session_start();
    include('ketnoi.php');
    $un = $_SESSION['username'];


    $result = $conn->query("SELECT * FROM thongtintnv WHERE tendangnhap='$un'");
    $row = mysqli_fetch_array($result);
    $idtnv = $row["idtnv"];

    $result = $conn->query("SELECT * FROM thongtinvn WHERE idtnv=$idtnv");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Xem vật nuôi đã cứu trợ</title>
        <link type="text/css" rel="stylesheet" href="form.css"/>
        <script src="https://kit.fontawesome.com/6854c68889.js" crossorigin="anonymous"></script>
    </head>
    <style>
        table, td, th {
            border: 1px solid violet;
        }
        table {
            border-collapse: collapse;
            width:100%;
            margin: 5px;
        }
        td, th {
            padding: 7px;
            text-align:center;
            vertical-align: bottom;
        }
        th{
            background-color: grey;
            color: white;
        }
        tr:nth-child(even) {background-color: #edb7f8;}
        tr:nth-child(odd) {background-color: #e674fd;}
    </style>
    <body>
        
        <h1 class="logo">
     		<i class="fas fa-dog"></i>
     		Animal Shelter
        </h1>
        <h2>Vật nuôi đã được bạn cứu trợ</h2>
        <div class="container">
            <table class="tablevn">
                <tr>
                    <th></th>
                    <th>ID vật nuôi</th>
                    <th>Tên vật nuôi</th>
                    <th>Tuổi (tháng)</th>
                    <th>Loài vật nuôi</th>
                    <th>Ngày cứu trợ</th>
                    <th>Tình trạng</th>
                    <th>Ảnh động vật</th>
                </tr>
                <?php
                    while ($rows = $result->fetch_assoc()) {
                        echo "<tr>";
                            echo "<td><img src='ani.png' width ='30' heigh = '30'/></td>";
                            echo "<td>".$rows['idvatnuoi']."</td>";
                            echo "<td>".$rows['tenvatnuoi']."</td>";
                            echo "<td>".$rows['tuoi']."</td>";
                            switch ($rows['loaivat']) {
                                case 1 :
                                    $lv = "Chó";
                                    break;
                                case 2 :
                                    $lv = "Mèo";
                                    break;
                                case 3 :
                                    $lv = "Thỏ";
                                    break;
                                case 4 :
                                    $lv = "Chim";
                                    break;
                                case 5 :
                                    $lv = "Cá";
                                    break;
                                default :
                                    $lv = "Loài Khác";
                                    break;
                            }
                            echo "<td>".$lv."</td>";
                            echo "<td>".$rows['ngaycuutro']."</td>";
                            switch ($rows['tinhtrang']) {
                                case 1 :
                                    $lv = "Chưa cứu trợ";
                                    break;
                                case 2 :
                                    $lv = "Tại trung Tâm";
                                    break;
                                case 3 :
                                    $lv = "Đang cứu trợ";
                                    break;
                                case 4 :
                                    $lv = "Đã nhận nuôi";
                                    break;
                                default :
                                    $lv = "Đã mất";
                                    break;
                            }
                            echo "<td>".$lv."</td>";
                            echo "<td><img src='".$rows['anhvatnuoi']."' width = '200px' /></td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <a href='cuutro.php'><button>Cứu trợ động vật</button></a>
            <a href='javascript: history.go(-1)'><button>Trở lại</button></a>
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