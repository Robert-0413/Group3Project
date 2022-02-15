<?php
require("inc/db.php");
$productID = $_GET['productID'] ? intval($_GET['productID']) : 0;

try {
    $sql = "SELECT * FROM productInfo WHERE productID = :productID LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":productID", $productID, PDO::PARAM_INT);
    $stmt->execute();
} catch(Exception $e){
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
    <a href="index.php" class="btn btn-light mb-3"><<-Go Back</a>
    <?php if (isset($_GET['status']) && $_GET['status'] == "created") : ?>
    <div class="alert alert-success" role="alert">
        <strong>You have added the item successfuly!</strong>
    </div>
    <?php endif ?>
    <?php if (isset($_GET['status']) && $_GET['status'] == "fail_create") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Failed to create item!</strong>
    </div>
    <?php endif ?>
    <?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
        <div class="alert alert-success" role="alert">
            <strong>You have updated the item successfuly!</strong>
    </div>
    <?php endif ?>
    <?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Failed to update item!</strong>
    </div>
    <?php endif ?>
<!-- Create Form -->
<div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-edit"></i> Edit Product</strong>
            </div>
            <div class="card-body">
                <form action="update.php" method="post">
                    <input type="hidden" name="productID" value="<?= $productInfo['productID'] ?> ">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="productBrand" class="col-form-label">productBrand</label>
                            <input type="text" class="form-control" id="productBrand" name="productBrand" placeholder="productBrand" required value="<?= $productInfo['productBrand'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="productName" class="col-form-label">productName</label>
                            <input type="text" class="form-control" id="productName" name="productName" placeholder="productName" required value="<?= $productInfo['productName'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="productPrice" class="col-form-label">productPrice</label>
                            <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="productPrice" required value="<?= $productInfo['productPrice'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productInventory" class="col-form-label">productInventory</label>
                            <input type="number" class="form-control" name="productInventory" id="productInventory" placeholder="productInventory" required value="<?= $productInfo['productInventory'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productImage" class="col-form-label">productImage</label>
                            <input type="text" class="form-control" name="productImage" id="productImage" placeholder="productImage URL" value="<?= $productInfo['productImage'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">productDescription</label>
                        <textarea name="productDescription" id="" rows="5" class="form-control" placeholder="productDescription"><?= $productInfo['productDescription']?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
                </form>
            </div>
        </div>
        <br>
    </div>
<?php include("inc/footer.php") ?>