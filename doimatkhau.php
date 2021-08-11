<!DOCTYPE html>
<html>
    <head>
        <title>Đổi mật khẩu</title>
        <link type="text/css" rel="stylesheet" href="form.css"/>
        <script src="https://kit.fontawesome.com/6854c68889.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <h1 class="logo">
     		<i class="fas fa-dog"></i>
     		Animal Shelter
        </h1>
        <h2>Đổi mật khẩu</h2>
        <div class="container">
            <form action="xulidoimk.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="txtOldPassword">Mật khẩu cũ:</label>
                    </div>
                    <div class="col-75">
                        <input type="password" name="txtOldPassword"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtNewPassword">Mật khẩu mới:</label>
                    </div>
                    <div class="col-75">
                        <input type="password" name="txtNewPassword"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtNewPassword2">Nhập lại mật khẩu:</label>
                    </div>
                    <div class="col-75">
                        <input type="password" name="txtNewPassword2"/>
                    </div>
                </div>

                <input type="submit" value="Thay đổi"/>
            </form>
            <a href='javascript: history.go(-1)'><button>Trở lại</button></a>
        </div>
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