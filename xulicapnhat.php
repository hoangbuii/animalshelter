<?php

    if(!isset($_POST['txtFullname'])) {
        die('');
    }
    session_start();
    include('ketnoi.php');
    $un = $_SESSION['username'];
    header('Content-Type: text/html; charset=UTF-8');

    $result = $conn->query("SELECT idtnv FROM thongtintnv WHERE tendangnhap='$un'");
    $row = mysqli_fetch_array($result);
    $id = $row["idtnv"];


    $fullname   = addslashes($_POST['txtFullname']);
    $sex        = addslashes($_POST['txtSex']);
    if ($sex = "Nam" ) $sex = 1; elseif ($sex = "Nữ" )  $sex = 0; else $sex = NULL;
    $birthday   = addslashes($_POST['txtBirthday']);
    $emailc     = addslashes($_POST['txtEmailContact']);
    $sdtc       = addslashes($_POST['txtSdtcontact']);
    $diachi     = addslashes($_POST['txtDiachi']);
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
                if (!$fullname || !$sex || !$birthday || !$emailc || !$sdtc || !$diachi) {
                    echo "<p>Vui lòng nhập đầy đủ thông tin.</p> <a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }
                $result = $conn->query("SELECT email FROM ttlienhe WHERE email ='$emailc'");
                $row = mysqli_fetch_array($result);
            
                if (mysqli_num_rows($result) > 0 && $row["email"]!=$emailc){
                    echo "<p>Email này đã có người dùng. Vui lòng chọn Email khác.</p> <a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }

                $result = $conn->query("SELECT sdt FROM ttlienhe WHERE sdt ='$sdtc'");
                $row = mysqli_fetch_array($result);
                
                if (mysqli_num_rows($result) > 0 && $row["sdt"]!=$sdtc){
                    echo "<p>Số điện thoại này đã có người dùng. Vui lòng chọn số điện thoại khác.</p> <a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }

                $update1 = $conn->query("UPDATE thongtintnv
                SET tentnv ='$fullname' , gioitinh = $sex, ngaysinh = '$birthday'
                WHERE idtnv = $id");

                if($update1){
                    $update2 = $conn->query("UPDATE ttlienhe
                    SET sdt = '$sdtc', email = '$emailc', diachi = '$diachi'
                    WHERE idtnv =$id");
                    if($update2)
                    header("Location: member.php");
                    else{
                        echo "<p>Có lỗi xảy ra trong quá trình cập nhật.</p> <a href='xulicapnhat.php'><button>Thử lại</button></a>";
                    }
                } else
                    echo "<p>Có lỗi xảy ra trong quá trình cập nhật.</p> <a href='xulicapnhat.php'><button>Thử lại</button></a>";

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