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
    $get_data = new data_giangduong(); // goi class data_gd trong control
    $select_giangduong = $get_data->select_gd(); //goi function

    ?>
    <table border="1" align="center">
        <caption style="font-size: 20px;">ĐĂNG KÝ GIẢNG ĐƯỜNG</caption>
        <center><a style="color: blue;" href="GD_insert.php">NEW</a></center>
        <tr>
            <th>Giảng Đường</th>
            <th>Giáo Viên</th>
            <th>Môn Dạy</th>
            <th colspan="2">Tùy Chọn</th>
        </tr>
        <?php
        foreach($select_giangduong as $i_gd) // Duyet dl
        {
        ?>
        <tr>
            <td><?php echo $i_gd['giangduong']?></td>
            <td><?php echo $i_gd['giaovien']?></td>
            <td><?php echo $i_gd['monday']?></td>
            <td><a href="GD_update.php?up=<?php echo $i_gd['ID_giangduong']?>">Update</a></td>
            <td><a href="GD_delete.php?del=<?php echo $i_gd['ID_giangduong']?>" 
            onclick="if(confirm('Bạn có chắc chắn xóa?')) return true;
                     else return false";>Delete</a></td>
        </tr>
        <?php
        }
        ?>
        

    </table>
    
</body>
</html>