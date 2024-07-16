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
    $get_data = new data_sanpham(); // goi class data_gd trong control
    $select_sp = $get_data->select_sp(); //goi function

    ?>
    <table border="1" align="center">
        <caption style="font-size: 20px;">ĐĂNG KÝ SẢN PHẨM</caption>
        <center><a style="color: blue;" href="SP_insert.php">NEW</a></center>
        <tr>
            <th>Tên SP: </th>
            <th>Giá: </th>
            <th>Giá KM: </th>
            <th>Nhà sản xuất: </th>
            <th>Hình SP: </th>
            <th>Màu sắc: </th>
            <th>Tính năng: </th>
            <th colspan="2">Tùy Chọn</th>
        </tr>
        <?php
        foreach($select_sp as $i_sp) // Duyet dl
        {
        ?>
        <tr>
            <td><?php echo $i_sp['tensp']?></td>
            <td><?php echo $i_sp['gia']?></td>
            <td><?php echo $i_sp['giakm']?></td>
            <td><?php echo $i_sp['nhasx']?></td>
            <td><img src="upload/<?php echo $i_sp['hinhsp']?>" width="200px" height="200px"></td>
            <td><?php echo $i_sp['mausac']?></td>
            <td><?php echo $i_sp['tinhnang']?></td>
            <td><a href="SP_update.php?up=<?php echo $i_sp['ID_sp']?>">Update</a></td>
            <td><a href="SP_delete.php?del=<?php echo $i_sp['ID_sp']?>" 
            onclick="if(confirm('Bạn có chắc chắn xóa?')) return true;
                     else return false";>Delete</a></td>
        </tr>
        <?php
        }
        ?>
        

    </table>
    
</body>
</html>