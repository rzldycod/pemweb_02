<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk mengambil data periksa berdasarkan id
    $sql = "SELECT * FROM periksa WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $tensi = $_POST['tensi'];
    $keterangan = $_POST['keterangan'];
    $pasien_id = $_POST['pasien_id'];
    $dokter_id = $_POST['dokter_id'];
    $data = [$tanggal, $berat, $tinggi, $tensi, $keterangan, $pasien_id, $dokter_id, $id];
    // Query SQL untuk update data pasien berdasarkan id
    $sql = "UPDATE periksa SET tanggal=?, berat=?, tinggi=?, tensi=?, keterangan=?, pasien_id=?, dokter_id=? WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    echo "<script>window.location.href = 'index.php';</script>";
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Website</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Pasien</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">Form Periksa</h2>
                            <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
                            <div class="form-group row">
                                    <label for="tanggal" class="col-4 col-form-label">Tanggal Periksa</label>
                                    <div class="col-8">
                                        <input id="tanggal" name="tanggal" type="date" class="form-control" value="<?= $row['tanggal'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Berat Badan</label>
                                    <div class="col-8">
                                        <input id="berat" name="berat" type="text" class="form-control" value="<?= $row ['berat']?> ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Tinggi Badan</label>
                                    <div class="col-8">
                                        <input id="tinggi" name="tinggi" type="text" class="form-control" value=" <?= $row ['tinggi'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Tensi</label>
                                    <div class="col-8">
                                        <input id="tensi" name="tensi" type="text" class="form-control" value="<?= $row ['tensi'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Keterangan</label>
                                    <div class="col-8">
                                        <input id="keterangan" name="keterangan" type="text" class="form-control" value="<?= $row ['keterangan']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pasien_id" class="col-4 col-form-label">Nama Pasien</label>
                                    <div class="col-8">
                                        <?php
                                        $sqljenis = "SELECT * FROM pasien";
                                        $rsjenis = $dbh->query($sqljenis);
                                        ?>
                                        <select id="pasien_id" name="pasien_id" class="custom-select">
                                            <?php
                                            foreach ($rsjenis as $rowjenis) {
                                                $selected = ($rowjenis['id'] == $row['pasien_id']) ? 'selected' : '';
                                            ?>
                                                <option value="<?= $rowjenis['id'] ?>" <?= $selected ?>><?= $rowjenis['nama'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dokter_id" class="col-4 col-form-label">Dokter Pemeriksa</label>
                                    <div class="col-8">
                                        <?php
                                        $sqljenis = "SELECT * FROM dokter";
                                        $rsjenis = $dbh->query($sqljenis);
                                        ?>
                                        <select id="dokter_id" name="dokter_id" class="custom-select">
                                            <?php
                                            foreach ($rsjenis as $rowjenis) {
                                                $selected = ($rowjenis['id'] == $row['dokter_id']) ? 'selected' : '';
                                            ?>
                                                <option value="<?= $rowjenis['id'] ?>" <?= $selected ?>><?= $rowjenis['nama'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>