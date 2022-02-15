<?php
require("inc/db.php");
$productID = $_GET['productID'] ? intval($_GET['productID']) : 0;

try {
    $sql = "SELECT * FROM productInfo WHERE productID = :productID LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":productID", $productID, PDO::PARAM_INT);
    $stmt->execute();
} catch(Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

if (!$stmt->rowCount()) {
    header("Location: index.php");
    exit();
}
$productInfo = $stmt->fetch();

?>

<?php include("inc/header.php") ?>
    <div class="container">
        <a href="index.php" class="btn btn-light mb-3"><< Go Back</a>
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-database"></i> Show Product</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>ProductID</th>
                                <td><?= $productInfo['productID'] ?></td>
                                <th>ProductName</th>
                                <td><?= $productInfo['productName'] ?></td>
                            </tr>   
                            <tr>
                                <th>ProductBrand</th>
                                <td><?= $productInfo['productBrand'] ?></td>
                                <th>ProductPrice</th>
                                <td>$<?= number_format($productInfo['productPrice'], 2) ?></td>
                            </tr>  
                            <tr>
                                <th>Inventory</th>
                                <td><?= $productInfo['productInventory'] ?></td>
                            </tr>   
                            <tr>
                                <th>Description</th>
                                <td colspan="3"><?= $productInfo['productDescription'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-3">
                        <img src="<?= $productInfo['productImage'] ?>" alt="<?= $productInfo['productName'] ?>" class="img-fluid img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
<?php include("inc/footer.php") ?>