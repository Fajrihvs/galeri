<?php
include 'koneksi.php';
session_start();
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi']; // Menangkap isi profil dari formulir HTML

    $sql = "SELECT * FROM profile WHERE judul='$judul'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows == 0) { // Periksa apakah judul sudah ada atau tidak
        $sql = "INSERT INTO profile (judul, isi) VALUES ('$judul', '$isi')"; // Menyisipkan judul dan isi profil ke dalam tabel
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Profil Berhasil di Tambahkan')</script>";
            $judul = "";
            $isi = ""; // Mengosongkan variabel setelah proses selesai
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Judul Sudah Terdaftar.')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

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

    <?php
    include 'sidebar.php'
    ?>
    
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php
            include 'navbar.php'
            ?>
       
<!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 font-weight-bold mb-0 text-gray-800">Profil</h1>
                    </div>
                    
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                
                              
                                <!-- Card Body -->
                                
                                <div class="card-body">
                                <button type="button" class="btn btn-primary btn-md mb-3" data-toggle="modal" data-target="#profilModal">
                                +Tambah Profil
                                </button> 
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>isi</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <?php
                                            $q = $conn->query("SELECT *, DATE_FORMAT(created_at, '%Y-%m-%d') AS formatted_date FROM profile");
                                            $no = 1;
                                            while ($d = $q->fetch_assoc()) :
                                        ?>
                                        
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['judul']?></td>
                                            <td><?php echo $d['isi']?></td>
                                            <td><?php echo $d['formatted_date']?></td>
                                            <td>
                                            <a href="edit_profil.php?id=<?php echo $d['id']; ?>" class="btn btn-warning btn-md mx-2 mb-3">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                            <a href="profil_hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger btn-md mb-3" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i>
        
                                            </td>
                                            <?php endwhile;?>
                                        </tr>
                                        
                                </tbody>
                            </table>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

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
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Kategori?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

<!-- The Modal -->
<div class="modal" id="profilModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Profil</h4>
        <button type="button" class="close" data-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
        <input type="text" name="judul" placeholder="judul" class="form-control" required><br>
        <input type="text" name="isi" placeholder="isi" class="form-control" required><br>
        <input type="date" name="tanggal" id="tanggal" class="form-control" required><br> <!-- Input tanggal -->
        <button name="submit" class="btn btn-primary btn-md">Tambah data</button>
      </div>
      </form>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    <!-- Hapus kategori Modal-->
    <div class="modal fade" id="hapusk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="proses_hapus.php">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <script>
    // Mengubah format tanggal menjadi 'YYYY-MM-DD'
    document.getElementById('tanggal').addEventListener('change', function() {
        var input = this.value;
        var date = new Date(input);
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        var formattedDate = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
        this.value = formattedDate;
    });
</script>
</html>