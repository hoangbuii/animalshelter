<?php
    session_start();
    include('ketnoi.php');
    $un = $_SESSION['username'];

    $result = $conn->query("SELECT * FROM thongtintnv WHERE tendangnhap='$un'");
    $row = mysqli_fetch_array($result);

    $idtnv = $row["idtnv"];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng kí tình nguyện viên</title>
        <link type="text/css" rel="stylesheet" href="form.css"/>
        <script src="https://kit.fontawesome.com/6854c68889.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1 class="logo">
     		<i class="fas fa-dog"></i>
     		Animal Shelter
        </h1>
        <h2>Đăng kí thành viên</h2>
        <div class="container">
            <form action="dangkitnv.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="txtC1">Ca 1 (Từ 00h00 đến 02h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC1">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="txtC2">Ca 2 (Từ 02h00 đến 04h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC2">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtC3">Ca 3 (Từ 04h00 đến 06h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC3">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtC4">Ca 4 (Từ 06h00 đến 08h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC4">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtC5">Ca 5 (Từ 08h00 đến 10h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC5">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtC6">Ca 6 (Từ 10h00 đến 12h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC6">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtC7">Ca 7 (Từ 12h00 đến 14h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC7">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtC8">Ca 8 (Từ 14h00 đến 16h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC8">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtC9">Ca 9 (Từ 16h00 đến 18h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC9">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtC10">Ca 10 (Từ 18h00 đến 20h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC10">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtC11">Ca 11 (Từ 20h00 đến 22h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC11">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtC12">Ca 12 (Từ 22h00 đến 00h00) :</label>
                    </div>
                    <div class="col-75">
                        <select name="txtC12">
                            <option value="">Hãy chọn</option>
                            <option value="1">Trực tại trung tâm</option>
                            <option value="2">Chăm sóc động vật</option>
                            <option value="3">Tìm động vật thất lạc</option>
                            <option value="4">Vận chuyển vật nuôi</option>
                            <option value="5">Đặt lịch khám</option>
                            <option value="6">Đăng bài quảng cáo</option>
                        </select>
                    </div>
                </div>
                
                <input type="submit" value="Đăng kí"/>
                <input type="reset" name="Nhập lại" />
                
            </form>
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