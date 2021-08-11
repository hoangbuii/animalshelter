<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <link type="text/css" rel="stylesheet" href="form.css"/>
        <script src="https://kit.fontawesome.com/6854c68889.js" crossorigin="anonymous"></script>
    </head>
    <?php
        session_start();
        
        header('Content-Type: text/html; charset=UTF-8');
        
        if (isset($_POST['dangnhap'])) 
        {
            include('ketnoi.php');
            
            
            $username = addslashes($_POST['txtUsername']);
            $password = addslashes($_POST['txtPassword']);

            if (!$username || !$password) {
                echo "<div class='container'>";
                echo "<p>Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. </p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                echo "</div>";
                exit;
            }
            $password = md5($password);
            

            $result = $conn->query("SELECT tendangnhap, matkhau FROM thongtintnv WHERE tendangnhap='$username'");
            if (mysqli_num_rows($result) == 0) {
                echo "<div class='container'>";
                echo "<p>Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. </p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                echo "</div>";
                exit;
            }

            $row = mysqli_fetch_array($result);
            
            if ($password != $row['matkhau']) {
                echo "<div class='container'>";
                echo "<p>Mật khẩu không đúng. Vui lòng nhập lại.</p> <a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                echo "</div>";
                exit;
            }
            $result = $conn->query("UPDATE thongtintnv 
            SET trangthaihoatdong = 11
            WHERE tendangnhap = '$username'");
            $_SESSION['username'] = $username;
            header("Location: index.php");
            die();
        }
    ?>
    <body>
        
        <h1 class="logo">
     		<i class="fas fa-dog"></i>
     		Animal Shelter
        </h1>
        <h2>Đăng nhập</h2>
        <div class="container">
            <form action="dangnhap.php?do=login" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="txtUsername">Tên đăng nhập :</label>
                    </div>
                    <div class="col-75">
                        <input type='text' name='txtUsername' />
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtPassword">Mật khẩu :</label>
                    </div>
                    <div class="col-75">
                        <input type='password' name='txtPassword' />
                    </div>
                </div>
                <input type='submit' name="dangnhap" value='Đăng nhập' />
            </form>
            <a href="dangki.php"><button>Đăng kí</button></a>
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