<?php
include ("../layout/header.php");

$id = isset($_GET['id'])? $_GET['id']: 0;

$sql = "SELECT * FROM menus WHERE id=$id";
$result = mysqli_query($db, $sql);
$menus = $result->num_rows > 0 ? mysqli_fetch_assoc($result): null;
?>

    <h2>Form add Menus</h2>
    <form action="post-process.php" method="POST">
    <div class="col-md-6">
      <input type="hidden" name="id" value="<?= $id ; ?>">
    <div class="col-md-6">
      <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?= $menus? $menus['name']: '' ; ?>" required>
            </div>
            <div class="form-group">
              <label for="category_id">Category</label>
              <select name="categories_id" class="form-control" <?= $menus? $menus['category_name']: '' ; ?>>
                <option value="1">Food</option>
                <option value="3">Beverage</option>
                <option value="4">Snack</option>
                <option value="5">Soup dan Sayur</option>
                <option value="6">Drugstore Souvenir</option>
                <option value="7">Cemilan Kletikhan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="note">Note</label>
              <input type="text" class="form-control" id="note" name="note" value="<?= $menus? $menus['note']: '' ; ?>" required>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control" id="price" name="price" value="<?= $menus? $menus['price']: '' ; ?>" required>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <input type="text" class="form-control" id="status" name="status" value="<?= $menus? $menus['status']: '' ; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
            <a href="index.php" type="submit" name="submit" class="btn btn-primary btn-block">Cancel</a>
          </form>
          </div>

<?php include("../layout/footer.php")?>
