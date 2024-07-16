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
<body >

    <table style="border-color: rgb(19, 119, 233);" border="2px"  align="center">
        <form method="POST" enctype="multipart/form-data">
        <tr>
            <th >Tên SP: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtten" required > </th>
        </tr>
        <tr>
            <th >Giá: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtgia" ></th>
        </tr>
        <tr>
            <th >Giá KM: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtgiakm" id=""></th>
        </tr>
        <tr>
            <th >Nhà sản xuất: </th>
            <th >
                <select style="padding-right: 270px;" name="txtnhasx" >
                    <option >-Chọn nhà sản xuất-</option>
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
            <th >Hình SP: </th>
            <th > <input style="margin-left: -160px;" type="file" name="txtfile" ></th>
        </tr>
        <tr>
            <th>Màu sắc:</th>
            <th>
                <input style="margin-left: -250px;" type="radio" name="color" value="Đỏ" >Đỏ
                <input type="radio" name="color" value="Xanh" >Xanh
                <input type="radio" name="color" value="Trắng" >Trắng

            </th>
        </tr>
        <tr>
            <th>Tính năng:</th>
            <th>
                <input style="margin-left: -210px;" type="checkbox" name="txttinhnang[]" value="GPS">GPS
                <input type="checkbox" name="txttinhnang[]" value="WIFI 6">WIFI 6
                <input type="checkbox" name="txttinhnang[]" value="Jack 3.5">Jack 3.5
            </th>
        </tr>
        <tr>
            <th class="center " colspan="2 "><input style="border-radius: 10px; background-color: rgb(249, 190, 231); margin-left: -170px; padding: 10px 25px 10px 25px;" type="submit" name="txtsub" value="Thêm Sản Phẩm"></th>

        </tr>
        </form>     
    </table>
    <?php
    if(isset($_POST['txttinhnang']))
    {
        $check = "";
        foreach($_POST['txttinhnang'] as $i_check)
        {
            $check.=$i_check;
        }
    }

    ?>
    <?php
    move_uploaded_file($_FILES['txtfile']['tmp_name'],'upload/'.$_FILES['txtfile']['name']);
    
    include('control.php'); //Goi trang control
    $get_data = new data_sanpham(); //Goi lop data giangduong trong trang control
    if(isset($_POST['txtsub'])) {
        if(empty($_POST['txtten']) || (empty($_POST['txtgia']))) {
            echo "<script> alert('Thông tin không được để trống')</script>";
        } else {
            
            $in_sp = $get_data->insert_sp($_POST['txtten'], $_POST['txtgia'],$_POST['txtgiakm'],
        $_POST['txtnhasx'], $_FILES['txtfile']['name'], $_POST['color'],$check);
        if($in_sp) echo "<script> alert('Thanh cong !!')</script>";
        else echo "<script> alert('Khong thuc thi duoc !!')</script>";
        }
    }
    ?>

    
    <img src="upload/<?php echo $_FILES['txtfile']['name']?>" >
    
</body>
</html>