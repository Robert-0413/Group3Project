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
<!-- Create Form -->
<div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-plus"></i> Add New Product</strong>
            </div>
            <div class="card-body">
                <form action="add.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="productID" class="col-form-label">productID</label>
                            <input type="text" class="form-control" id="productID" name="productID" placeholder="productID" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="productName" class="col-form-label">productName</label>
                            <input type="text" class="form-control" id="productName" name="productName" placeholder="productName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="productBrand" class="col-form-label">productBrand</label>
                            <input type="text" class="form-control" id="productBrand" name="productBrand" placeholder="productBrand" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="productPrice" class="col-form-label">productPrice</label>
                            <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="productPrice" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productInventory" class="col-form-label">productInventory</label>
                            <input type="number" class="form-control" name="productInventory" id="productInventory" placeholder="productInventory" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productImage" class="col-form-label">productImage</label>
                            <input type="text" class="form-control" name="productImage" id="productImage" placeholder="productImage URL">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">productDescription</label>
                        <textarea name="productDescription" id="" rows="5" class="form-control" placeholder="productDescription"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
                </form>
            </div>
        </div>
        <br>
        </div>
        <!-- End create form -->
        <?php include("inc/footer.php") ?>