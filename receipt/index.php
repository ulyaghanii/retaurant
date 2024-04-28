<?php
include ("../layout/header.php");

// Query untuk mengambil data receipts beserta nama 
$id = $_SESSION['user_id'];
$sql = "select rd.id , r.receipt_date, r.customer_name, 
concat('Rp ', format(sum(rd.price * rd.amount), 0)), concat('Rp ', format(sum(rd.price * rd.amount), 0))
  as total, r.status, 
u.name from receipts as r join receipt_details as rd on rd.receipt_id=r.id 
join users as u on r.user_id=u.id join menus as m on rd.menu_id=m.id 
where u.id = '$id'  group by r.id order by rd.id desc";
$query = mysqli_query($db, $sql);
?>
<h1 style="color:grey;" class="text-center">receipts List</h1>
<?php
if(isset($_GET['error'])) {
?>
<div class="alert alert-danger">
<?= $_GET['error']; ?>
</div>
<?php
}
if(isset($_GET['success'])) {
?>
<div class="alert alert-success">
<?= $_GET['success']; ?>
</div>
<?php
}
?>

<a href="form.php" class="btn btn-info my-2" style="color: white;">Add</a>

<table id="my-datatables" class="table  table-striped table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Date</th>
      <th>Name</th>
      <th>Price</th>
      <th>Status</th>
      <th>User</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    while($receipts = mysqli_fetch_array($query)) {
    ?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $receipts["receipt_date"]; ?></td>
      <td><?= $receipts["customer_name"]; ?></td> <!-- Menggunakan category_name yang telah diambil dari tabel categories -->
      <td>
        <?= $receipts["price"]; 
        ?>
      </td>
      <td><?= $receipts["status"]; ?></td>
      <td>
        <?= $id = $_SESSION['user_id'];
        ?>
      </td>
      <td>
        <div class="d-flex">
          <a href="form.php?id=<?= $receipts["id"]; ?>" class="btn btn-sm btn-warning me-2">Edit</a>
          <form action="delete-process.php" method="post">
            <input type="hidden" name="receipt_id" value="<?= $receipts["id"]; ?>">
            <button type="submit" name="delete" onclick="return confirm('Anda yakin menghapus data ini?');" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </div>
      </td>
    </tr>
    <?php
    $i++;
    }?>
  </tbody>
</table>
<?php
include ("../layout/footer.php");
?>
