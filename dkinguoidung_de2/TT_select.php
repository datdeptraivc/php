<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT</title>
    
</head>
<style>
    table{
        background-color: rgb(191, 235, 246);
        text-align: center;
        
    }
    /* th{
        padding: 7px 10px;
    } */
    
</style>
<body>
    <?php
    include "control.php"; // goi trang control
    $get_data = new data_nguoidung(); // goi class data_gd trong control
    $select_user = $get_data->select_user(); //goi function

    ?>
    <table border="1" align="center">
        <caption style="font-size: 20px;">ĐĂNG KÝ </caption>
        <center><a style="color: blue;" href="TT_insert.php">NEW</a></center>
        <tr>
            <th>Fullname : </th>
            <th>Username : </th>
            <th>Password : </th>
            <th>Re_Pass : </th>
            <th>Giới tính : </th>
            <th>Ngày sinh : </th>
            <th>Địa chỉ : </th>
            <th>Avatar : </th>
            <th>Sở thích : </th>
            <th colspan="2">Tùy Chọn</th>
        </tr>
        <?php
        foreach($select_user as $i_user) // Duyet dl
        {
        ?>
        <tr>
            <td><?php echo $i_user['fullname']?></td>
            <td><?php echo $i_user['username']?></td>
            <td><?php echo $i_user['mk']?></td>
            <td><?php echo $i_user['re_mk']?></td>
            <td><?php echo $i_user['gioitinh']?></td>
            <td><?php echo $i_user['ngay']?> <?php echo $i_user['thang']?> <?php echo $i_user['nam']?></td>
            <td><?php echo $i_user['diachi']?></td>
            <td><img src="upload/<?php echo $i_user['avatar']?>" width="200px" height="200px"></td>
            <td><?php echo $i_user['sothich']?></td>
            <td><a href="TT_update.php?up=<?php echo $i_user['ID_user']?>">Update</a></td>
            <td><a href="TT_delete.php?del=<?php echo $i_user['ID_user']?>" 
            onclick="if(confirm('Bạn có chắc chắn xóa?')) return true;
                     else return false";>Delete</a></td>
        </tr>
        <?php
        }
        ?>
        

    </table>
    
</body>
</html>