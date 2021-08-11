<?php 
    session_start();
    include('ketnoi.php');
    $un = $_SESSION['username'];


    $result = $conn->query("SELECT * FROM thongtintnv WHERE tendangnhap='$un'");
    $row = mysqli_fetch_array($result);

    $idtnv = $row["idtnv"];
    $ten = $row["tentnv"];
    $gioitinh = $row["gioitinh"];
    if ($gioitinh == 1) {
        $gioitinh = "Nam";
    }else{
        $gioitinh = "Nữ";
    }
    $ngaysinh = $row["ngaysinh"];
    $sdt = $row["sdt"];
    $email = $row["email"];
    $tthd = $row["trangthaihoatdong"];
    switch ($tthd) {
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
    $result = $conn->query("SELECT * FROM ttlienhe WHERE idtnv='$idtnv'");
    $row = mysqli_fetch_array($result);
    $sdtc = $row["sdt"];
    $emailc = $row["email"];
    $diachi = $row["diachi"];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trang chủ thành viên</title>
        <link type="text/css" rel="stylesheet" href="form.css"/>
        <script src="https://kit.fontawesome.com/6854c68889.js" crossorigin="anonymous"></script>
    </head>
    <style>
        td{
            padding: 5px;
            vertical-align: bottom;
        }
    </style>
    <body><h1 class="logo">
     		<i class="fas fa-dog"></i>
     		Animal Shelter
        </h1>
        <h2>Xin chào</h2>
        
        <div class="container">
            <table >
                <tr>
                    <td>
                        <img src="avt.png" width ="200px" heigh="200px"/>
                    </td>
                    <td>
                        <?php echo $tthd; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        ID:
                    </td>
                    <td>
                        <?php echo $idtnv; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Tên tình nguyện viên:
                    </td>
                    <td>
                    <?php echo $ten; ?>
                    </td>
                </tr>

                <tr>
                        <td>
                            Ngày sinh: 
                        </td>
                        <td>
                            <?php echo $ngaysinh; ?> 
                        </td>
                </tr>

                <tr>
                        <td>
                            Giới tính:
                        </td>
                        <td>
                            <?php echo $gioitinh; ?> 
                        </td>
                </tr>
                <tr>
                        <td>
                            Số điện thoại:
                        </td>
                        <td>
                            <?php echo $sdtc; ?> 
                        </td>
                </tr>
                <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            <?php echo $emailc; ?> 
                        </td>
                </tr>

            </table>
            <a href="logout.php"><button>Đăng xuất</button></a>
            <a href="update.php"><button>Sửa thông tin</button></a>
            <?php 
                $result = $conn->query("SELECT * FROM tnv WHERE idtnv='$idtnv'");
                if (mysqli_num_rows($result) == 0) {
                    echo "<a href='dktnv.php'><button>Đăng kí làm TNV</button></a>";
                }
                else {
                    echo "<a href='xemchomeo.php'><button>Xem vật nuôi đã cứu trợ</button></a>";
                }
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