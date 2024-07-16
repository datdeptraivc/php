<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=,, initial-scale=1.0">
    <title>INSERT</title>
</head>
<style>
    
    *{
        padding: 10px 5px 10px 5px;
    }
</style>
<body>

    <table  style="border-color: rgb(19, 119, 233);" border="2px"  align="center">
        <tr>
            <th colspan="2" style="padding-bottom: 15px;padding-top: 5px;font-size: 25px;">
                ĐĂNG KÝ
            </th>
        </tr>
         
        <form method="POST" enctype="multipart/form-data">
        <tr>
            <th >Fullname: </th>
            <th > <input  style="padding-right: 250px;" type="text" name="txtfullname"  placeholder="Nhập fullname"></th>
        </tr>
        <tr>
            <th >Username: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtname" placeholder="Nhập tên" required></th>
        </tr>
        <tr>
            <th >Password: </th>
            <th > <input  style="padding-right: 250px;" type="text" name="txtpasswd" placeholder="Nhập mật khẩu" required></th>
        </tr>
        <tr>
            <th >Nhập lại Password: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtrepasswd" placeholder="Nhập lại mật khẩu"></th>
        </tr>
        <tr>
            <th>Giới tính:</th>
            <th>
                <input type="radio" name="gender" value="Nam" id="" >Nam
                <input type="radio" name="gender" value="Nữ" id="" >Nữ
            </th>
        </tr>
        <tr>
            <th >Ngày sinh: </th>
            <th >
                <select name="txtngay" >
                    <option value="Ngày 1">Ngày 1</option>
                    <option value="Ngày 2">Ngày 2</option>
                    <option value="Ngày 3">Ngày 3</option>
                    <option value="Ngày 4">Ngày 4</option>
                    <option value="Ngày 5">Ngày 5</option>
                    <option value="Ngày 6">Ngày 6</option>
                </select>
                <select name="txtthang" >
                    <option value="Tháng 1">Tháng 1</option>
                    <option value="Tháng 2">Tháng 2</option>
                    <option value="Tháng 3">Tháng 3</option>
                    <option value="Tháng 4">Tháng 4</option>
                    <option value="Tháng 5">Tháng 5</option>
                    <option value="Tháng 6">Tháng 6</option>
                </select>
                <select name="txtnam" >
                    <option value="Năm 2015">Năm 2015</option>
                    <option value="Năm 2017">Năm 2017</option>
                    <option value="Năm 2022">Năm 2022</option>
                    <option value="Năm 2023">Năm 2023</option>
                    <option value="Năm 2024">Năm 2024</option>
                    <option value="Năm 2025">Năm 2025</option>
                </select>
            </th>
        </tr>
        <tr>
            <th >Địa chỉ: </th>
            <th > <textarea style="padding-right: 250px;" name="txtdiachi" id=""></textarea></th>
        </tr>
        <tr>
            <th >Avatar: </th>
            <th > <input type="file" name="txtfile" >Không có tệp nào được chọn</th>
        </tr>
        
        <tr>
            <th>Sở thích:</th>
            <th>
                <input type="checkbox" name="txthobby[]" value="Xem phim">Xem phim
                <input type="checkbox" name="txthobby[]" value="Thể thao">Thể thao
                <input type="checkbox" name="txthobby[]" value="Web">Web
            </th>
        </tr>
        <tr>
            <th colspan="2 " ><input type="submit" name="txtreset" value="Reset">
            <input type="submit" name="txtsub" value="OK"></th>

        </tr>
        </form>     
    </table>
    
    <?php
    if(isset($_POST['txthobby']))
    {
        $check = "";
        foreach($_POST['txthobby'] as $i_check)
        {
            $check.=$i_check;
        }
    }

    ?>

    <?php
    move_uploaded_file($_FILES['txtfile']['tmp_name'],'upload/'.$_FILES['txtfile']['name']);
    
    include('control.php'); //Goi trang control
    $get_data = new data_nguoidung(); //Goi lop data nguoidung trong trang control
    if(isset($_POST['txtsub']))
    {
        $in_user = $get_data->insert_user($_POST['txtfullname'], $_POST['txtname'],$_POST['txtpasswd'],
        $_POST['txtrepasswd'],$_POST['gender'],$_POST['txtngay'],$_POST['txtthang'],$_POST['txtnam'],
        $_POST['txtdiachi'], $_FILES['txtfile']['name'],$check);
        if($in_user) echo "<script> alert('Thanh cong !!')</script>";
        else echo "<script> alert('Khong thuc thi duoc !!')</script>";
    }
    ?>
   <img src="upload/<?php echo $_FILES['txtfile']['name']?>" >
    
</body>
</html>