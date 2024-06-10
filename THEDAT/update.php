<!DOCTYPE html>
<html>
<head>
    <title>Sửa Thông Tin Người Dùng</title>
    <script type="text/javascript">
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>
<body>

<h2>Sửa Thông Tin Người Dùng</h2>

<?php
include 'control.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
   

  

    $message = updateUser($id, $fullname, $username, $password, $gender, $birthday);
    echo "<script type='text/javascript'>showAlert('$message');</script>";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script type='text/javascript'>showAlert('Người dùng không tồn tại!');</script>";
        echo "<a href='select.php'>Quay lại trang danh sách</a>";
        exit();
    }
} else {
    echo "<script type='text/javascript'>showAlert('Không có ID người dùng!');</script>";
    echo "<a href='select.php'>Quay lại trang danh sách</a>";
    exit();
}
?>

<form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="hidden" name="current_avatar" value="<?php echo $row['avatar']; ?>">
    Full Name: <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required><br><br>
    Username: <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br><br>
    Password: <input type="password" name="password" value="<?php echo $row['password']; ?>" required><br><br>
    Gender: 
    <input type="radio" name="gender" value="Male" <?php if ($row['gender'] == 'Male') echo 'checked'; ?>> Male
    <input type="radio" name="gender" value="Female" <?php if ($row['gender'] == 'Female') echo 'checked'; ?>> Female<br><br>
    Birthday: <input type="date" name="birthday" value="<?php echo $row['birthday']; ?>" required><br><br>
    
    <input type="submit" value="Cập nhật">
</form>

<br><a href="select.php">Quay lại trang danh sách</a>

</body>
</html>
