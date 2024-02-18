<?php
class crud_operations
{

    private $conn;
    function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "crud_operations");
    }

    function create_Product($product_name, $product_price, $product_description)
    {
        $sql = "INSERT INTO products (product_name, product_price, product_description) VALUES" . "('$product_name', '$product_price', '$product_description')";
        $this->conn->query($sql);

    }
    function read_Product()
    {
        $sql = "SELECT * FROM products";
        return $this->conn->query($sql);

    }
    function update_Product($product_code, $productname, $product_price, $product_des)
    {
        $sql = "UPDATE products SET product_name = '$productname', product_price = '$product_price', product_description = '$product_des' WHERE product_code = '$product_code'";
        $this->conn->query($sql);
    }
    function delete_Product($product_code)
    {
        $sql = "DELETE FROM products WHERE product_name = '$product_code'";
        $this->conn->query($sql);
    }
}
$crud = new crud_operations();
$result = $crud->read_Product();
$crud->create_Product("Product 1", 100, "Product 1 Description");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Product Name: " . $row["product_name"] . " - Product Price: " . $row["product_price"] . " - Product Description: " . $row["product_description"] . "<br>";
    }
} else {
    echo "0 results";
}
// $crud->delete_Product(5);
$crud->update_Product(1, "Product 1", 200, "Product 1 Description");
?>