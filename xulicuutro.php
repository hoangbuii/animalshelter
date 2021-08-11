<?php
    session_start();
    include('ketnoi.php');
    $un = $_SESSION['username'];

    $result = $conn->query("SELECT * FROM thongtintnv WHERE tendangnhap='$un'");
    $row = mysqli_fetch_assoc($result);
    $idtnv = $row['idtnv'];

    header('Content-Type: text/html; charset=UTF-8');

    $name       = addslashes($_POST['txtName']);
    $old        = addslashes($_POST['txtOld']);
    $animals    = addslashes($_POST['txtAnimals']);
    $date       = addslashes($_POST['txtDate']);

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
                if (!$name || !$old || !$animals || !$date) {
                    echo "<p>Vui lòng nhập đầy đủ thông tin. </p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    exit;
                }





                if (!isset($_FILES["fileupload"]))
                {
                    echo "<p>Dữ liệu không đúng cấu trúc</p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    die;
                }
                if ($_FILES["fileupload"]['error'] != 0)
                {
                    echo "<p>Dữ liệu upload bị lỗi</p><a href='javascript: history.go(-1)'><button>Trở lại</button></a>";
                    die;
                }



                $target_dir    = "uploads/";
                $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
                $allowUpload   = true;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $maxfilesize   = 8000000;
                $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');



                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                    if($check !== false)
                    {
                        //echo "</p>Đây là file ảnh - " . $check["mime"] . ".</p>";
                        $allowUpload = true;
                    }
                    else
                    {
                        echo "<p>Không phải file ảnh.</p>";
                        $allowUpload = false;
                    }
                }

                if (file_exists($target_file))
                {
                    echo "<p>Tên file ảnh đã tồn tại, không được ghi đè</p>";
                    $allowUpload = false;
                }
                if ($_FILES["fileupload"]["size"] > $maxfilesize)
                {
                    echo "<p>Không được upload ảnh lớn hơn $maxfilesize (bytes).</p>";
                    $allowUpload = false;
                }


                if (!in_array($imageFileType,$allowtypes ))
                {
                    echo "<p>Chỉ được upload các định dạng JPG, PNG, JPEG, GIF</p>";
                    $allowUpload = false;
                }


                if ($allowUpload)
                {
                    if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
                    {
                        //echo "File ". basename( $_FILES["fileupload"]["name"]).
                        //echo "<p> Đã upload thành công.</p>";

                        //echo "File lưu tại " . $target_file;
                        $addAnimals  = $conn->query("INSERT INTO thongtinvn(idtnv, tenvatnuoi, tuoi, loaivat, ngaycuutro, anhvatnuoi)
                        VALUES ($idtnv, '$name', $old, $animals, '$date', '$target_file')");


                    }
                    else
                    {
                        echo "<p>Có lỗi xảy ra khi upload file.</p>";
                    }
                }
                else
                {
                    echo "<p>Không upload được file, có thể do file lớn, kiểu file không đúng ...</p><a href='xuli.php'><button>Thử lại</button></a>" ;
                }


                
                
                if ($addAnimals) {
                    echo "<p>Đã lưu thành công.</p><a href='xemchomeo.php'><button>Trở lại</button></a>";
                }
                else {
                    echo "<p> Quá trình thất bại.</p><a href='xulicuutro.php'><button>Thửlại</button></a>";
                }
            ?>
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