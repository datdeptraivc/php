<?php
    include('connect.php'); //Chen trang connect vao bai giangduong
    //Xay duong lop data_giangduong trong do chua ham lien quan dl giang duong
    class data_giangduong
    {
        public function insert_gd($tengv,$tengd,$tenmd)
    {
        global $connect;
        $sql = "INSERT INTO giangduong(giaovien,giangduong,monday) VALUES ('$tengv','$tengd','$tenmd')";
        $run = mysqli_query($connect,$sql);
        return $run;

    }
        public function select_gd()
        {
            global $connect;
            $sql = "SELECT * FROM giangduong";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
    
        public function select_gd_id($id)
        {
            global $connect;
            $sql = "select * from giangduong where ID_giangduong = '$id'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        public function update_gd($tengd,$tengv,$tenmd,$id_gd)
        {
            global $connect;
            $sql = "UPDATE giangduong SET 
            giangduong='$tengd',
            giaovien='$tengv',
            monday='$tenmd' 
            WHERE ID_giangduong = '$id_gd'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        
        public function delete_gd($id_gd)
        {
            global $connect;
            $sql = "DELETE FROM giangduong WHERE ID_giangduong = '$id_gd'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        
    }

    ?>