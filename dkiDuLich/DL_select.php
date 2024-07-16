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
    $get_data = new data_dulich(); // goi class data_gd trong control
    $select_dl = $get_data->select_dl(); //goi function

    ?>
    <table border="1" align="center">
        <caption style="font-size: 20px;">ĐĂNG KÝ GIẢNG ĐƯỜNG</caption>
        <center><a style="color: blue;" href="DL_insert.php">NEW</a></center>
        <tr>
            <th>Họ và Tên</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Khách du lịch</th>
            <th>Chọn tour</th>
            <th>Phương tiện</th>
            <th>Số lượng người lớn</th>
            <th>Số lượng trẻ em</th>
            <th>Ghi chú</th>
            <th colspan="2">Tùy Chọn</th>
        </tr>
        <?php
        foreach($select_dl as $i_dl) // Duyet dl
        {
        ?>
        <tr>
            <td><?php echo $i_dl['hoten']?></td>
            <td><?php echo $i_dl['diachi']?></td>
            <td><?php echo $i_dl['sdt']?></td>
            <td><?php echo $i_dl['khach']?></td>
            <td><?php echo $i_dl['tour']?></td>
            <td><?php echo $i_dl['phuongtien']?></td>
            <td><?php echo $i_dl['solgnl']?></td>
            <td><?php echo $i_dl['solgtre']?></td>
            <td><?php echo $i_dl['ghichu']?></td>
            <td><a href="DL_update.php?up=<?php echo $i_dl['ID_dulich']?>">Update</a></td>
            <td><a href="DL_delete.php?del=<?php echo $i_dl['ID_dulich']?>" 
            onclick="if(confirm('Bạn có chắc chắn xóa?')) return true;
                     else return false";>Delete</a></td>
        </tr>
        <?php
        }
        ?>
        

    </table>
    
</body>
</html>