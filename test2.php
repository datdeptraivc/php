<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=,, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        background-color: #FFFF99;
    }
</style>
<body>

    <table border="1px">
        <tr>
            <th colspan="2" style="padding-bottom: 15px;padding-top: 5px;">
                ĐĂNG KÝ THỜI KHÓA BIỂU
            </th>
        </tr>
        <form method="POST">
        <tr>
            <th >Giảng đường: </th>
            <th >
                <select name="txtgd" id="">
                    <option value="GD 501">GD 501</option>
                    <option value="GD 502">GD 502</option>
                    <option value="GD 503">GD 503</option>

                </select>
            </th>
        </tr>
        <tr>
            <th >Tên giáo viên: </th>
            <th > <input style="padding-left: 200px;" type="text" name="txtname" id=""></th>
        </tr>
        <tr>
            <th>Môn dạy:</th>
            <th>
                <select name="txtmd" id="">
                    <option value="LT PHP">LT PHP</option>
                    <option value="LT XML">LT XML</option>
                    <option value="LT JAVA">LT JAVA</option>

                </select>
            </th>
        </tr>
        <tr>
            <th class="center " colspan="2 "><input type="submit" name="txtsub" value="Đăng ký"></th>

        </tr>
        </form>     
    </table>
    <?php
    if(isset($_POST['txtsub'])) //Hàm kiểm tra submit đã nhấn chưa
    {
        if(empty($_POST['txtname'])|| empty($_POST['txtmd']))
            echo "Bạn chưa nhập đủ thông tin!!!";
        else
        {
            echo "Giảng viên: ".$_POST['txtname']." - ". "Môn dạy: ".$_POST['txtmd']." - "." Giảng đường: ".$_POST['txtgd'];
        }
    }
    

    ?>
    
</body>
</html>