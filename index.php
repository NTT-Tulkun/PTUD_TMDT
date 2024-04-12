<?php
    include_once("myclass/clskhachhang.php");
    $p= new khachhang();
	error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <div id="banner">

        </div>

        <div id="main">
            <div id="left">
                <?php $p->xuatcongty("select * from congty order by idcty asc")?>
            </div>
            <div id="right">
                <?php 
                $idcty = $_REQUEST['id'];
                if(isset($idcty) && $idcty>0)
                {
                    $p->xemdssanpham("select * from sanpham where idcty='$idcty' order by gia asc");
                }
                else
                {
                    $p->xemdssanpham("select * from sanpham order by gia asc");
                }
                ?>
            </div>
        </div>

        <div id="footer">

        </div>
    </div>
</body>
</html>