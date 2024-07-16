<?php
    include('connect.php'); //Chen trang connect vao bai giangduong
    //Xay duong lop data_giangduong trong do chua ham lien quan dl giang duong
    class data_dulich
    {
        public function insert_dl( $hoten, $diachi, $sdt, $khach, $tour, $phuongtien, $solgnl, $solgtre, $ghichu)
    {
        global $connect;
        $sql = "INSERT INTO dkidulich( hoten, diachi, sdt, khach, tour, phuongtien, solgnl, solgtre, ghichu) 
                VALUES ('$hoten','$diachi','$sdt','$khach','$tour','$phuongtien','$solgnl','$solgtre','$ghichu')";
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
    
        public function select_dl_id($id)
        {
            global $connect;
            $sql = "SELECT * FROM dkidulich WHERE ID_dulich = '$id'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        public function update_dl($hoten, $diachi, $sdt, $khach, $tour, $phuongtien, $solgnl, $solgtre, $ghichu,$id_dl)
        {
            global $connect;
            $sql = "UPDATE dkidulich SET 
            hoten = '$hoten',
            diachi = '$diachi',
            sdt = '$sdt',
            khach = '$khach',
            tour = '$tour',
            phuongtien = '$phuongtien',
            solgnl = '$solgnl',
            solgtre = '$solgtre',
            ghichu = '$ghichu'
            WHERE ID_dulich = '$id_dl'";echo $sql;
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        
        public function delete_dl($id_dl)
        {
            global $connect;
            $sql = "DELETE FROM dkidulich WHERE ID_dulich = '$id_dl'";
            $run = mysqli_query($connect,$sql);
            return $run;
        }
        
    }

    ?>