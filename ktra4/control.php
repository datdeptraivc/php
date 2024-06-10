<?php
include 'connect.php';

function insertProduct($name, $description, $quantity, $price, $category, $image) {
    global $conn;
    $sql = "INSERT INTO products (name, description, quantity, price, category, image) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisss", $name, $description, $quantity, $price, $category, $image);  
    return $stmt->execute();
}



function selectAllProducts() {
    global $conn;
    $result = $conn->query("SELECT * FROM products");
    return $result->fetch_all(MYSQLI_ASSOC);
}
function selectProductById($id) {
    global $conn;
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function updateProduct($id, $name, $description, $quantity, $price, $category, $image) {
    global $conn;
    $sql = "UPDATE products SET name = ?, description = ?, quantity = ?, price = ?, category = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssi", $name, $description, $quantity, $price, $category, $image, $id);
    return $stmt->execute();
}

function deleteProduct($id) {
    global $conn;
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>