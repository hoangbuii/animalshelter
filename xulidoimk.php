<?php
    if(!isset($_POST['txtOldPassword'])) {
        die('');
    }
    session_start();
    include('ketnoi.php');
    $un = $_SESSION['username'];
    header('Content-Type: text/html; charset=UTF-8');

    $oldpassword   = addslashes($_POST['txtOldPassword']);
    $newpassword   = addslashes($_POST['txtNewPassword']);
    $newpassword2  = addslashes($_POST['txtNewPassword2']);

    $result = $conn->query("SELECT matkhau FROM thongtintnv WHERE tendangnhap='$un'");
    $row = mysqli_fetch_array($result);
    $password = $row["matkhau"];
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
                if (!$oldpassword || !$newpassword || !$newpassword2) {
                    echo "<p>Vui lòng nhập đầy đủ thông tin.</p> <a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }

                $oldpassword = md5($oldpassword);
                if ($oldpassword != $password){
                    echo "<p>Mật khẩu không đúng. Vui lòng nhập lại.</p> <a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }

                if ($newpassword != $newpassword2) {
                    echo "<p>Mật khẩu nhập lại không đúng. Vui lòng nhập lại.</p> <a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }
                $newpassword = md5($newpassword);
                $update = $conn->query("UPDATE thongtintnv
                SET matkhau='$newpassword'
                WHERE tendangnhap = '$un'");
                if ($update)
                header("Location: member.php");
                else
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