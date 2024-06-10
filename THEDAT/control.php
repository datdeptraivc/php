<?php
include 'connect.php';

function addUser($fullname, $username, $password, $gender, $birthday) {
    global $conn;

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return "Username đã tồn tại.";
    }

    $sql = "INSERT INTO users (fullname, username, password, gender, birthday)
            VALUES ('$fullname', '$username', '$password', '$gender', '$birthday')";
    
    if ($conn->query($sql) === TRUE) {
        return "Thêm mới thành công!";
    } else {
        return "Lỗi: " . $conn->error;
    }
}

function getUsers() {
    global $conn;
    $sql = "SELECT * FROM users";
    return $conn->query($sql);
}

function updateUser($id, $fullname, $username, $password, $gender, $birthday) {
    global $conn;

    $sql = "UPDATE users SET fullname='$fullname', username='$username', password='$password', gender='$gender', birthday='$birthday'";
    
    if ($conn->query($sql) === TRUE) {
        return "Cập nhật thành công!";
    } else {
        return "Lỗi: " . $conn->error;
    }
}

function deleteUser($id) {
    global $conn;

    $sql = "DELETE FROM users WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        return "Xóa thành công!";
    } else {
        return "Lỗi: " . $conn->error;
    }
}
?><?php
