<?php
include("../myclass/clsquantri.php");
$p= new quantri();
error_reporting(0);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		$layid= $_REQUEST['id'];
		$layten= $p->laycot("select tensp from sanpham where idsp='$layid'");
		$laygia= $p->laycot("select gia from sanpham where idsp='$layid'");
		$laymota= $p->laycot("select mota from sanpham where idsp='$layid'");
		$laygiamgia= $p->laycot("select giamgia from sanpham where idsp='$layid'");
		
	?>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="600" border="1" align="center" cellpadding="5" cellspacing="0">
    <tbody>
      <tr>
        <td colspan="2" align="center"><strong>QUẢN LÝ SẢN PHẨM</strong></td>
      </tr>
      <tr>
        <td width="156">Chọn nhà cung cấp:</td>
        <td width="418">
		<?php
			$layidcty= $p->laycot("select idcty from sanpham where idsp='$layid'");
			$p->choncongty("select * from congty",$layidcty);	
		?>
		<input type="hidden" name="txtid" id="txtid" value="<?php echo $layid?>"></td>
      </tr>
      <tr>
        <td>Nhập tên sản phẩm:</td>
        <td><input name="tensp" type="text" id="tensp" value="<?php echo $layten?>"></td>
      </tr>
      <tr>
        <td>Nhập giá:</td>
        <td><input name="giasp" type="text" id="giasp" value="<?php echo $laygia?>"></td>
      </tr>
      <tr>
        <td>Nhập mô tả:</td>
        <td><textarea name="mota" cols="50" rows="5" id="mota"><?php echo $laymota?></textarea></td>
      </tr>
      <tr>
        <td>Nhập giảm giá</td>
        <td><input name="giamgia" type="text" id="giamgia" value="<?php echo $laygiamgia?>"></td>
      </tr>
      <tr>
        <td>Chọn ảnh đại diện:</td>
        <td><input type="file" name="myfile" id="myfile"></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
		<input type="submit" name="nut" id="nut" value="Thêm sản phẩm">
        <input type="submit" name="nut" id="nut" value="Xóa sản phẩm">
        <input type="submit" name="nut" id="nut" value="Sửa sản phẩm"></td>
      </tr>
    </tbody>
  </table>
</form>
	
<hr>
	<?php
		$p->xemdanhsachsanpham("select*from sanpham order by idsp asc");
	?>
	
	<?php
		switch($_POST['nut'])
		{
			case 'Thêm sản phẩm':
				{
					$name = $_FILES['myfile']['name'];
					$tmp_name = $_FILES['myfile']['tmp_name'];
					$idcty = $_REQUEST['congty'];
					$tensp = $_REQUEST['tensp'];
					$giasp = $_REQUEST['giasp'];
					$mota = $_REQUEST['mota'];
					$giamgia = $_REQUEST['giamgia'];
					
					if($tmp_name!='')
					{
						if($p->upload($name, $tmp_name, "../image")==1)
						{
							if($p->themxoasua("insert into sanpham(tensp, gia, mota, hinh, giamgia, idcty) 
							values ('$tensp', '$giasp', '$mota','$name','$giamgia', '$idcty')")==1)
							{
								echo '<script>alert("Thêm sản phẩm thành công")</script>';	
							}
							else
							{
								echo '<script>alert("Thêm sản phẩm thất bại!")</script>';	
							}
						}
						else
						{
							echo '<script>alert("Upload hình thất bại")</script>';	
						}
					}
					else
					{
						echo '<script>alert("Vui lòng chọn hình đại diện")</script>';	
					}
						echo '<script>window.location="../admin/admin.php"</script>';
					break;
				}
				case 'Xóa sản phẩm':
				{
					$idxoa= $_REQUEST['txtid'];
					$layhinh= $p->laycot("select hinh from sanpham where idsp='$idxoa'");
					echo $layhinh;
					if($idxoa>0)
					{
						if(unlink("../image/".$layhinh))
						{
							if($p->themxoasua("delete from sanpham where idsp='$idxoa'")==1)
							{
								echo '<script>alert("Xóa sản phẩm thành công")</script>';	
							}
						}
					}
					else
					{
						echo '<script>alert("Vui lòng chọn sản phẩm cần xóa")</script>';	
					}
					echo '<script>window.location="../admin/admin.php"</script>';
					break;
				}
				case 'Sửa sản phẩm':
				{
					$idsua= $_REQUEST['txtid'];
					$idcty = $_REQUEST['congty'];
					$tensp = $_REQUEST['tensp'];
					$giasp = $_REQUEST['giasp'];
					$mota = $_REQUEST['mota'];
					$giamgia = $_REQUEST['giamgia'];
					if($idsua>0)
					{
						if($p->themxoasua("UPDATE sanpham SET tensp='$tensp',gia='$giasp', mota='$mota', giamgia='$giamgia' WHERE idsp='$idsua'")==1)
						{
							echo '<script>window.location="../admin/admin.php"</script>';
						}
					}
					else
					{
						echo '<script>alert("Vui lòng chọn sản phẩm cần sửa")</script>';
					}
							
						echo '<script>window.location="../admin/admin.php"</script>';
					break;
				}
		}
	?>
</body>
</html>