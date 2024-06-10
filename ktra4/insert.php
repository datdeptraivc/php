<?php
include 'control.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Xử lý upload ảnh
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            $message = "Có lỗi khi thêm sp.";
        }
    }

    if (!empty($name) && !empty($quantity) && !empty($price)) {
        if (insertProduct($name, $description, $quantity, $price, $category, $image)) {
            $message = "Sản phẩm được thêm thành công.";
        } else {
            $message = "Có lỗi khi thêm sản phẩm.";
        }
    } else {
        $message = "Tên sản phẩm, số lượng và giá không được để trống";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        <?php if ($message) echo "alert('$message');"; ?>
    </script>
</head>
<body>
    <div class="container">
        <h1>Thêm Sản Phẩm</h1>
        <form method="post" action="insert.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Mô tả sản phẩm:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng sản phẩm:</label>
                <input type="number" id="quantity" name="quantity">
            </div>
            <div class="form-group">
                <label for="price">Gía sản phẩm:</label>
                <input type="number" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="category">Loại sản phẩm:</label>
                <select id="category" name="category">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Ảnh sản phẩm:</label>
                <input type="file" id="image" name="image">
            </div>
            <button type="submit">Thêm sản phẩm</button>
            <br><a href="select.php">Xem danh sách người dùng</a>

        </form>
    </div>
</body>
</html>