<!DOCTYPE html>
<html>
<head>
    <title>Đề 5</title>
</head>
<body>



<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }
  h2 {
    text-align: center;
  }
  table {
    margin: 0 auto;
    margin-top: 50px;
    background-color: #EEEEEE;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  th {
    text-align: left;
  }
  input[type="text"],
  input[type="password"],
  input[type="date"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  input[type="radio"] {
    margin-right: 5px;
  }
  input[type="reset"],
  input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
  }
  input[type="reset"]:hover,
  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>

<h2>Thêm Mới Người Dùng</h2>

<table>
  <form action="insert.php" method="post" enctype="multipart/form-data">
    <tr>
      <th colspan="2">Tên</th>
    </tr>
    <tr>
      <th><input type="text" name="fullname" required placeholder="Họ và Tên"></th>
    </tr>
    <tr>
      <th colspan="2">Chọn tên người dùng của bạn</th>
    </tr>
    <tr>
      <th colspan="2"><input type="text" name="username" required placeholder="@gmail.com"></th>
    </tr>
    <tr>
      <th colspan="2">Tạo mật khẩu</th>
    </tr>
    <tr>
      <th colspan="2"><input type="password" name="password" required></th>
    </tr>
    <tr>
      <th colspan="2">Xác nhận lại mật khẩu của bạn</th>
    </tr>
    <tr>
      <th colspan="2"><input type="password" name="repassword" required></th>
    </tr>
    <tr>
      <th colspan="2">Sinh nhật</th>
    </tr>
    <tr>
      <th colspan="2"><input type="date" name="birthday" required></th>
    </tr>
    <tr>
      <th colspan="2">Giới tính</th>
    </tr>
    <tr>
      <th>
        <input type="radio" name="gender" value="Nam"> Nam
        <input type="radio" name="gender" value="Nữ"> Nữ
      </th>
    </tr>
    <tr>
      <th colspan="2">
        <input type="reset" value="Reset">
        <input type="submit" name="submit" value="THÊM">
      </th>
    </tr>
  </form>
</table>
<?php
include 'control.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
   

    if ($password !== $repassword) {
        echo "<script type='text/javascript'>showAlert('Password và RePassword không khớp!');</script>";
    } else {
       


        $message = addUser($fullname, $username, $password, $gender, $birthday);
        echo "<script type='text/javascript'>showAlert('$message');</script>";
    }
}

echo '<br><a href="select.php">Xem danh sách người dùng</a>';
?>
