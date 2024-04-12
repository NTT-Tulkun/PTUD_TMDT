<?php
    class tmdt
    {
        public function connect()
        {
            $con = mysqli_connect("localhost","tmdt_admin","123456","db_tmdt");
            mysqli_set_charset($con, "utf8");
            return $con;
        }

        public function xuatdulieu($sql)
		{
			$link=$this->connect();
			$ketqua=mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			if($i>0)
			{
				echo '<table width="800" border="1" align="center">
							  <tr>
								<th width="204" align="center" scope="col">STT</th>
								<th width="314" align="center" scope="col">Tên</th>
								<th width="260" align="center" scope="col">Địa Chỉ</th>
							  </tr>';
				
                $dem =1;
                while($row=mysqli_fetch_array($ketqua))
                {
					$ten=$row['tencty'];
					$diachi=$row['diachi'];
					echo '<tr>
						<td align="center">'.$dem.'</td>
						<td align="center">'.$ten.'</td>
						<td align="center">'.$diachi.'</td>
					  </tr>';
                      $dem++;
                }
				echo'</table>';
			}else
			{
				echo "khong co du lieu";
			}
		}
		
		
		public function laycot($sql)
		{
			$link=$this->connect();
			$ketqua=mysqli_query($link,$sql);
			$i=mysqli_num_rows($ketqua);
			$result='';
			if($i>0)
			{
                while($row=mysqli_fetch_array($ketqua))
                {
					$gt=$row[0];
					$result=$gt;
                }
			}
			return $result;
		}
    }
?>