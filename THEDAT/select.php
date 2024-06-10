
<?php
include 'control.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $message = deleteUser($id);
    echo "<script type='text/javascript'>showAlert('$message');</script>";
}

$users = getUsers();
if ($users->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Birthday</th>
               
                <th>Actions</th>
            </tr>";
    while($row = $users->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['fullname']}</td>
                <td>{$row['username']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['birthday']}</td>
                
                <td>
                    <a href='update.php?id={$row['id']}'>Sửa</a> | 
                    <a href='select.php?delete={$row['id']}'>Xóa</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 kết quả";
}
?>

<br><a href="insert.php">Quay lại trang thêm người dùng</a>

</body>
</html>
