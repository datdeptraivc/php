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
                ĐĂNG KÝ THÔNG TIN
            </th>
        </tr>
        
        <form method="POST" enctype="multipart/form-data">
        <tr>
            <th >Username: </th>
            <th > <input type="text" name="txtname" id="">(*)</th>
        </tr>
        <tr>
            <th >Password: </th>
            <th > <input type="text" name="txtpasswd" id="">(*)</th>
        </tr>
        <tr>
            <th >Re_Password: </th>
            <th > <input type="text" name="txtrepasswd" id=""></th>
        </tr>
        <tr>
            <th >Address: </th>
            <th >
                <select name="txtaddress" id="" >
                    <option>-Chọn tỉnh-</option>
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="Bắc Ninh">Bắc Ninh</option>
                    <option value="Tp HCM">Tp HCM</option>
                    <option value="Bắc Giang">Bắc Giang</option>
                    <option value="Cà Mau">Cà Mau</option>
                    <option value="Hưng Yên">Hưng Yên</option>
                </select>
            </th>
        </tr>
        <tr>
            <th >Avatar: </th>
            <th > <input type="file" name="txtfile" >Không có tệp nào được chọn</th>
        </tr>
        <tr>
            <th>Gender:</th>
            <th>
                <input type="radio" name="gender" value="Male" id="" >Male
                <input type="radio" name="gender" value="Female" id="" >Female
            </th>
        </tr>
        <tr>
            <th>Hobby:</th>
            <th>
                <input type="checkbox" name="txthobby[]" value="Game">Game
                <input type="checkbox" name="txthobby[]" value="Football">Football
                <input type="checkbox" name="txthobby[]" value="Travel">Travel
                <input type="checkbox" name="txthobby[]"  value="Shopping">Shopping
            </th>
        </tr>
        <tr>
            <th class="center " colspan="2 "><input type="submit" name="txtsub" value="Thực thi"></th>

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
    $get_data = new data_thongtin(); //Goi lop data giangduong trong trang control
    if(isset($_POST['txtsub']))
    {
        $in_tt = $get_data->insert_tt($_POST['txtname'], $_POST['txtpasswd'],$_POST['txtrepasswd'],
        $_POST['txtaddress'], $_FILES['txtfile']['name'], $_POST['gender'],$check);
        if($in_tt) echo "<script> alert('Thanh cong !!')</script>";
        else echo "<script> alert('Khong thuc thi duoc !!')</script>";
    }
    ?>
    <img src="upload/<?php echo $_FILES['txtfile']['name']?>" >
    
</body>
</html>