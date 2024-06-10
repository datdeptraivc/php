<?php
include 'control.php';

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    if (deleteProduct($id)) {
        echo "<script>alert('Sản phẩm được xóa thành công.');</script>";
    } else {
        echo "<script>alert('Có lỗi khi xóa sản phẩm.');</script>";
    }
    header("Location: select.php");
    exit();
}

$products = selectAllProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Sản Phẩm</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;

        }
        img {
            max-width: 100px;
            height: auto;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .table-container {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .action-buttons {
            display: flex;
            justify-content: space-between;
        }

        .action-buttons a {
            text-decoration: none;
            padding: 5px 10px;
            color: #ffffff;
            border-radius: 5px;
        }

        .edit-button {
            background-color: #007bff;
        }

        .delete-button {
            background-color: #dc3545;
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
        <h1>Danh Sách Sản Phẩm</h1>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Gía sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Hình ảnh </th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['category']; ?></td>
                        <td><img src="<?php echo $product['image']; ?>" alt="Product Image"></td>
                        <td class="action-buttons">
                            <a href="update.php?id=<?php echo $product['id']; ?>" class="action-button edit-button">Edit</a>
                            <a href="select.php?delete_id=<?php echo $product['id']; ?>" class="action-button delete-button" onclick="return confirm('Bạn có muốn xóa sản phẩm không?');">Delete</a>
                        </td>
                        
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
            <br><a href="insert.php">Quay lại trang thêm sản phẩm</a>

        </div>
        
    </div>
    
</body>
</html>