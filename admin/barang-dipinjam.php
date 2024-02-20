<?php
    session_start();
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
                        <h1>Barang Dipinjam 
                            <a href="barang-dipinjam.php" class="btn btn-info btn-sm">
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
                            <li><a href="#">Peminjaman</a></li>
                            <li class="active">Barang Dipinjam</li>
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
                            <strong class="card-title">Barang Dipinjam</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Nama Peminjam</th>
                        <th>Jabatan</th>
                        <th>Jml Barang</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../config.php';
                            $mysqli = new mysqli("localhost", "root", "", "db_pinjam_barang");
                            
                            if ($mysqli->connect_error) {
                                die("Koneksi ke database gagal: " . $mysqli->connect_error);
                            }
                            
                            $query = "SELECT * FROM tbl_pinjam ORDER BY id DESC";
                            $result = $mysqli->query($query);
                            
                            if ($result) {
                                $no = 1;
                                while ($data = $result->fetch_assoc()) {
                                    $id          = $data['id'];
                                    $nama_barang = $data['nama_barang'];
                                    $peminjam    = $data['peminjam'];
                                    $level       = $data['level'];
                                    $jml_barang  = $data['jml_barang'];
                                    $tgl_pinjam  = $data['tgl_pinjam'];
                                    $tgl_kembali = $data['tgl_kembali'];
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $nama_barang; ?></td>
                                        <td><?php echo $peminjam; ?></td>
                                        <td><?php echo $level; ?></td>
                                        <td><?php echo $jml_barang; ?></td>
                                        <td><?php echo $tgl_pinjam; ?></td>
                                        <td><?php echo $tgl_kembali; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="proses-pinjam.php?mode=terima&id=<?php echo $id; ?>">
                                                <i class="fa fa-check"></i>
                                                Sudah Kembali
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                                $result->free(); // Hapus hasil setelah selesai digunakan
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7">Data Kosong</td>
                                </tr>
                                <?php
                            }
                            
                            $mysqli->close(); // Tutup koneksi database
                            ?>
                            
                      
                    </tbody>
                </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <?php
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <?php
            include 'header.php';
        ?>
        <div class="breadcrumbs">
            <!-- ... Bagian ini tetap sama ... -->
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <!-- ... Bagian ini tetap sama ... -->
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
        });
    </script>
</body>
</html>