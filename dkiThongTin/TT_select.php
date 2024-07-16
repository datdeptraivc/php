<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT</title>
    
</head>
<style>
    table{
        background-color: #FFFF99;
        text-align: center;
        
    }
    /* th{
        padding: 7px 10px;
    } */
    
</style>
<body>
    <?php
    include "control.php"; // goi trang control
    $get_data = new data_thongtin(); // goi class data_gd trong control
    $select_tt = $get_data->select_tt(); //goi function

    ?>
    <table border="1" align="center">
        <caption style="font-size: 20px;">ĐĂNG KÝ THÔNG TIN</caption>
        <center><a style="color: blue;" href="TT_insert.php">NEW</a></center>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Re_Pass</th>
            <th>Address</th>
            <th>Avatar</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th colspan="2">Tùy Chọn</th>
        </tr>
        <?php
        foreach($select_tt as $i_tt) // Duyet dl
        {
        ?>
        <tr>
            <td><?php echo $i_tt['username']?></td>
            <td><?php echo $i_tt['passwd']?></td>
            <td><?php echo $i_tt['re_passwd']?></td>
            <td><?php echo $i_tt['address']?></td>
            <td><?php echo $i_tt['avatar']?></td>
            <td><?php echo $i_tt['gender']?></td>
            <td><?php echo $i_tt['hobby']?></td>
            <td><a href="TT_update.php?up=<?php echo $i_tt['ID_thongtin']?>">Update</a></td>
            <td><a href="TT_delete.php?del=<?php echo $i_tt['ID_thongtin']?>" 
            onclick="if(confirm('Bạn có chắc chắn xóa?')) return true;
                     else return false";>Delete</a></td>
        </tr>
        <?php
        }
        ?>
        

    </table>
    
</body>
</html>