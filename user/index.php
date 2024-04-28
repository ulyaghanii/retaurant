<?php
include("../layout/header.php");

$sql = "select * from users";
$query = mysqli_query($db, $sql);
?>

    <h2>Selamat Datang <?= $_SESSION['name']; ?> di Halaman User</h2>

    <?php
    if(isset($_GET['Error'])) {
        ?>
    <div class="alert alert-danger">
        <?= $_GET['Error']; ?>
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

    <a href="form.php" class="btn btn-primary my-3">Add</a>
    <table class="table table-striped table-bordered" id="my-datatables">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            while($user = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $user["name"]; ?></td>
                        <td><?= $user["username"]; ?></td>
                        <td>
                        <div class="d-flex">
                        <a href="form.php?id=<?= $user["id"]; ?>" class="btn btn-sm btn-warning me-2">Edit</a>
                        <form action="delete-process.php" method="post">
                            <input type="hidden" name="user_id" value="<?= $user["id"]; ?>">
                            <button type="submit" name="delete"
                                onclick="return confirm('Anda yakin menghapus data ini?');"
                                class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        </div>
                        </td>
                    </tr>
                    <?php
                    $i++;
            }?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

<?php include("../layout/footer.php")?>
