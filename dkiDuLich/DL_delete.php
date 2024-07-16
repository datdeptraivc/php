<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE</title>
</head>
<body>
<?php
   include ('control.php'); // gọi trang control
   $get_data= new data_dulich(); // gọi lớp data_giangduong trong control
   $del=$get_data->delete_dl($_GET['del']);
   if($del) echo "<script>alert('Bạn đã xóa thành công');
               window.location='DL_select.php'</script>";
    else echo "<script>alert(' Bạn không xóa được') </script>";
                        
?>
    
</body>
</html>