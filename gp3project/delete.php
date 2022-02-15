<?php
require("inc/db.php");

if(isset($_GET['productID'])) {
    //Delete record
    try {
        //SQL Statement
        $sql = 'DELETE FROM productInfo WHERE productID = :productID LIMIT 1';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":productID", $_GET['productID'], PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: index.php?status=deleted");
            exit();
        }
        header("Location: index.php?status=fail_delete");
        exit();
    }catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    //Redirect to index.php
    header("Location: index.php?status=fail_delete");
    exit();
}