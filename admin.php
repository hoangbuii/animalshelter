<?php
    session_start();
    include('ketnoi.php');
    $un = $_SESSION['username'];
    
    $result = $conn->query("SELECT thongtintnv.idtnv, thongtintnv.tentnv, thongtintnv.gioitinh, thongtintnv.ngaysinh, ttlienhe.sdt, ttlienhe.email, ttlienhe.diachi, thongtintnv.trangthaihoatdong 
    FROM thongtintnv LEFT JOIN ttlienhe ON thongtintnv.idtnv=ttlienhe.idtnv
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
        <h2>Bạn là quản trị viên</h2>
        <div class="container">
            <table class="tableadmin">

                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái hoạt động</th> 
                </tr>
                <?php
                    while ($rows = $result->fetch_assoc()) {
                        echo "<tr>";
                            echo "<td><img src='avt.png' width ='30' heigh = '30'</td>";
                            echo "<td>".$rows['idtnv']."</td>";
                            echo "<td>".$rows['tentnv']."</td>";
                            if ($rows['gioitinh'] == 1) $gt = 'Nam'; else $gt = 'Nữ';
                            echo "<td>".$gt."</td>";
                            echo "<td>".$rows['ngaysinh']."</td>";
                            echo "<td>".$rows['sdt']."</td>";
                            echo "<td>".$rows['email']."</td>";
                            echo "<td>".$rows['diachi']."</td>";
                            switch ($rows['trangthaihoatdong']) {
                                case 11 :
                                    $tthd = "Online";
                                    break;
                                case 12 :
                                    $tthd = "Đang cứu trợ";
                                    break;
                                case 13 :
                                    $tthd = "Đang bận";
                                    break;
                                case 14 :
                                    $tthd = "Offline";
                                    break;
                                default :
                                    $tthd = "Nghỉ";
                                    break;
                            }
                            echo "<td>".$tthd."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <a href="logout.php"><button>Đăng xuất</button></a>
            <a href="xemthanhvienhoatdong.php"><button>Xem thành viên đang hoạt động</button></a>
            <a href="xemfullchomeo.php"><button>Xem tất cả vật nuôi</button></a>
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