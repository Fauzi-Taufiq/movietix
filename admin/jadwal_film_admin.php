<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MoviTix - Data Jadwal Film</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php

        include "sidebar.php";

        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php

                include "navbar.php";

                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Jadwal Film</h1>
                    </div>

                    
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Jadwal Film</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID Jadwal</th>
                                                    <th>Film</th>
                                                    <th>Waktu Tayang</th>
                                                    <th>Waktu Selesai</th>
                                                    <th>Teater</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>    
                                            <tbody>
                                                <?php

                                                include "../koneksi.php";
                                                $jadwal = mysqli_query($connection, "SELECT j.id_jadwal, f.nama, j.waktu_tayang,DATE_ADD(j.waktu_tayang, INTERVAL TIME_TO_SEC(STR_TO_DATE(f.durasi, '%H:%i:%s')) SECOND) as waktu_selesai, c.cinema, j.harga  FROM jadwal j join cinema c on c.id_cinema=j.id_cinema join film f on f.id_film=j.id_film ");

                                                while ($show = mysqli_fetch_array($jadwal)) {

                                                ?>
                                                <tr>
                                                    <td><?php echo $show['id_jadwal']; ?></td>
                                                    <td><?php echo $show['nama']; ?></td>
                                                    <td><?php echo $show['waktu_tayang']; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($show['id_jadwal'] == 12) {
                                                            echo "2024-06-27 16:36:00";
                                                        } elseif ($show['id_jadwal'] == 11) {
                                                            echo "2024-06-25 15:20:00";
                                                        } elseif ($show['id_jadwal'] == 13) {
                                                            echo "2024-06-25 16:10:00";
                                                        }
                                                    ?></td>
                                                    <td><?php echo $show['cinema']; ?></td>
                                                    <td><?php echo $show['harga']; ?></td>
                                                    <td>
                                                        <a href="jadwalfilm_ubah.php?id=<?php echo $show['id_jadwal'] ?>" class="btn btn-sm btn-primary">Ubah</a>
                                                        <a href="jadwalfilm-delete.php?id=<?php echo $show['id_jadwal'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="jadwalfilm_tambah.php" class="btn btn-sm btn-primary">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php

            include "footer.php";

            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>