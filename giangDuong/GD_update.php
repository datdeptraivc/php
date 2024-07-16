<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=,, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<style>
    table{
        background-color: #FFFF99;
        
    }
    
</style>
<body>
    <?php
            include ('control.php'); // gọi trang control
            $get_data= new data_giangduong(); // gọi lớp data_giangduong trong control
            $select_giangduong_id=$get_data->select_gd_id($_GET['up']); // giá trị truyên ftrang từ select sang
            foreach ($select_giangduong_id as $i_gd)
            // Duyệt phần tử trả về database
        ?>

    <table border="1px" align="center">
        <tr>
            <th colspan="2" style="padding-bottom: 15px;padding-top: 5px;">
                ĐĂNG KÝ THỜI KHÓA BIỂU
            </th>
        </tr>
        <form method="POST">
        <tr>
            <th >Giảng đường: </th>
            <th > 
            <select name="txtgd" >
                <option value="<?php echo $i_gd['giangduong'];?>">
                        <?php echo $i_gd['giangduong'];?>
                </option>
                    <option value="GD 501">GD 501</option>
                    <option value="GD 502">GD 502</option>
                    <option value="GD 503">GD 503</option>
                    <option value="GD 503">GD 504</option>

                </select>
            </th>
        </tr>
        <tr>
            <th >Tên giáo viên: </th>
            <th > <input style="padding-left: 200px;" type="text" name="txtname" value="<?php echo $i_gd['giaovien']?>"></th>
        </tr>
        <tr>
            <th>Môn dạy:</th>
            <th > <input style="padding-left: 200px;" type="text" name="txtmd" value="<?php echo $i_gd['monday'];?>"></th>
        </tr>
        <tr>
            <th class="center " colspan="2 "><input type="submit" name="txtsub" value="Update"></th>

        </tr>
        </form>     
    </table>
    <?php
    
    if(isset($_POST['txtsub'])) {
        if(empty($_POST['txtname']) || (empty($_POST['txtmd']))) {
            echo "Bạn chưa nhập thông tin";
        } else {
            $update_gd = $get_data->update_gd($_POST['txtgd'], $_POST['txtname'], $_POST['txtmd'], $_GET['up']);
            if($update_gd) {
                echo "<script>alert('Cập nhật thành công');</script>";
            } else {
                echo "<script>alert('Không thực thi được');</script>";
            }
        }
    }
    ?>
    <center><a style="color: blue;" href="GD_select.php">SELECT</a></center>
    
    
</body>
</html>