<?php
    session_start();
    include('ketnoi.php');
    $un = $_SESSION['username'];
    $now = date("H");
    $now = ($now + 5 ) % 24;
    $now = $now / 2;
    floor($now);
    $ca = $now + 1;

    
    $result = $conn->query("SELECT thongtintnv.idtnv, thongtintnv.tentnv, tnv.ca$ca
    FROM thongtintnv LEFT JOIN tnv ON thongtintnv.idtnv=tnv.idtnv
    WHERE thongtintnv.idtnv != 1000 AND thongtintnv.idtnv != 1001 AND thongtintnv.idtnv != 1002");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
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
        <h2>Hiện đang là ca <?php echo $ca; ?></h2>
        <div class="container">
            <table class="tableadmin">

                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Công việc đang làm</th>
                </tr>
                <?php
                    while ($rows = $result->fetch_assoc()) {
                        if ($rows["ca$ca"]){
                            echo "<tr>";
                                echo "<td><img src='avt.png' width ='30' heigh = '30'/></td>";
                                echo "<td>".$rows['idtnv']."</td>";
                                echo "<td>".$rows['tentnv']."</td>";
                                switch ($rows["ca$ca"]) {

                                    case 1 :
                                        $tthd = "Trực tại trung tâm";
                                        break;
                                    case 2 :
                                        $tthd = "Chăm sóc động vật";
                                        break;
                                    case 3 :
                                        $tthd = "Tìm động vật thất lạc";
                                        break;
                                    case 4 :
                                        $tthd = "Vận chuyển vật nuôi";
                                        break;
                                    case 5 :
                                        $tthd = "Đặt lịch khám";
                                        break;
                                    default :
                                        $tthd = "Đăng bài quảng cáo";
                                        break;
                                }
                                echo "<td>".$tthd."</td>";
                            echo "</tr>";
                        }
                    }
                
                ?>
            </table>
            <a href="logout.php"><button>Đăng xuất</button></a>
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