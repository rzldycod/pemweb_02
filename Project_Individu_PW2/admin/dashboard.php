<?php
require_once 'navbar.html';
require_once 'sidebar.html';
require_once 'koneksi.php';
?>

<?php
$stmt1 = $dbh->prepare("SELECT COUNT(*) as count FROM pasien");
$stmt1->execute();
$count1 = $stmt1->fetch(PDO::FETCH_ASSOC)['count'];

$stmt2 = $dbh->prepare("SELECT COUNT(*) as count FROM paramedik");
$stmt2->execute();
$count2 = $stmt2->fetch(PDO::FETCH_ASSOC)['count'];

$stmt3 = $dbh->prepare("SELECT COUNT(*) as count FROM periksa");
$stmt3->execute();
$count3 = $stmt3->fetch(PDO::FETCH_ASSOC)['count'];
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Selamat Datang Admin!</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <br>
  <!-- Main content -->
   <section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Welcome to Project Individu</h3>
                </div>
                <div class="card-body">
                    <p>Nama : Rizaldy Rafa Akhmad </p>
                    <p>NIM : <a href="">0110223268</a></p>
                    <p>Rombel : TI09 </p>
                </div>
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
require_once 'footer.html';
?>
