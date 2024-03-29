<?php
    session_start();
    include '../config.php';
    if(isset($_GET['opsi']) && $_GET['opsi'] == 'hapus' && isset($_GET['id'])){
        $id           = $_GET['id']; 
        $query_delete = mysql_query("DELETE FROM tbl_barang WHERE id='$id'");
        if($query_delete){
            echo "<script>alert('Berhasil Dihapus');</script>";
            echo "<script>window.location('index.php');</script>";
        }else{
            echo "Gagal hapus ke database;";
        } 
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Peminjaman Barang Sekolah</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        
    <?php
        include 'sidebar.php';
    ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

    <?php
        include 'header.php';
    ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Barang 
                            <a href="data-barang.php" class="btn btn-info btn-sm">
                                <i class="fa fa-refresh"></i>
                                Refresh
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Barang</a></li>
                            <li class="active">Data Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                            <a href="tambah-barang.php" class="btn btn-success btn-sm" style="margin-left: 20px;">
                                <i class="fa fa-plus"></i>
                                Tambah Barang
                            </a>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Gambar</th>
                        <th>Stok</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        include '../config.php';
// Ganti koneksi ke database menggunakan MySQLi
$mysqli = new mysqli("localhost","root","","db_pinjam_barang");

if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}

$query = "SELECT * FROM tbl_barang ORDER BY id ASC";
$result = $mysqli->query($query);

if (!$result) {
    die("Error dalam kueri: " . $mysqli->error);
}

$no = 1;

while ($data = $result->fetch_assoc()) {
    // Lakukan sesuatu dengan data
    $no++;
}

// Jangan lupa untuk menutup koneksi ke database setelah selesai
$mysqli->close();
                    ?>
                    <?php
include '../config.php';

if (isset($_GET['opsi']) && $_GET['opsi'] == 'hapus' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perbaikan 1: Menggunakan MySQLi
    $mysqli = new mysqli("localhost", "root", "", "db_pinjam_barang");

    if ($mysqli->connect_error) {
        die("Koneksi ke database gagal: " . $mysqli->connect_error);
    }

    $query_delete = $mysqli->query("DELETE FROM tbl_barang WHERE id='$id'");

    if ($query_delete) {
        echo "<script>alert('Berhasil Dihapus');</script>";
        // Perbaikan 3: Menggunakan window.location.href
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "Gagal hapus ke database;";
    }

    // Jangan lupa untuk menutup koneksi ke database setelah selesai
    $mysqli->close();
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <!-- ... (kode lainnya tetap sama) ... -->
</head>
<body>
    <!-- ... (kode lainnya tetap sama) ... -->

    <tbody>
        <?php
        include '../config.php';

        // Perbaikan 1: Menggunakan MySQLi
        $mysqli = new mysqli("localhost", "root", "", "db_pinjam_barang");

        if ($mysqli->connect_error) {
            die("Koneksi ke database gagal: " . $mysqli->connect_error);
        }

        $query = "SELECT * FROM tbl_barang ORDER BY id ASC";
        $result = $mysqli->query($query);

        if (!$result) {
            die("Error dalam kueri: " . $mysqli->error);
        }

        $no = 1;

        while ($data = $result->fetch_assoc()) {
            // Perbaikan 2: Menampilkan data dengan benar
            echo '<tr>';
            echo '<td>' . htmlspecialchars($data['id']) . '</td>';
            echo '<td>' . htmlspecialchars($data['nama_barang']) . '</td>';
            echo '<td><img src="../assets/img/uploads/' . htmlspecialchars($data['gambar_barang']) . '" style="width:270px;"></td>';
            echo '<td style="text-align: center;">' . htmlspecialchars($data['stok_barang']) . '</td>';
            echo '<td class="text-white">';
            echo '<a class="btn btn-danger btn-sm" href="hapus.php?id=' . $data['id'] . '">';
            echo '<i class="fa fa-times"></i> Hapus</a>';
            echo '<a class="btn btn-info btn-sm" href="edit.php?id=' . $data['id'] . '">';
            echo '<i class="fa fa-pencil"></i> Edit</a>';
            echo '</td>';
            echo '</tr>';
            $no++;
        }

        // Jangan lupa untuk menutup koneksi ke database setelah selesai
        $mysqli->close();
        ?>
    </tbody>

    <!-- ... (kode lainnya tetap sama) ... -->
</body>
</html>



                    <?php    
                                $no++;
                                  
                    ?>
                      
                     
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>
