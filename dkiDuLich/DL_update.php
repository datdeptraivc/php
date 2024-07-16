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
            $get_data= new data_dulich(); // gọi lớp data_giangduong trong control
            $select_dl_id=$get_data->select_dl_id($_GET['up']); // giá trị truyên ftrang từ select sang
            foreach ($select_dl_id as $i_dl)
            // Duyệt phần tử trả về database
        ?>
<h1 style="margin-left: 300px;text-align: center; ">Đăng ký du lịch</h1>
<form method="POST">
    <table border="1px" align="center">
        <tr>
            <th class="left">Họ và tên </th>
            <th class="right"> <input style="padding-left: 200px;" type="text" name="txtname" value="<?php echo $i_dl['hoten']?>" ></th>
        </tr>
        <tr>
            <th class="left">Địa chỉ</th>
            <th class="right"> <input style="padding-left: 200px;" type="text" name="txtdiachi" value="<?php echo $i_dl['diachi']?>"></th>
        </tr>
        <tr>
            <th class="left">Điện thoại</th>
            <th class="right"> <input type="number" name="txtdt" value="<?php echo $i_dl['sdt']?>"></th>
        </tr>
        <tr>
            <th class="left">Khách du lịch</th>
            <th class="right"> 
                </option>
                <input type="checkbox" name="khach[]" value="Việt Nam" 
                <?php if( strpos($i_tt['khach'],'Việt Nam')!== false) echo 'checked';?>>Việt Nam
                <input type="checkbox" name="khach[]" value="Nước Ngoài" 
                <?php if( strpos($i_tt['khach'],'Nước Ngoài')!== false) echo 'checked';?>>Nước ngoài
            </th>
        </tr>
        <tr>
            <th class="left">Chọn tour</th>
            <th>
                <select class="right" style="width: 200px; margin-right: 400px;" name="tour" >
                <option value="<?php echo $i_dl['tour'];?>">
                        <?php echo $i_dl['tour'];?>
                </option>
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
            <th class="right" >
                <input type="radio" name="phuongtien" value="Máy bay" <?php if($i_dl['khach'] ='Máy bay') echo 'checked';?>>Máy bay
                <input type="radio" name="phuongtien" value="Xe ô tô" <?php if($i_dl['khach'] ='Xe ô tô') echo 'checked';?>>Xe ô tô
            </th>
        </tr>
        <tr>
            <th class="center" colspan="2">
                <fieldset style="width: 500px;margin-left: 130px; height: 70px; ">
                    <legend style="text-align: justify; ">Số lượng đoàn khách</legend>
                    Người lớn<input style="width: 50px; padding-right: 30px; " type="number" name="txtsolgnl" value="<?php echo $i_dl['solgnl']?>"> 
                    Trẻ em<input style="width: 50px;margin-top: 20px; margin-right: 200px; padding-right: 30px; " type="number" name="txtsolgtre" value="<?php echo $i_dl['solgtre']?>">

                </fieldset>
            </th>


        </tr>


        <tr>
            <th class="left ">Ghi chú thêm</th>
            <th class="right "> <input style="padding-left: 200px; padding-bottom: 50px; " type="text " name="txtghichu" value="<?php echo $i_dl['ghichu']?>" ></th>
        </tr>
        <tr>
            <th class="center " colspan="2 ">
            <input type="submit" name="txtsub" value="Đồng ý">
            </th>

        </tr>
   
    </table>
    </form> 
    <?php
    
    if(isset($_POST['txtsub'])) {
        if(empty($_POST['txtname']) || (empty($_POST['txtdiachi'])) || (empty($_POST['txtdt'])) || (empty($_POST['txtghichu']))) {
            echo "Bạn chưa nhập thông tin";
        } else {
            $update_dl = $get_data->update_dl($_POST['txtname'], $_POST['txtdiachi'],$_POST['txtdt'],$check,
            $_POST['tour'], $_POST['phuongtien'], $_POST['txtsolgnl'], $_POST['txtsolgtre'], $_POST['txtghichu'], $_GET['up']);
            if($update_dl) {
                echo "<script>alert('Cập nhật thành công');</script>";
            } else {
                echo "<script>alert('Không thực thi được');</script>";
            }
        }
    }
    ?>
    <center><a style="color: blue;" href="DL_select.php">SELECT</a></center>
    
    
</body>
</html>