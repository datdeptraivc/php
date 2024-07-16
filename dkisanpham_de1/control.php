<?php
    include('connect.php'); //Chen trang connect vao bai giangduong
    //Xay duong lop data_giangduong trong do chua ham lien quan dl giang duong
    class data_sanpham
    {
    
        public function insert_sp($tensp, $gia, $giakm, $nhasx, $hinhsp, $mausac, $tinhnang)
    {
        global $connect;
        // Kiểm tra tênsp trùng lặp
        $sql1 = "SELECT * FROM sanpham WHERE tensp='$tensp'";
        $result = $connect->query($sql1);
    
        if ($result->num_rows > 0) {
            echo "<script> alert('Tên sản phẩm đã tồn tại.')</script>";
        }
        else {
            $sql = "INSERT INTO sanpham( tensp, gia, giakm, nhasx, hinhsp, mausac, tinhnang) 
            VALUES ('$tensp', '$gia', '$giakm', '$nhasx', '$hinhsp', '$mausac', '$tinhnang')";
            $run = mysqli_query($connect,$sql);
            return $run; 
        }
        

    }
        public function select_sp()
        {
            global $connect;
            $sql = "SELECT * FROM sanpham";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
    
        public function select_sp_id($id)
        {
            global $connect;
            $sql = "SELECT * FROM sanpham WHERE ID_sp = '$id'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        public function update_sp($tensp, $gia, $giakm, $nhasx, $hinhsp, $mausac, $tinhnang, $id_sp)
        {
            global $connect;
            $sql = "UPDATE sanpham SET 
            tensp='$tensp',
            gia='$gia',
            giakm='$giakm',
            nhasx='$nhasx',
            hinhsp='$hinhsp',
            mausac='$mausac',
            tinhnang='$tinhnang'
            WHERE ID_sp = '$id_sp'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        
        public function delete_sp($id_sp)
        {
            global $connect;
            $sql = "DELETE FROM sanpham WHERE ID_sp = '$id_sp'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        
    }

    ?>