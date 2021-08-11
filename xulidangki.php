<?php
    if(!isset($_POST['txtUsername'])) {
        die('');
    }

    include('ketnoi.php');

    header('Content-Type: text/html; charset=UTF-8');

    $fullname   = addslashes($_POST['txtFullname']);
    $sex        = addslashes($_POST['txtSex']);
    $birthday   = addslashes($_POST['txtBirthday']);
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $password2  = addslashes($_POST['txtPassword2']);
    $email      = addslashes($_POST['txtEmailLogin']);
    $sdt        = addslashes($_POST['txtSdtLogin']);
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
                if (!$fullname || !$sex || !$birthday || !$username || !$password || !$email || !$sdt || !$emailc || !$sdtc || !$diachi) {
                    echo "<p>Vui lòng nhập đầy đủ thông tin. </p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }
                
                
                if ($sex == 'Nam') $sex = 1; else $sex = 0;
            
                $result = $conn->query("SELECT tendangnhap FROM thongtintnv WHERE tendangnhap ='$username'");
                if (mysqli_num_rows($result) > 0){
                    echo "<p>Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. </p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }
            
                $result = $conn->query("SELECT email FROM thongtintnv WHERE email ='$email'");
            
                if (mysqli_num_rows($result) > 0){
                    echo "<p>Email này đã có người dùng. Vui lòng chọn Email khác. </p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }

                if($password != $password2) {
                    echo "<p>Mật khẩu nhập lại không đúng. Vui lòng nhập lại. </p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }
                $password = md5($password);
                $result = $conn->query("SELECT email FROM ttlienhe WHERE email ='$emailc'");
            
                if (mysqli_num_rows($result) > 0){
                    echo "<p>Email này đã có người dùng. Vui lòng chọn Email khác. </p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }

                $result = $conn->query("SELECT sdt FROM thongtintnv WHERE sdt ='$sdt'");
            
                if (mysqli_num_rows($result) > 0){
                    echo "<p>Số điện thoại này đã có người dùng. Vui lòng chọn Số điện thoại khác. </p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }

                $result = $conn->query("SELECT sdt FROM ttlienhe WHERE sdt ='$sdtc'");
            
                if (mysqli_num_rows($result) > 0){
                    echo "<p>Số điện thoại này đã có người dùng. Vui lòng chọn số điện thoại khác. </p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }
            
                $addmember1 = $conn->query("INSERT INTO thongtintnv (tentnv, gioitinh, ngaysinh, tendangnhap, matkhau, sdt, email)
                VALUES ('$fullname', $sex, '$birthday', '$username', '$password', '$sdt', '$email')");
            
                if ($addmember1) {
                    $result = $conn->query("SELECT * FROM thongtintnv WHERE tendangnhap='$username'");
                    $row = mysqli_fetch_assoc($result);
                    $idtnv = $row['idtnv'];
                    $addmember2 = $conn->query("INSERT INTO ttlienhe
                    VALUES ($idtnv, '$sdtc', '$emailc','$diachi')");
                    if ($addmember2) {
                        header("Location: index.php");
                    }
                    else{
                        echo "<p>Có lỗi xảy ra trong quá trình đăng ký. </p><a href='xulidangky.php'><button>Thử lại</button></a>";
                    }
                }
                else   
                    echo "<p>Có lỗi xảy ra trong quá trình đăng ký. </p><a href='xulidangky.php'><button>Thử lại</button></a>";
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