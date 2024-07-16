<?php
    include('connect.php'); //Chen trang connect vao bai giangduong
    //Xay duong lop data_giangduong trong do chua ham lien quan dl giang duong
    class data_thongtin
    {
        public function insert_tt($username, $passwd, $re_passwd, $address, $avatar, $gender, $hobby)
    {
        global $connect;
        $sql = "INSERT INTO dkithongtin( username, passwd, re_passwd, address, avatar, gender, hobby) 
        VALUES ( '$username', '$passwd', '$re_passwd', '$address', '$avatar', '$gender', '$hobby')";
        $run = mysqli_query($connect,$sql);
        return $run; 

    }
        public function select_tt()
        {
            global $connect;
            $sql = "SELECT * FROM dkithongtin";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
    
        public function select_tt_id($id)
        {
            global $connect;
            $sql = "SELECT * FROM dkithongtin WHERE ID_thongtin = '$id'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        public function update_tt($username, $passwd, $re_passwd, $address, $avatar, $gender, $hobby,$id_tt)
        {
            global $connect;
            $sql = "UPDATE dkithongtin SET 
            username='$username',
            passwd='$passwd',
            re_passwd='$re_passwd',
            address='$address',
            avatar='$avatar',
            gender='$gender',
            hobby='$hobby' 
            WHERE ID_thongtin = '$id_tt'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        
        public function delete_tt($id_tt)
        {
            global $connect;
            $sql = "DELETE FROM dkithongtin WHERE ID_thongtin = '$id_tt'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        
    }

    ?>