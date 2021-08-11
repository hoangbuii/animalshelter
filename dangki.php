<!DOCTYPE html>
<html>
    <head>
        <title>Đăng kí</title>
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
    <body>
        <h1 class="logo">
     		<i class="fas fa-dog"></i>
     		Animal Shelter
        </h1>
        <h2>Đăng kí</h2>
        <div class="container">
            <form action="xulidangki.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="txtFullname">Họ và tên:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtFullname" id="fullname" onblur="tenChuan()"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtSex">Giới tính:</label>
                    </div>
                    <div class="col-75">
                        <select name="txtSex" id="gt">
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
                        <label for="txtUsername">Tên đăng nhập:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtUsername" id="tendangnhap"/>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="txtPassword">Mật khẩu:</label>
                    </div>
                    <div class="col-75">
                        <input type="password" name="txtPassword" />
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="txtPassword2">Nhập lại mật khẩu:</label>
                    </div>
                    <div class="col-75">
                        <input type="password" name="txtPassword2" id="nhaplaimatkhau" onblur="ktmk()"/>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="txtSdtLogin">Số điện thoại:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtSdtLogin" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtEmailLogin">Email:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtEmailLogin" />
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-25">
                        <label for="txtSdtcontact">Số điện thoại liên hệ:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtSdtcontact" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtEmailContact">Email liên hệ:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtEmailContact" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtDiachi">Địa chỉ:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtDiachi" />
                    </div>
                </div>
                <input type="submit" value="Đăng kí"/>
                <input type="reset" name="Nhập lại" />
                
            </form>
            <a href="dangnhap.php"><button>Đăng nhập</button></a>
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