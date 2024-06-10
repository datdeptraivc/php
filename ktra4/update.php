<?php
include 'control.php';

$message = '';
$product = array('id' => '', 'name' => '', 'description' => '', 'quantity' => '', 'price' => '', 'category' => '', 'image' => '');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Xử lý upload ảnh
    $image = $_POST['existing_image'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            $message = "Lỗi khi cập nhật sản phẩm.";
        }
    }

    if (!empty($name) && !empty($quantity) && !empty($price)) {
        if (updateProduct($id, $name, $description, $quantity, $price, $category, $image)) {
            $message = "Sản phẩm được cập nhật thành công";
        } else {
            $message = "Lỗi khi cập nhật sản phẩm";
        }
    } else {
        $message = "Tên sản phẩm, số lượng và giá không được để trống";
    }
    $product = selectProductById($id); 
} else {
    $id = $_GET['id'];
    $product = selectProductById($id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh Sửa Sản Phẩm</title>
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
        <h1>Chỉnh Sửa Sản Phẩm</h1>
        <form method="post" action="update.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <input type="hidden" name="existing_image" value="<?php echo $product['image']; ?>">
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Mô tả sản phẩm:</label>
                <textarea id="description" name="description"><?php echo $product['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng sản phẩm:</label>
                <input type="number" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>">
            </div>
            <div class="form-group">
                <label for="price">Gía sản phẩm:</label>
                <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>">
            </div>
            <div class="form-group">
                <label for="category">Loại sản phẩm:</label>
                <select id="category" name="category">
                    <option value="A" <?php if ($product['category'] == 'A') echo 'selected'; ?>>A</option>
                    <option value="B" <?php if ($product['category'] == 'B') echo 'selected'; ?>>B</option>
                    <option value="C" <?php if ($product['category'] == 'C') echo 'selected'; ?>>C</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Ảnh sản phẩm:</label>
                <input type="file" id="image" name="image">
                <?php if ($product['image']): ?>
                <img src="<?php echo $product['image']; ?>" alt="Product Image" width="100" height="100" style="display: block; margin-top: 10px;">
                <?php endif; ?>
            </div>
            <button type="submit">Cập nhật</button>
        </form>
        <br><a href="select.php">Quay lại trang danh sách</a>
        <br><a href="insert.php">Quay lại trang thêm sản phẩm</a>
    </div>
</body>
</html>