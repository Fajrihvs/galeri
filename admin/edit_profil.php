<?php
include 'koneksi.php';
session_start();

// Periksa apakah parameter ID tersedia dalam URL
if(isset($_GET['id'])) {
    // Ambil ID yang dikirimkan melalui parameter GET
    $id = $_GET['id'];
    
    // Query untuk mengambil data profil berdasarkan ID
    $sql = "SELECT * FROM profile WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    // Periksa apakah data profil ditemukan
    if(mysqli_num_rows($result) > 0) {
        // Ambil data profil
        $profil = mysqli_fetch_assoc($result);
        $judul = $profil['judul'];
        $isi = $profil['isi'];
    } else {
        echo "Profil tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak ditemukan";
    exit();
}

// Proses form jika tombol submit ditekan
if(isset($_POST['submit'])) {
    // Ambil nilai judul dan isi yang dikirimkan melalui form
    $judul_baru = $_POST['judul'];
    $isi_baru = $_POST['isi'];
    
    // Query untuk melakukan update data profil
    $sql_update = "UPDATE profile SET judul='$judul_baru', isi='$isi_baru' WHERE id=$id";
    
    // Eksekusi query update
    if(mysqli_query($conn, $sql_update)) {
        // Redirect kembali ke halaman profil setelah update berhasil
        header("Location: profil.php");
        exit();
    } else {
        echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?> 


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profil</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
    <?php include 'sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
            <?php include 'navbar.php'; ?>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 font-weight-bold mb-0 text-gray-800">Edit profil</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="judul">Judul profil</label>
                                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="isi">Isi profil</label>
                                            <input type="text" class="form-control" id="isi" name="isi" value="<?php echo $isi; ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                        <a href="profil.php" class="btn btn-secondary">Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
