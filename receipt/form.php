<?php
include ("../layout/header.php");

$id = isset($_GET['id'])? $_GET['id']: 0;

$sql = "SELECT * FROM receipts WHERE id=$id";
$result = mysqli_query($db, $sql);
$receipts = $result->num_rows > 0 ? mysqli_fetch_assoc($result): null;
?>

    <h2>Form add receipts</h2>
    <form action="post-process.php" method="POST">
    <div class="col-md-6">
      <input type="hidden" name="id" value="<?= $id ; ?>">
    <div class="col-md-6">
      <div class="form-group">
              <label for="customer_name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?= $receipts? $receipts['name']: '' ; ?>" required>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" class="form-control" <?= $receipts? $receipts['category_name']: '' ; ?>>
                <option value="1">Entry</option>
              </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
            <a href="index.php" type="submit" name="submit" class="btn btn-primary btn-block">Cancel</a>
          </form>
    <h2>Details</h2>
    <!-- Button Trigger Modal -->
    <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#detailFormModal"> Add </button>
    <div class="table-responsive">
      <table class="table table-striped table-bordered" style="width: 100%;">
      <thead>
        <tr>
          <tr>No</tr>
          <tr>name</tr>
          <tr>category</tr>
          <tr>note</tr>
          <tr>price</tr>
          <tr>amount</tr>
          <tr>subtotal</tr>
          <tr>action</tr>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $i; ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
      </table>
    </div>

    <!--Modul-->
    <div class="modal modal-lg fade show" id="detailFormModal" aria-labelledby="detailFormModalLabel" aria-modal="true" role="dialog" style="display: block;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-tittle fs-5" id="detailFormTabel">Detail Modal</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="overflow:hidden;">
            <form method="POST" action="detail-receipt-post-process.php">
              <div class="row">
                <div class="col-md-6">
                  <input type="hidden" name="modal_receipt_id">
                  <input type="hidden" name="modal_id">
                  <div class="mb-3">
                    <label for="customer_name" class="form-label">Menu</label>
                    <select class="form-select select2-hidden-accessible" name="modal_menu_id" id="select2-modal">
                      <!-- bentar -->
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <label type="text" class="form-control" name="modal-note"></label>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-secondary">Cancel</button>
                </div>
                <div class="col md-6">
                  <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" name="modal-amount" required>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<?php include("../layout/footer.php")?>
