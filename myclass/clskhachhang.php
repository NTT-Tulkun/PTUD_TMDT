<?php
    include("clstmdt.php");
    class khachhang extends tmdt 
    {
        public function xemdssanpham($sql)
        {
            $link = $this ->connect();
            $ketqua=mysqli_query($link,$sql);
            $i=mysqli_num_rows($ketqua);
			if($i>0)
			{
                while($row=mysqli_fetch_array($ketqua))
                {
                    $idsp=$row['idsp'];
					$gia=$row['gia'];
                    $tensp=$row['tensp'];
					$hinh=$row['hinh'];
                    echo '<div id="sanpham">
                    <div id="tensp">'.$tensp.'</div>
                    <div id="hinh"><img src="image/'.$hinh.'" alt="" width="100%" height="170px"></div>
                    <div id="giasp">'.$gia.'vnđ</div>
                    </div>';
                }
            }else{
                echo "khong co du lieu";
            }

        }

        public function xuatcongty($sql)
		{
			$link=$this->connect();
			$ketqua=mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			if($i>0)
			{
				while($row=mysqli_fetch_array($ketqua))
				{
					echo'<a href="?id='.$row['idcty'].'">'.$row['tencty'].'</a>';
					echo'<br>';
				}
			}
		}
    }
?>