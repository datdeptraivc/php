<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=,, initial-scale=1.0">
    <title>INSERT</title>
</head>
<style>
    table{
        background-color: #FFFF99;
        
    }
    *{
        padding: 5px 0 5px 0;
    }
</style>
<body>

    <table border="1px" align="center">
        <tr>
            <th colspan="2" style="padding-bottom: 15px;padding-top: 5px;">
                ĐĂNG KÝ THỜI KHÓA BIỂU
            </th>
        </tr>
        <form method="POST">
        <tr>
            <th >Giảng đường: </th>
            <th style="padding: 3px;">
                <select name="txtgd" >
                    <option value="GD 501">GD 501</option>
                    <option value="GD 502">GD 502</option>
                    <option value="GD 503">GD 503</option>
                    <option value="GD 504">GD 504</option>
                </select>
            </th>
        </tr>
        <tr>
            <th >Tên giáo viên: </th>
            <th > <input style="padding-left: 200px;" type="text" name="txtname" id=""></th>
        </tr>
        <tr>
            <th>Môn dạy:</th>
            <th > <input style="padding-left: 200px;" type="text" name="txtmd" id=""></th>
        </tr>
        <tr>
            <th class="center " colspan="2 "><input type="submit" name="txtsub" value="Đăng ký"></th>

        </tr>
        </form>     
    </table>
    <?php
    include('control.php'); //Goi trang control
    $get_data = new data_giangduong(); //Goi lop data giangduong trong trang control
    if(isset($_POST['txtsub']))
    {
        $in_gd = $get_data->insert_gd($_POST['txtname'], $_POST['txtgd'], $_POST['txtmd']);
        if($in_gd) echo "<script> alert('Thanh cong !!')</script>";
        else echo "<script> alert('Khong thuc thi duoc !!')</script>";
    }
    ?>
    
    
</body>
</html>