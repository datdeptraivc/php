<?php
    include('connect.php'); //Chen trang connect vao bai giangduong
    //Xay duong lop data_giangduong trong do chua ham lien quan dl giang duong
    class data_nguoidung
    {
        public function insert_user( $fullname, $username, $mk, $re_mk, $gioitinh, $ngay, $thang, $nam, $diachi, $avatar, $sothich)
    {
        global $connect;
        // Kiểm tra tênsp trùng lặp
        $sql1 = "SELECT * FROM nguoidung WHERE username='$username'";
        $result = $connect->query($sql1);
    
        if ($result->num_rows > 0) {
            echo "<script> alert('Usernam đã tồn tại.')</script>";
        }
        else {
            $sql = "INSERT INTO nguoidung( fullname, username, mk, re_mk, gioitinh, ngay, thang, nam, diachi, avatar, sothich) 
            VALUES ('$fullname', '$username', '$mk', '$re_mk', '$gioitinh', '$ngay', '$thang', '$nam', '$diachi', '$avatar', '$sothich')";
            $run = mysqli_query($connect,$sql);
            return $run; 
        }
        

    }
        public function select_user()
        {
            global $connect;
            $sql = "SELECT * FROM nguoidung";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
    
        public function select_user_id($id)
        {
            global $connect;
            $sql = "SELECT * FROM nguoidung WHERE ID_user= '$id'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        public function update_user($fullname, $username, $mk, $re_mk, $gioitinh, $ngay, $thang, $nam, $diachi, $avatar, $sothich,$id_user)
        {
            global $connect;
            $sql = "UPDATE nguoidung SET 
            fullname='$fullname',
            username='$username',
            mk='$mk',
            re_mk='$re_mk',
            gioitinh='$gioitinh',
            ngay='$ngay',
            thang='$thang',
            nam='$nam',
            diachi='$diachi',
            avatar='$avatar' ,
            sothich='$sothich'
            WHERE ID_user = '$id_user'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        
        public function delete_user($id_user)
        {
            global $connect;
            $sql = "DELETE FROM nguoidung WHERE ID_user = '$id_user'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        
    }

    ?>