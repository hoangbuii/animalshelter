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

    $result = $conn->query("SELECT * FROM ttlienhe WHERE idtnv='$idtnv'");
    $row = mysqli_fetch_array($result);
    $sdtc = $row["sdt"];
    $emailc = $row["email"];
    $diachi = $row["diachi"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sửa đổi thông tin</title>
        <link type="text/css" rel="stylesheet" href="form.css"/>
        <script src="https://kit.fontawesome.com/6854c68889.js" crossorigin="anonymous"></script>
    </head>
    <script>
        function tenChuan() {
            var s = document.getElementById("fullname").value;
            var a = s[0].toUpperCase();
            for (var i = 1; i < s.length; i++){
                if (s.charAt(i) != ' ') {
                    if(s.charAt(i - 1) == ' ') {
                        a = a + s.charAt(i).toUpperCase();
                    } else {
                        a = a + s.charAt(i);
                    }
                } else if (s.charAt(i + 1) == ' ')
                    continue;
                else {
                    a = a + s.charAt(i);
                } 
            }
            document.getElementById("fullname").value = a;
        }
    </script>
    <body><h1 class="logo">
     		<i class="fas fa-dog"></i>
     		Animal Shelter
        </h1>
        <h2>Thay đổi thông tin của bạn</h2>
        
        <div class="container">
            <form action="xulicapnhat.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="txtFullname">Họ và tên:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtFullname" id="fullname" onblur="tenChuan()" <?php echo "value="."'".$ten."'"; ?>/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtSex">Giới tính:</label>
                    </div>
                    <div class="col-75">
                        <select name="txtSex" id="gt" >
                            <option value="">Chọn</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="txtBirthday">Ngày sinh:</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name="txtBirthday" />
                    </div>
                </div> 

                <div class="row">
                    <div class="col-25">
                        <label for="txtSdtcontact">Số điện thoại liên hệ:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtSdtcontact" <?php echo "value="."'".$sdtc."'"; ?> />
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtEmailContact">Email liên hệ:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtEmailContact" <?php echo "value="."'".$emailc."'"; ?> />
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtDiachi">Địa chỉ:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtDiachi" <?php echo "value="."'".$diachi."'"; ?> />
                    </div>
                </div>
                <input type="submit" value="Thay đổi"/>
                <input type="reset" name="Nhập lại" />
            </form>
            <a href="doimatkhau.php"><button>Đổi mật khẩu</button></a>
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