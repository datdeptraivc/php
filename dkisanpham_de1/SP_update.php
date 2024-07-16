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
            $get_data= new data_sanpham(); // gọi lớp data_giangduong trong control
            $select_sp_id=$get_data->select_sp_id($_GET['up']); // giá trị truyên ftrang từ select sang
            foreach ($select_sp_id as $i_sp)
            // Duyệt phần tử trả về database
        ?>
        <table style="border-color: rgb(19, 119, 233);" border="2px"  align="center">
        <form method="POST" enctype="multipart/form-data">
        <tr>
            <th >Tên SP: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtten" value="<?php echo $i_sp['tensp']?>" > </th>
        </tr>
        <tr>
            <th >Giá: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtgia" value="<?php echo $i_sp['gia']?>" ></th>
        </tr>
        <tr>
            <th >Giá KM: </th>
            <th > <input style="padding-right: 250px;" type="text" name="txtgiakm" value="<?php echo $i_sp['giakm']?>" ></th>
        </tr>
        <tr>
            <th >Nhà sản xuất: </th>
            <th >
                <select style="padding-right: 270px;" name="txtnhasx" >
                <option value="<?php echo $i_sp['nhasx'];?>">
                    <?php echo $i_sp['nhasx'];?>
                </option>
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
            <th > <input style="margin-left: -160px;" type="file" name="txtfile" value="<?php echo $i_sp['hinhsp']?>"></th>
        </tr>
        <tr>
            <th>Màu sắc:</th>
            <th>
                <input style="margin-left: -250px;" type="radio" name="color" value="Đỏ" <?php if($i_sp['mausac'] ='Đỏ') echo 'checked';?>>Đỏ
                <input type="radio" name="color" value="Xanh" <?php if($i_sp['mausac'] ='Xanh') echo 'checked';?>>Xanh
                <input type="radio" name="color" value="Trắng" <?php if($i_sp['mausac'] ='Trắng') echo 'checked';?>>Trắng

            </th>
        </tr>
        <tr>
            <th>Tính năng:</th>
            <th>
                <input style="margin-left: -210px;" type="checkbox" name="txttinhnang[]" value="GPS"
                <?php if( strpos($i_sp['tinhnang'],'GPS')!== false) echo 'checked';?>>GPS
                <input type="checkbox" name="txttinhnang[]" value="WIFI 6"
                <?php if( strpos($i_sp['tinhnang'],'WIFI 6')!== false) echo 'checked';?>>WIFI 6
                <input type="checkbox" name="txttinhnang[]" value="Jack 3.5"
                <?php if( strpos($i_sp['tinhnang'],'Jack 3.5')!== false) echo 'checked';?>>Jack 3.5
            </th>
        </tr>
        <tr>
            <th class="center " colspan="2 "><input style="background-color: rgb(249, 190, 231);" type="submit" name="txtsub" value="Sửa Sản Phẩm"></th>

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
        
        if(isset($_POST['txtsub'])){
            move_uploaded_file($_FILES['txtfile']['tmp_name'],'upload/'.$_FILES['txtfile']['name']);
            //kiểm tra xem có ảnh hay k
            if (empty($_FILES['txtfile']['name'])) { 
                foreach($select_sp_id as $i_sp){
                    $_FILES['txtfile']['name'] = $i_sp['hinhsp'];
                 }
                
                //update tất cả thông tin sản phẩm
                $up= $get_data->update_sp($_POST['txtten'],$_POST['txtgia'],$_POST['txtgiakm'],
                $_POST['txtnhasx'],$_FILES['txtfile']['name'],$_POST['color'],$check,$_GET['up']);
    
            }
            else{
                //xóa ảnh cũ trong folder upload
                $id =$_GET['up'];
                $sql1= "SELECT * FROM sanpham WHERE  ID_sp = $id LIMIT 1";
                $p=mysqli_query($connect,$sql1);
                while($row = mysqli_fetch_array($p)){
                    unlink('upload/'.$row['txtfile']);
                }
                //update ảnh mới
                $up= $get_data->update_sp($_POST['txtten'],$_POST['txtgia'],$_POST['txtgiakm'],
                $_POST['txtnhasx'],$_FILES['txtfile']['name'],$_POST['color'],$check,$_GET['up']);
            }
            if($up)echo "<script>alert('CẬP NHẬT THÀNH CÔNG!');
                    window.location='SP_select.php';</script>";
            else echo "<script>alert('KHÔNG THỰC THI ĐƯỢC!!!')</script>";
            
        }
    ?>

    
    
</body>
</html>