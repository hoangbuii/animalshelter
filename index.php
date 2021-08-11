<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <style>
        body{
            background-color: #ffc7f8;
        }
    </style>
    <body>
        <?php 
            if (isset($_SESSION['username']) && $_SESSION['username']){
                if($_SESSION['username'] != 'admin'){
                    header("Location: member.php");
                } else {
                    header("Location: admin.php");
                }

                
            }
            else{
                header("Location: dangnhap.php");
            }
       ?>
    </body>
</html>