<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=,, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<style>
    
    *{
        padding: 10px 5px 10px 5px;
    }
</style>
<body>
    <?php
            include ('control.php'); // gọi trang control
            $get_data= new data_nguoidung(); // gọi lớp data_giangduong trong control
            $select_user_id=$get_data->select_user_id($_GET['up']); // giá trị truyên ftrang từ select sang
            foreach ($select_user_id as $i_user)
            // Duyệt phần tử trả về database
        ?>
        <table  style="border-color: rgb(19, 119, 233);" border="2px"  align="center">
        <tr>
            <th colspan="2" style="padding-bottom: 15px;padding-top: 5px;font-size: 25px;">
                ĐĂNG KÝ
            </th>
        </tr>
         
        <form method="POST" enctype="multipart/form-data">
        <tr>
            <th >Fullname: </th>
            <th > <input  style="padding-right: 250px;" type="text" name="txtfullname"  placeholder="Nhập fullname" value="<?php echo $i_user['fullname']?>" ></th>
        </tr>
        <tr>
            <th >Username: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtname" placeholder="Nhập tên" required value="<?php echo $i_user['username']?>" ></th>
        </tr>
        <tr>
            <th >Password: </th>
            <th > <input  style="padding-right: 250px;" type="text" name="txtpasswd" placeholder="Nhập mật khẩu" required value="<?php echo $i_user['mk']?>"></th>
        </tr>
        <tr>
            <th >Nhập lại Password: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtrepasswd" placeholder="Nhập lại mật khẩu" value="<?php echo $i_user['re_mk']?>"></th>
        </tr>
        <tr>
            <th>Giới tính:</th>
            <th>
                <input type="radio" name="gender" value="Nam" <?php if($i_user['gioitinh'] ='Nam') echo 'checked';?> >Nam
                <input type="radio" name="gender" value="Nữ" <?php if($i_user['gioitinh'] ='Nữ') echo 'checked';?> >Nữ
            </th>
        </tr>
        <tr>
            <th >Ngày sinh: </th>
            <th >
                <select name="txtngay" >
                <option value="<?php echo $i_user['ngay'];?>">
                    <?php echo $i_user['ngay'];?>
                </option>
                    <option value="Ngày 1">Ngày 1</option>
                    <option value="Ngày 2">Ngày 2</option>
                    <option value="Ngày 3">Ngày 3</option>
                    <option value="Ngày 4">Ngày 4</option>
                    <option value="Ngày 5">Ngày 5</option>
                    <option value="Ngày 6">Ngày 6</option>
                </select>
                <select name="txtthang" >
                <option value="<?php echo $i_user['thang'];?>">
                    <?php echo $i_user['thang'];?>
                </option>
                    <option value="Tháng 1">Tháng 1</option>
                    <option value="Tháng 2">Tháng 2</option>
                    <option value="Tháng 3">Tháng 3</option>
                    <option value="Tháng 4">Tháng 4</option>
                    <option value="Tháng 5">Tháng 5</option>
                    <option value="Tháng 6">Tháng 6</option>
                </select>
                
                <select name="txtnam" >
                <option value="<?php echo $i_user['nam'];?>">
                    <?php echo $i_user['nam'];?>
                </option>
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
            <th><textarea style="padding-right: 250px;" name="txtdiachi"><?php echo htmlspecialchars($i_user['diachi']); ?></textarea></th>
        </tr>
        <tr>
            <th >Avatar: </th>
            <th > <input type="file" name="txtfile" value="<?php echo $i_user['avatar']?>" >Không có tệp nào được chọn</th>
            
        </tr>
        
        <tr>
            <th>Sở thích:</th>
            <th>
                <input type="checkbox" name="txthobby[]" value="Xem phim" <?php if( strpos($i_user['sothich'],'Xem phim')!== false) echo 'checked';?>>Xem phim
                <input type="checkbox" name="txthobby[]" value="Thể thao" <?php if( strpos($i_user['sothich'],'Thể thao')!== false) echo 'checked';?>>Thể thao
                <input type="checkbox" name="txthobby[]" value="Web" <?php if( strpos($i_user['sothich'],'Web')!== false) echo 'checked';?>>Web
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
        
        if(isset($_POST['txtsub'])){
            move_uploaded_file($_FILES['txtfile']['tmp_name'],'upload/'.$_FILES['txtfile']['name']);
            //kiểm tra xem có ảnh hay k
            if (empty($_FILES['txtfile']['name'])) { 
                foreach($select_user_id as $i_user){
                    $_FILES['txtfile']['name'] = $i_user['avatar'];
                 }
                
                //update tất cả thông tin sản phẩm
                $update_user = $get_data->update_user($_POST['txtfullname'], $_POST['txtname'],$_POST['txtpasswd'],
                $_POST['txtrepasswd'],$_POST['gender'],$_POST['txtngay'],$_POST['txtthang'],$_POST['txtnam'],
                $_POST['txtdiachi'], $_FILES['txtfile']['name'],$check, $_GET['up']);
    
            }
            else{
                //xóa ảnh cũ trong folder upload
                $id =$_GET['up'];
                $sql1= "SELECT * FROM nguoidung WHERE  ID_user = $id LIMIT 1";
                $p=mysqli_query($connect,$sql1);
                while($row = mysqli_fetch_array($p)){
                    unlink('upload/'.$row['txtfile']);
                }
                //update ảnh mới
                $update_user = $get_data->update_user($_POST['txtfullname'], $_POST['txtname'],$_POST['txtpasswd'],
                $_POST['txtrepasswd'],$_POST['gender'],$_POST['txtngay'],$_POST['txtthang'],$_POST['txtnam'],
                $_POST['txtdiachi'],$_FILES['txtfile']['name'],$check,$_GET['up']);
            }
            if($update_user)echo "<script>alert('CẬP NHẬT THÀNH CÔNG!');
                    window.location='TT_select.php';</script>";
            else echo "<script>alert('KHÔNG THỰC THI ĐƯỢC!!!')</script>";
            
        }
    ?>

 
</body>
</html>