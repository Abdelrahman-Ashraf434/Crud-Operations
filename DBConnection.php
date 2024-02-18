<?php
class DBConnection
{
    public function __construct()
    {
        $conn = new mysqli("localhost", "root", "", "crud_operations");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
    }
}
?>