<div class="modal fade" id="modal-delete-<?= $productInfo['productID'] ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><i class="fa fa-trash"></i> Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you want to delete product <strong><?= $productInfo['productName'] ?></strong> ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="delete.php?productID=<?=$productInfo['productID'] ?>" class="btn btn-outline-success">Save changes</a>
                                        <button type="button" class="btn btn-outline-secondary" 
                                        data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
        <!-- End Modal -->