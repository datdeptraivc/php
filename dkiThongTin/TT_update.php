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
            $get_data= new data_thongtin(); // gọi lớp data_giangduong trong control
            $select_tt_id=$get_data->select_tt_id($_GET['up']); // giá trị truyên ftrang từ select sang
            foreach ($select_tt_id as $i_tt)
            // Duyệt phần tử trả về database
        ?>
        <table border="1px" align="center">
        <tr>
            <th colspan="2" style="padding-bottom: 15px;padding-top: 5px;">
                ĐĂNG KÝ THÔNG TIN
            </th>
        </tr>
        
        <form method="POST" enctype="multipart/form-data">
        <tr>
            <th >Username: </th>
            <th > <input type="text" name="txtname" value="<?php echo $i_tt['username']?>">(*)</th>
        </tr>
        <tr>
            <th >Password: </th>
            <th > <input type="text" name="txtpasswd" value="<?php echo $i_tt['passwd']?>">(*)</th>
        </tr>
        <tr>
            <th >Re_Password: </th>
            <th > <input type="text" name="txtrepasswd" value="<?php echo $i_tt['re_passwd']?>"></th>
        </tr>
        <tr>
            <th >Address: </th>
            <th >
                <select name="txtaddress" id="" >
                <option value="<?php echo $i_tt['address'];?>">
                        <?php echo $i_tt['address'];?>
                </option>
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
            <th > <input type="file" name="txtfile" value="<?php echo $i_tt['avatar']?>" >Không có tệp nào được chọn </th>
        </tr>
        <tr>
            <th>Gender:</th>
            <th>
                <input type="radio" name="gender" value="Male" <?php if($i_tt['khach'] ='Male') echo 'checked';?> >Male
                <input type="radio" name="gender" value="Female" <?php if($i_tt['khach'] ='Female') echo 'checked';?> >Female
            </th>
        </tr>
        <tr>
            <th>Hobby:</th>
            <th>
                <input type="checkbox" name="txthobby[]" value="Game"
                <?php if( strpos($i_tt['hobby'],'Game')!== false) echo 'checked';?>>Game
                <input type="checkbox" name="txthobby[]" value="Football"
                <?php if( strpos($i_tt['hobby'],'Football')!== false) echo 'checked';?>>Football
                <input type="checkbox" name="txthobby[]" value="Travel"
                <?php if( strpos($i_tt['hobby'],'Travel')!== false) echo 'checked';?>>Travel
                <input type="checkbox" name="txthobby[]"  value="Shopping"
                <?php if( strpos($i_tt['hobby'],'Shopping')!== false) echo 'checked';?>>Shopping
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
    
    if(isset($_POST['txtsub'])) {
        if(empty($_POST['txtname']) || (empty($_POST['txtpasswd'])) || (empty($_POST['txtrepasswd']))) {
            echo "Bạn chưa nhập thông tin";
        } else {
            
            $update_tt = $get_data->update_tt($_POST['txtname'],$_POST['txtpasswd'],$_POST['txtrepasswd'],
            $_POST['txtaddress'],$_FILES['txtfile']['name'],$_POST['gender'],$check, $_GET['up']);
            if($update_tt) {
                echo "<script>alert('Cập nhật thành công');
                        window.location='TT_select.php'</script>";
            } 
            else {
                echo "<script>alert('Không thực thi được');</script>";
            }
        }
    }
    ?>
    
    
</body>
</html>