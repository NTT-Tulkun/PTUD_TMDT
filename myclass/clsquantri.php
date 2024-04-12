<?php
include("clstmdt.php");
class quantri extends tmdt
{
	public function choncongty($sql,$idchon)
		{
			$link=$this->connect();
			$ketqua=mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			if($i>0)
			{
				echo '<select name="congty" id="congty">
          				<option>Mời chọn công ty cung cấp</option>';
                while($row=mysqli_fetch_array($ketqua))
                {
					$idcty=$row['idcty'];
					$ten=$row['tencty'];
					if($idchon=$idcty)
					{
						echo '<option value="'.$idcty.'" selected>'.$ten.'</option>';
					}else
					{
						echo '<option value="'.$idcty.'">'.$ten.'</option>';
					}
					
                }
				echo ' </select>';
			}
			else
			{
				echo "khong co du lieu";
			}
		}
	
	public function upload($name, $tmp_name, $folder)
	{
		$name = $folder."/".$name;
		if(move_uploaded_file($tmp_name,$name))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function themxoasua($sql)
	{
		$link=$this->connect();
		$ketqua=mysqli_query($link,$sql);
		if($ketqua)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function xemdanhsachsanpham($sql)
		{
			$link=$this->connect();
			$ketqua=mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			if($i>0)
			{
				echo '<table width="600" border="1" align="center">
					  <tbody>
						<tr align="center">
						  <td width="69">STT</td>
						  <td width="217">Tên sản phẩm</td>
						  <td width="143">Mô tả</td>
						  <td width="143">Giá</td>
						</tr>';
				$dem=1;
                while($row=mysqli_fetch_array($ketqua))
                {
					$idsp=$row['idsp'];
					$tensp=$row['tensp'];
					$gia=$row['gia'];
					$mota=$row['mota'];
					echo '<tr>
						  <td align="center"><a href="?id='.$idsp.'">'.$dem.'</a></td>
						  <td align="left"><a href="?id='.$idsp.'">'.$tensp.'</a></td>
						  <td align="left"><a href="?id='.$idsp.'">'.$mota.'</a></td>
						  <td align="center"><a href="?id='.$idsp.'">'.$gia.'</a></td>
						</tr>';
					$dem++;
                }
				echo '</tbody>
						</table>';
			}
			else
			{
				echo "khong co du lieu";
			}
		}
}
?>