<?php
require("inc/db.php");

if ($_POST) {
    $productID = trim($_POST['productID']);
    $productBrand = trim($_POST['productBrand']);
    $productName = trim($_POST['productBrand']);
    $productPrice = (int)$_POST['productPrice'];
    $productInventory = (int)$_POST['productInventory'];
    $productImage = trim($_POST['productImage']);
    $productDescription = trim($_POST['productDescription']);

    try{
        $sql = 'INSERT INTO productInfo(productID, productBrand, productName, productPrice, productInventory,
        productImage, productDescription)
        VALUES(:productID, :productBrand, :productName, :productPrice, :productInventory,
        :productImage, :productDescription)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":productID", $productID);
        $stmt->bindParam(":productBrand", $productBrand);
        $stmt->bindParam(":productName", $productName);
        $stmt->bindParam(":productPrice", $productPrice);
        $stmt->bindParam(":productInventory", $productInventory);
        $stmt->bindParam(":productImage", $productImage);
        $stmt->bindParam(":productDescription", $productDescription);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: create.php?status=created");
            exit();
        }
        header("Location: create.php?status=fail_create");
        exit();
    } catch(Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
    }
} else {
    header("Location: create.php?status=fail_creeate");
    exit();
}
?>