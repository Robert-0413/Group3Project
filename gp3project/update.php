<?php
require("inc/db.php");

if ($_POST) {
    $productID = trim($_POST['productID']);
    $productBrand = trim($_POST['productBrand']);
    $productName = trim($_POST['productName']);
    $productPrice = (int)$_POST['productPrice'];
    $productInventory = (int)$_POST['productInventory'];
    $productImage = trim($_POST['productImage']);
    $productDescription = trim($_POST['productDescription']);

    try{
        $sql = 'UPDATE productInfo SET 
                        productID = :productID,
                        productBrand = :productBrand,
                        productName = :productName, 
                        productPrice = :productPrice, 
                        productInventory = :productInventory,
                        productImage = :productImage, 
                        productDescription = :productDescription 
                WHERE productID = :productID';

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
            header("Location: edit.php?productID=".$productID."&status=updated");
            exit();
        }
        header("Location: edit.php?productID=".$productID."&fail_update");
        exit();
    } catch(Exception $e) {
            echo "Error" . $e->getMessage();
            exit();
    }
} else {
    header("Location: edit.php?productID=".$productID."&status=fail_update");
    exit();
}
?>