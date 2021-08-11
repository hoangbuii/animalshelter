<!DOCTYPE html>
<html>
    <head>
        <title>Cứu trợ động vật</title>
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
        <h2>Cứu Trợ</h2>
        <div class="container">
            <form action="xulicuutro.php" method="post" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-25">
                        <label for="txtName">Tên vât nuôi:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtName" id="fullname" onblur="tenChuan()"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtOld">Tuổi (tháng): </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="txtOld" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtAnimals">Loài vật: </label>
                    </div>
                    
                    <div class="col-75">
                        <select name="txtAnimals" id="gt">
                            <option value="">Chọn</option>
                            <option value="1">Chó</option>
                            <option value="2">Mèo</option>
                            <option value="3">Thỏ</option>
                            <option value="4">Chim</option>
                            <option value="5">Cá</option>
                            <option value="6">Khác...</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtDate">Ngày cứu trợ:</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name="txtDate" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="fileupload">Ảnh vật nuôi </label>
                    </div>
                    <div class="col-75">
                        <input type="file" name="fileupload" id="fileupload">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="txtNote">Mô tả: </label>
                    </div>
                    <div class="col-75">
                        <textarea name="txtNote" style="height:150px; width:100%" placeholder="Thêm mô tả (Màu lông, chiều cao, tình trạng lúc đưa về...)"></textarea>
                    </div>
                </div>


                <input type="submit" value="Lưu"/>
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