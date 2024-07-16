<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí du lịch</title>
    <style>
        tr {
            background-color: rgb(205, 243, 147);
        }
        
        th {
            padding: 10px 10px 10px 10px;
        }
        
        .left {
            width: 150px;
            text-align: justify;
        }
        
        .right {
            text-align: justify;
        }
    </style>
</head>

<body>
    <h1 style="margin-left: 300px;">Đăng ký du lịch</h1>
    <table border="1px">
    <form method="POST">
        <tr>
            <th class="left">Họ và tên </th>
            <th class="right"> <input style="padding-left: 200px;" type="text" name="txtname" ></th>
        </tr>
        <tr>
            <th class="left">Địa chỉ</th>
            <th class="right"> <input style="padding-left: 200px;" type="text" name="txtdiachi" ></th>
        </tr>
        <tr>
            <th class="left">Điện thoại</th>
            <th class="right"> <input type="number" name="txtdt" ></th>
        </tr>
        <tr>
            <th class="left">Khách du lịch</th>
            <th class="right"> 
                <input type="checkbox" name="khach[]" value="Việt Nam">Việt Nam
                <input type="checkbox" name="khach[]" value="Nước Ngoài">Nước ngoài
            </th>
        </tr>
        <tr>
            <th class="left">Chọn tour</th>
            <th>
                <select class="right" style="width: 200px; margin-right: 400px;" name="tour">
                    <label for="">
                        <optgroup label="Miền Bắc">
                                <option value="Hà Nội - Hạ Long - Sapa">Hà Nội - Hạ Long - Sapa</option>
                                <option value="Hà Nội - Chùa Hương - Ninh Bình">Hà Nội - Chùa Hương - Ninh Bình</option>
                                <option value="Hà Nội - Cát Bà - Tuần Châu">Hà Nội - Cát Bà - Tuần Châu</option>
                        </optgroup>
                        <optgroup label="Miền Trung">
                            <option value="Huế - Bạch Xã - Đà Nẵng">Huế - Bạch Xã - Đà Nẵng</option>
                            <option value="Nha Trang - Đà Lạt">Nha Trang - Đà Lạt</option>
                            <option value="Buôn Mê Thuật - Gia Lai - Kon Tum">Buôn Mê Thuật - Gia Lai - Kon Tum</option>
                        </optgroup>
                        <optgroup label="Miền Nam">
                            <option value="TPHCM- Mỹ Tho">TPHCM- Mỹ Tho</option>
                        </optgroup>
                    </optgroup>
                    </label>
                    </select>

            </th>
        </tr>
        <tr>
            <th class="left">Phương tiện</th>
            <th class="right">
                <input type="radio" name="phuongtien" value="Máy bay">Máy bay
                <input type="radio" name="phuongtien" value="Xe ô tô">Xe ô tô
            </th>
        </tr>
        <tr>
            <th class="center" colspan="2">
                <fieldset style="width: 500px;margin-left: 130px; height: 70px; ">
                    <legend style="text-align: justify; ">Số lượng đoàn khách</legend>
                    Người lớn<input style="width: 50px; padding-right: 30px; " type="number" name="txtsolgnl"> 
                    Trẻ em<input style="width: 50px;margin-top: 20px; margin-right: 200px; padding-right: 30px; " type="number" name="txtsolgtre">

                </fieldset>
            </th>


        </tr>


        <tr>
            <th class="left ">Ghi chú thêm</th>
            <th class="right "> <input style="padding-left: 200px; padding-bottom: 50px; " type="text " name="txtghichu" ></th>
        </tr>
        <tr>
            <th class="center " colspan="2 ">
            <input type="submit" name="txtsub" value="Đồng ý">
            </th>

        </tr>
        </form>  
    </table>
    <?php
    if(isset($_POST['txtsub']))
    {
        $check = "";
        foreach($_POST['khach'] as $i_check)
        {
            $check.=$i_check;
        }
    }

    ?>
    
    <?php 
    
    include('control.php'); //Goi trang control
    $get_data = new data_dulich(); //Goi lop data giangduong trong trang control
    if(isset($_POST['txtsub']))
    {
        $in_dl = $get_data->insert_dl($_POST['txtname'], $_POST['txtdiachi'],$_POST['txtdt'],$check,
        $_POST['tour'], $_POST['phuongtien'], $_POST['txtsolgnl'], $_POST['txtsolgtre'], $_POST['txtghichu']);
        if($in_dl) echo "<script> alert('Thanh cong !!')</script>";
        else echo "<script> alert('Khong thuc thi duoc !!')</script>";
    }
    
    ?>

</body>

</html>